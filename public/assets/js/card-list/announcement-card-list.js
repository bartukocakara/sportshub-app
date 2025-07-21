// public/assets/js/card-list-renderer.js

/**
 * Renders an announcement card HTML string.
 * @param {object} announcement - The announcement data object.
 * @returns {string} The HTML string for the announcement card.
 */
function renderAnnouncementCard(announcement) {
    const avatar = announcement.created_by.avatar ?? 'default.png';

    return `
        <div class="card card-flush mb-10 shadow-sm">
            <div class="card-header pt-9">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px me-5">
                        <img src="/avatar/${avatar}" alt="" />
                    </div>
                    <div class="flex-grow-1">
                        <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">
                            ${announcement.created_by.full_name}
                        </a>
                        <span class="text-gray-500 fw-semibold d-block">
                            ${announcement.created_at_locale}
                        </span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="m-0">
                        <button
                            class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4"
                            data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end"
                            data-kt-menu-overflow="true"
                        >
                            <i class="ki-duotone ki-dots-square fs-1">
                                <span class="path1"></span><span class="path2"></span>
                                <span class="path3"></span><span class="path4"></span>
                            </i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                    {{ __('messages.actions') }}
                                </div>
                            </div>
                            <div class="separator mb-3 opacity-75"></div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Ticket</a>
                            </div>
                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                <a href="#" class="menu-link px-3">
                                    <span class="menu-title">New Group</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                    <div class="menu-item px-3">
                                        <a href="#" class="menu-link px-3">Admin Group</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="fs-6 fw-normal text-gray-700 mb-5">
                    ${announcement.message}
                </div>
            </div>
            <div class="card-footer pt-0"></div>
        </div>
    `;
}

// export { renderAnnouncementCard };
