function getAvatarUrl(avatar) {
    if (!avatar) return '/assets/media/avatars/blank.png';

    if (avatar.startsWith('http://') || avatar.startsWith('https://')) {
        return avatar;
    }

    return `/storage/${avatar}`;
}

/**
     * Renders a user card HTML string.
     * @param {object} user - The user data object.
     * @returns {string}
     */
    function renderUserCard(user) {
        const avatarUrl = getAvatarUrl(user.avatar);
        const fullName = user.full_name || '';
        const userId = user.id;
        const profileUrl = `/users/profile/${userId}`;
        const isSelected = window.selectedUserIds.includes(userId);
        const cardBorderClass = isSelected ? 'border-primary' : '';
        const cardBorderStyle = isSelected ? '2px' : '1px';
        const checkedAttribute = isSelected ? 'checked' : '';


        return `
            <div class="col-md-6 col-xxl-4">
                <div class="card border shadow-sm player-card ${cardBorderClass}" style="border-width: ${cardBorderStyle};">
                    <div class="card-body d-flex flex-center flex-column py-9 px-5">
                        <div class="symbol symbol-65px symbol-circle mb-5">
                            <img src="${avatarUrl}" alt="image" />
                            <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                        </div>
                        <a href="${profileUrl}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">${fullName}</a>
                        <div class="fw-semibold text-gray-500 mb-6">Art Director at Novica Co.</div>
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="user_ids[]" value="${userId}" id="player_${userId}" ${checkedAttribute} />
                            <label class="form-check-label" for="player_${userId}">
                                ${window.translations?.select_player || 'Oyuncuyu Seç'}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
