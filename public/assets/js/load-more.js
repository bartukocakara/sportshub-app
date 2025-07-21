
/**
 * Loads more data dynamically.
 * @param {object} options - Configuration options for loading more.
 * @param {string} options.apiUrl - The API endpoint to fetch data from.
 * @param {string} options.containerId - The ID of the HTML element where new items will be appended.
 * @param {string} options.spinnerId - The ID of the spinner element to show/hide.
 * @param {string} options.showMoreButtonId - The ID of the "show more" button.
 * @param {function} options.renderItemCallback - A callback function that takes an item and returns its HTML string.
 * @param {object} options.initialMeta - The initial meta object from the first API call (containing current_page, last_page).
 * @param {object} [options.extraParams={}] - Additional query parameters to include in the API request.
 */
class LoadMoreController {
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

        this.init();
    }

    init() {
        this.showMoreButton = document.getElementById(this.showMoreButtonId);
        this.spinner = document.getElementById(this.spinnerId);
        this.container = document.getElementById(this.containerId);

        if (this.showMoreButton) {
            this.showMoreButton.addEventListener('click', this.loadMore.bind(this));
        }

        // Hide button if no more pages initially
        if (this.currentPage >= this.lastPage && this.showMoreButton) {
            this.showMoreButton.parentElement?.remove();
        }
    }

    async loadMore() {
        if (this.isLoading || this.currentPage >= this.lastPage) return;

        this.isLoading = true;
        this.currentPage++;

        this.spinner?.classList.remove('d-none');
        this.showMoreButton?.setAttribute('disabled', 'true');

        try {
            const queryParams = new URLSearchParams({
                page: this.currentPage,
                ...this.extraParams
            }).toString();
            const csrfMeta = document.head.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfMeta ? csrfMeta.content : '';

            const response = await fetch(`${this.apiUrl}?${queryParams}`, {
                method: 'GET',
               headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken
            }
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            const items = data.result?.data || []; // Adjust based on your API response structure

            if (items.length > 0) {
                items.forEach(item => {
                    const itemHtml = this.renderItemCallback(item);
                    this.container?.insertAdjacentHTML('beforeend', itemHtml);
                });

                if (typeof KTMenu !== 'undefined' && KTMenu.createInstances) {
                    KTMenu.createInstances();
                }
            }

            if (this.currentPage >= this.lastPage && this.showMoreButton) {
                this.showMoreButton.parentElement?.remove();
            }

        } catch (e) {
            console.error('Error loading more items:', e);
            // Optionally, show an error message to the user
        } finally {
            this.spinner?.classList.add('d-none');
            this.showMoreButton?.removeAttribute('disabled');
            this.isLoading = false;
        }
    }
}
