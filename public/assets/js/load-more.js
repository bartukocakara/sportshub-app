/**
 * Helper function to get the correct avatar URL.
 * It checks if the avatar path is a full URL or a relative path
 * and constructs the appropriate URL.
 * @param {string|null} avatar - The avatar path or URL.
 * @returns {string} The full URL for the avatar.
 */
export function getAvatarUrl(avatar) {
    if (!avatar) {
        return '/assets/media/avatars/blank.png'; // Default blank avatar
    }
    // Check if it's already a full URL (http/https)
    if (avatar.startsWith('http://') || avatar.startsWith('https://')) {
        return avatar;
    }
    // Assume it's a storage path if not a full URL
    return `/storage/${avatar}`;
}

/**
 * Debounce function to limit how often a function is called.
 * Useful for events like 'input' or 'resize' to prevent excessive execution.
 * @param {function} func - The function to debounce.
 * @param {number} delay - The delay in milliseconds before the function is executed.
 * @returns {function} The debounced version of the function.
 */
export function debounce(func, delay) {
    let timeoutId;
    return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(this, args); // Use apply to preserve 'this' context and pass arguments
        }, delay);
    };
}

/**
 * Manages dynamic data loading with a "load more" button, filtering, and item selection.
 * This class fetches data from an API, appends it to a container, and handles UI states
 * like loading spinners and button visibility.
 * @param {object} options - Configuration options for the LoadMoreController.
 * @param {string} options.apiUrl - The API endpoint to fetch data from.
 * @param {string} options.containerId - The ID of the HTML element where new items will be appended.
 * @param {string} options.spinnerId - The ID of the spinner element to show/hide.
 * @param {string} options.showMoreButtonId - The ID of the "show more" button.
 * @param {function} options.renderItemCallback - A callback function that takes an item object and returns its HTML string.
 * @param {object} options.initialMeta - The initial pagination meta object from the first API call (containing current_page, last_page).
 * @param {object} [options.extraParams={}] - Additional query parameters to include in the API request.
 * @param {number} [options.spinnerDelay=0] - Delay in milliseconds before showing the spinner.
 * @param {string} [options.showMoreText='Show More'] - The text to display on the "Show More" button when more results are available.
 * @param {string} [options.noMoreResultsText='No More Results'] - The text to display when no more results are available.
 */
export class LoadMoreController {
    constructor(options) {
        this.apiUrl = options.apiUrl;
        this.containerId = options.containerId;
        this.spinnerId = options.spinnerId;
        this.showMoreButtonId = options.showMoreButtonId;
        this.renderItemCallback = options.renderItemCallback;
        this.currentPage = options.initialMeta.current_page || 1;
        this.lastPage = options.initialMeta.last_page || 1;
        this.isLoading = false;
        this.extraParams = options.extraParams || {};
        this.spinnerDelay = options.spinnerDelay || 0;
        this.showMoreText = options.showMoreText || '⬇️ Show More'; // Default if not provided
        this.noMoreResultsText = options.noMoreResultsText || 'No More Results'; // Default if not provided

        this.showMoreButton = null;
        this.spinner = null;
        this.container = null;

        // Ensure `this` context is correct for event listeners
        this.handleCheckboxChange = this.handleCheckboxChange.bind(this);

        this.init();
    }

    init() {
        this.showMoreButton = document.getElementById(this.showMoreButtonId);
        this.spinner = document.getElementById(this.spinnerId);
        this.container = document.getElementById(this.containerId);

        if (!this.container) {
            console.error(`LoadMoreController: Container with ID '${this.containerId}' not found.`);
            return;
        }

        if (this.showMoreButton) {
            this.showMoreButton.addEventListener('click', this.loadMore.bind(this));
            this.updateShowMoreButtonState(); // Set initial state of the button
        } else {
            console.warn(`LoadMoreController: Show More Button with ID '${this.showMoreButtonId}' not found.`);
        }

        document.querySelectorAll(`#${this.containerId} input[name="user_ids[]"]`).forEach(checkbox => {
            checkbox.addEventListener('change', this.handleCheckboxChange);
            // Note: window.selectedUserIds holds integers if from @json on PHP array of ints.
            // Ensure comparison type matches if IDs are GUIDs.
            if (window.selectedUserIds && window.selectedUserIds.includes(checkbox.value)) { // Use checkbox.value directly (string)
                checkbox.checked = true;
                const card = checkbox.closest('.player-card'); // Or whatever the parent card class is
                if (card) {
                    card.classList.add('border-primary');
                    card.style.borderWidth = '2px';
                }
            }
        });
    }

