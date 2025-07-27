/**
 * Helper function to get the correct avatar URL.
 * It checks if the avatar path is a full URL or a relative path
 * and constructs the appropriate URL.
 * @param {string|null} avatar - The avatar path or URL.
 * @returns {string} The full URL for the avatar.
 */
function getAvatarUrl(avatar) {
    if (!avatar) return '/assets/media/avatars/blank.png'; // Default blank avatar

    if (avatar.startsWith('http://') || avatar.startsWith('https://')) {
        return avatar;
    }

    return `/storage/${avatar}`;
}

/**
 * Helper function to mimic Laravel's __() translation with parameters.
 * Assumes window.translations is populated with key-value pairs.
 * @param {string} key - The translation key.
 * @param {object} [params={}] - An object of parameters to replace in the translation string (e.g., { user_name: 'John' }).
 * @returns {string} The translated string.
 */
function getTranslation(key, params = {}) {
    let translation = window.translations?.[key] || key; // Fallback to key itself if not found

    for (const paramKey in params) {
        if (Object.prototype.hasOwnProperty.call(params, paramKey)) {
            // Replace :paramKey (e.g., :user_name) with the actual value
            translation = translation.replace(new RegExp(`:${paramKey}`, 'g'), params[paramKey]);
        }
    }
    return translation;
}

/**
 * Helper function to get a human-readable time difference ("X minutes ago").
 * @param {string} dateString - The date string (e.g., from activity.activity_at).
 * @returns {string} The human-readable time difference.
 */
function timeAgo(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const seconds = Math.floor((now - date) / 1000);

    if (seconds < 60) return seconds === 0 ? getTranslation('just_now') : getTranslation('seconds_ago', { count: seconds });
    const minutes = Math.floor(seconds / 60);
    if (minutes < 60) return getTranslation('minutes_ago', { count: minutes });
    const hours = Math.floor(minutes / 60);
    if (hours < 24) return getTranslation('hours_ago', { count: hours });
    const days = Math.floor(hours / 24);
    if (days < 30) return getTranslation('days_ago', { count: days });
    const months = Math.floor(days / 30);
    if (months < 12) return getTranslation('months_ago', { count: months });
    const years = Math.floor(months / 12);
    return getTranslation('years_ago', { count: years });
}


/**
 * Renders an activity card HTML string.
 * @param {object} activity - The activity data object.
 * @returns {string} The HTML string for the activity card.
 */
function renderActivityCard(activity) {
    const iconSvgMap = {
        'match.created': {
            color: '#009ef7', // Mavi
            svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#009ef7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>`
        },
        'match.joined': {
            color: '#50cd89', // Yeşil
            svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#50cd89" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="8.5" cy="7" r="4"></circle>
                <polyline points="17 11 19 13 23 9"></polyline>
            </svg>`
        },
        'team.created': {
            color: '#f6c000', // Sarı
            svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#f6c000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87c-.6-.6-1.4-.87-2-.13c-.6.6-1.4.87-2 .13-.6-.6-1.4-.87-2-.13a4 4 0 0 0-3 3.87v2"></path>
                <circle cx="16" cy="7" r="4"></circle>
            </svg>`
        },
        'team.joined': {
            color: '#71C0EB',
            svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#71C0EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="8.5" cy="7" r="4"></circle>
                <line x1="20" y1="8" x2="20" y2="14"></line>
                <line x1="23" y1="11" x2="17" y2="11"></line>
            </svg>`
        },
        'team.updated': {
            color: '#fd7e14', // Kırmızı
            svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#fd7e14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0114.13-3.36L23 10m-2.49 5a9 9 0 01-14.13 3.36L1 14"></path></svg>`
        },
    };
    const defaultIcon = {
        color: '#a1a5b7',
        svg: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#a1a5b7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="16" x2="12" y2="12"></line>
            <line x1="12" y1="8" x2="12.01" y2="8"></line>
        </svg>`
    };

    const icon = iconSvgMap[activity?.type] || defaultIcon;
    // Use optional chaining for properties to prevent errors if they are undefined
    const activityMessageKey = activity?.properties?.key || 'unknown_activity';
    const activityMessageParams = activity?.properties?.params || {};
    const translatedActivityMessage = getTranslation(activityMessageKey, activityMessageParams);
    const timeDiff = activity?.activity_at ? timeAgo(activity.activity_at) : getTranslation('unknown_time');
    const is_show = window.is_show === true; // sadece açıkça true ise göster
    // Conditional rendering for the subject link
    const subjectLinkHtml = is_show && activity?.subject_url ? `
        <div class="px-3">
            <a href="${activity.subject_url}" class="btn btn-sm btn-light btn-active-light-primary">
                ${getTranslation('view')} ${activity.subject_title || ''}
            </a>
        </div>
    ` : '';

    return `
        <div class="timeline-item mt-5">
            <div class="timeline-line"></div>
            <div class="timeline-icon">
                <span class="svg-icon svg-icon-1" style="color: ${icon.color};">
                    ${icon.svg}
                </span>
            </div>
            <div class="timeline-content mb-10 mt-n1">
                <div class="pe-3 mb-2">
                    <div class="fs-5 fw-semibold text-gray-800">
                        ${translatedActivityMessage}
                    </div>
                    <div class="d-flex align-items-center mt-1 fs-6 text-muted">
                        <span class="me-2 fs-7">
                            ${timeDiff}
                        </span>
                    </div>
                </div>
                ${subjectLinkHtml}
            </div>
        </div>
    `;
}
