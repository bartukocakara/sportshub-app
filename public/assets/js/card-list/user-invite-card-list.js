function getAvatarUrl(avatar) {
    if (!avatar) return '/assets/media/avatars/blank.png';

    if (avatar.startsWith('http://') || avatar.startsWith('https://')) {
        return avatar;
    }

    return `/storage/${avatar}`;
}

function renderUserCard(user) {
    const avatarUrl = getAvatarUrl(user.avatar);
    const fullName = user.full_name || '';
    const userId = user.id;
    const profileUrl = `/users/profile/${userId}`;
    const inviteModalId = `invite-request-${userId}`;
    const isSelected = window.selectedUserIds.includes(userId);
    const cardBorderClass = isSelected ? 'border-primary' : '';
    const cardBorderStyle = isSelected ? '2px' : '1px';

    // Define the modalData object with all necessary properties
    const modalData = {
        id: inviteModalId,
        borderColor: 'border-primary', // Example: 'border-info', 'border-success', etc.
        bgColor: 'bg-primary', // Example: 'bg-info', 'bg-success', etc.
        iconColor: 'text-white', // Example: 'text-white', 'text-dark', etc.
        title: window.translations?.invite_confirmation || 'Invite Player to Team', // Ensure this translation key exists
        message: window.translations?.invite_player_message || 'Are you sure you want to invite this player?',
        emotionalWarning: window.translations?.invite_emotional_warning, // Optional: "This action cannot be undone."
        emoji: '🚀', // Optional: '�', '⭐'
        btnClass: 'btn-primary', // Example: 'btn-info', 'btn-success'
        buttonText: window.translations?.invite || 'Invite',
        // The closeButtonClass is derived within renderInviteModal based on bgColor
    };

    return `
        <div class="col-md-6 col-xxl-4">
            <div class="card border shadow-sm ${cardBorderClass}" style="border-width: ${cardBorderStyle};">
                <div class="card-body d-flex flex-center flex-column py-9 px-5">
                    <div class="symbol symbol-65px symbol-circle mb-5 position-relative">
                        <img src="${avatarUrl}" alt="image" />
                        <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                    </div>
                    <a href="${profileUrl}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">${fullName}</a>
                    <div class="fw-semibold text-gray-500 mb-6"></div>
                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#${inviteModalId}">
                        <i class="fas fa-user-plus me-1"></i> ${window.translations?.invite || 'Invite'}
                    </button>
                </div>
            </div>
        </div>
        ${renderInviteModal(modalData, userId)}
    `;
}

function renderInviteModal(modalData, userId) {
    const route = `/teams/${window.teamId}/invite-players/${userId}`;
    // Determine the close button class based on the background color
    const closeButtonClass = modalData.bgColor === 'bg-warning' ? '' : 'btn-close-white';

    return `
        <div class="modal fade" id="${modalData.id}" tabindex="-1" aria-labelledby="${modalData.id}_label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ${modalData.borderColor} shadow-lg rounded-4">

                    <div class="modal-header ${modalData.bgColor}">
                        <h5 class="modal-title fw-bold" id="${modalData.id}_label">
                            <i class="fas fa-star me-2 ${modalData.iconColor}"></i> ${modalData.title}
                        </h5>
                        <button type="button" class="btn-close ${closeButtonClass}" data-bs-dismiss="modal" aria-label="${window.translations?.close || 'Close'}"></button>
                    </div>

                    <div class="modal-body text-center py-4">
                        <p class="fs-5 fw-semibold mb-2">${modalData.message}</p>
                        ${modalData.emotionalWarning ? `<p class="text-muted fst-italic mb-3">${modalData.emotionalWarning}</p>` : ''}
                        ${modalData.emoji ? `<div class="fs-1 mb-2" role="img" aria-label="Emoji">${modalData.emoji}</div>` : ''}
                        <form method="POST" action="${route}" class="d-inline">
                            <input type="hidden" name="_token" value="${window.csrfToken}">
                            <div class="mb-3 text-start px-4">
                                <label for="title" class="form-label fw-semibold">
                                    ${window.translations?.title || 'Title'}
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    max="255"
                                    placeholder="${window.translations?.enter_title || 'Enter title'}"
                                >
                            </div>
                            <button type="submit" class="btn ${modalData.btnClass} btn-lg shadow">
                                <i class="fas fa-handshake me-2"></i> ${modalData.buttonText}
                            </button>
                        </form>
                    </div>

                    <div class="modal-footer justify-content-center pb-4">
                        <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-dismiss="modal">
                            ${window.translations?.cancel || 'Not Now'}
                        </button>
                    </div>

                </div>
            </div>
        </div>
    `;
}
