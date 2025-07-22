function getAvatarUrl(avatar) {
    if (!avatar) return null;

    if (avatar.startsWith('http://') || avatar.startsWith('https://')) {
        return avatar;
    }

    return `/storage/${avatar}`;
}

/**
 * Renders an announcement card HTML string.
 * @param {object} announcement - The announcement data object.
 * @param {number|null} currentUserId - Currently authenticated user ID.
 * @returns {string}
 */
function renderAnnouncementCard(announcement, currentUserId = null) {
    const fullName = announcement.created_by.full_name || '';
    const initial = fullName.charAt(0).toUpperCase();
    const avatarUrl = getAvatarUrl(announcement.created_by.avatar);

    const isCreator = announcement.created_user_id === currentUserId;

    const avatarHtml = avatarUrl
        ? `<img src="${avatarUrl}" alt="avatar" />`
        : `<div class="avatar-placeholder" style="width: 50px; height: 50px; background-color: #ccc; color: #333; font-weight: bold; font-size: 24px; text-align: center; line-height: 50px; border-radius: 20%; user-select: none;">
                ${initial}
            </div>`;

    const dropdownMenu = isCreator ? `
        <div class="card-toolbar">
            <div class="m-0">
                <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4"
                        data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end"
                        data-kt-menu-overflow="true">
                    <i class="ki-duotone ki-dots-square fs-1">
                        <span class="path1"></span><span class="path2"></span>
                        <span class="path3"></span><span class="path4"></span>
                    </i>
                </button>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                     data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Actions</div>
                    </div>
                    <div class="separator mb-3 opacity-75"></div>
                    <div class="menu-item px-3">
                        <a class="menu-link px-3"
                           data-bs-toggle="modal"
                           data-bs-target="#updateAnnouncementModal"
                           data-id="${announcement.id}"
                           data-title="${announcement.title}"
                           data-message="${announcement.message}">
                            Edit
                        </a>
                    </div>
                    <div class="menu-item px-3">
                        <a class="menu-link px-3"
                           data-bs-toggle="modal"
                           data-bs-target="#deleteAnnouncementModal-${announcement.id}"
                           data-id="${announcement.id}">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    ` : '';

    return `
        <div class="card card-flush mb-10 shadow-sm">
            <div class="card-header pt-9">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-5">
                        ${avatarHtml}
                    </div>
                    <div class="flex-grow-1">
                        <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">
                            ${fullName}
                        </a>
                        <span class="text-gray-500 fw-semibold d-block">
                            ${announcement.created_at_locale}
                        </span>
                    </div>
                    ${dropdownMenu}
                </div>
            </div>
            <div class="card-body">
                <div class="badge badge-light-primary mb-2">
                    ${announcement.type_definition?.description_tr || ''}
                </div>
                <div class="fs-5 fw-bold text-gray-800 mb-2">
                    ${announcement.title}
                </div>
                <div class="fs-6 fw-normal text-gray-700 mb-5">
                    ${announcement.message}
                </div>
                <div class="text-muted small">
                    <strong>Subject:</strong> ${announcement.subject_type.split('\\').pop()} #${announcement.subject_id}
                </div>
                ${announcement.sport_type_name ? `
                    <div class="text-muted small mt-1">
                        <strong>Spor Türü:</strong> ${announcement.sport_type_name}
                    </div>` : ''
                }
            </div>
        </div>
    `;
}