    updateShowMoreButtonState() {
        if (!this.showMoreButton) return;

        if (this.currentPage >= this.lastPage) {
            this.showMoreButton.setAttribute('disabled', 'true');
            this.showMoreButton.innerHTML = this.noMoreResultsText;
            this.showMoreButton.classList.add('disabled');
            this.spinner?.classList.add('d-none');
        } else {
            this.showMoreButton.removeAttribute('disabled');
            this.showMoreButton.innerHTML = this.showMoreText;
            this.showMoreButton.classList.remove('disabled');
        }
    }

    async loadMore() {
        if (this.isLoading || this.currentPage >= this.lastPage) {
            this.updateShowMoreButtonState();
            return;
        }

        this.isLoading = true;
        this.currentPage++;

        this.showMoreButton?.setAttribute('disabled', 'true');
        let spinnerTimeout = setTimeout(() => {
            this.spinner?.classList.remove('d-none');
        }, this.spinnerDelay);

        try {
            // Start building the query parameters
            const queryParts = [];
            queryParts.push(`page=${this.currentPage}`); // Always include the page parameter

            // Iterate over extraParams to handle arrays specifically
            for (const key in this.extraParams) {
                if (Object.prototype.hasOwnProperty.call(this.extraParams, key)) {
                    const value = this.extraParams[key];
                    if (Array.isArray(value)) {
                        // For arrays, append '[]' to the key and add each item separately
                        value.forEach(item => {
                            queryParts.push(`${encodeURIComponent(key)}[]=${encodeURIComponent(item)}`);
                        });
                    } else if (value !== null && value !== undefined) {
                        // For non-array values, add them as standard key=value
                        queryParts.push(`${encodeURIComponent(key)}=${encodeURIComponent(value)}`);
                    }
                }
            }

            const queryParams = queryParts.join('&'); // Join all parts with '&'

            const csrfMeta = document.head.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfMeta ? csrfMeta.content : '';

            const response = await fetch(`${this.apiUrl}?${queryParams}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            const items = data.result?.data || [];
            this.lastPage = data.result?.meta.last_page || this.lastPage;

            if (items.length > 0) {
                items.forEach(item => {
                    const itemHtml = this.renderItemCallback(item);
                    this.container?.insertAdjacentHTML('beforeend', itemHtml);
                });

                // Re-attach event listeners and check selection for newly added items
                this.container.querySelectorAll(`input[name="user_ids[]"]`).forEach(checkbox => {
                    if (!checkbox.__listenerAdded) { // Prevent adding multiple listeners
                        checkbox.addEventListener('change', this.handleCheckboxChange);
                        checkbox.__listenerAdded = true;
                    }
                    if (window.selectedUserIds && window.selectedUserIds.includes(checkbox.value)) { // Use checkbox.value directly
                        checkbox.checked = true;
                        const card = checkbox.closest('.player-card'); // Ensure this matches your card class
                        if (card) {
                            card.classList.add('border-primary');
                            card.style.borderWidth = '2px';
                        }
                    }
                });

                if (typeof KTMenu !== 'undefined' && KTMenu.createInstances) {
                    KTMenu.createInstances(); // Re-initialize Metronic components if needed
                }
            }

            this.updateShowMoreButtonState();

        } catch (e) {
            console.error('Error loading more items:', e);
        } finally {
            clearTimeout(spinnerTimeout);
            this.spinner?.classList.add('d-none');
            this.showMoreButton?.removeAttribute('disabled');
            this.isLoading = false;
        }
    }

    // This method might not be needed for announcement lists if there's no selection
    handleCheckboxChange(event) {
        const checkbox = event.target;
        const card = checkbox.closest('.player-card'); // Ensure this matches your card class

        if (!card) {
            console.warn('Player card not found for checkbox:', checkbox);
            return;
        }

        const userId = checkbox.value; // Keep as string if IDs are GUIDs

        if (checkbox.checked) {
            card.classList.add('border-primary');
            card.style.borderWidth = '2px';
            if (!window.selectedUserIds.includes(userId)) {
                window.selectedUserIds.push(userId);
            }
        } else {
            card.classList.remove('border-primary');
            card.style.borderWidth = '1px';
            window.selectedUserIds = window.selectedUserIds.filter(id => id !== userId);
        }
    }

    /**
     * Sets new filter parameters, resets the pagination state, clears the current items,
     * and triggers a new data load with the updated filters.
     * @param {object} params - An object containing key-value pairs for the new filter parameters.
     */
    setFilter(params = {}) {
        if (this.isLoading) {
            console.warn('Cannot set filter while data is loading.');
            return;
        }

        this.extraParams = { ...this.extraParams, ...params };
        this.currentPage = 0; // Set to 0 so loadMore increments to 1 for the first page
        this.lastPage = 1;
        this.container.innerHTML = '';

        this.updateShowMoreButtonState();

        this.loadMore();
    }
}
