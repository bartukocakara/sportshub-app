// match-card-list.js

function renderMatchCard(match) {
    const formatDate = (dateString) => {
        if (!dateString) return 'N/A';
        const options = { month: 'short', day: '2-digit', year: 'numeric' };
        return new Date(dateString).toLocaleDateString('en-US', options);
    };

    const formatTime = (timeString) => {
        if (!timeString) return 'N/A';
        const [hours, minutes] = timeString.split(':');
        return `${hours}:${minutes}`;
    };

    // Construct image paths
    const sportTypeImage = (match.sport_type && match.sport_type.path)
        ? match.sport_type.img // Assuming img already contains the full URL or relative path handled by asset()
        : window.DEFAULT_XING_ICON;

    const courtImage = (match.court && match.court.first_image)
        ? window.ASSET_URL + 'storage/' + match.court.first_image // Use ASSET_URL for storage paths
        : window.DEFAULT_XING_ICON;

    // Construct the dynamic route
    const matchActivityUrl = window.MATCHES_ACTIVITIES_ROUTE.replace('__ID__', match.id);

    // Calculate progress (if you have actual data for it, otherwise it's 0%)
    const currentPlayers = match.current_players || 0; // Assuming API provides current players
    const maxPlayers = match.max_player || 1; // Avoid division by zero
    const progressPercentage = (currentPlayers / maxPlayers) * 100;


    return `
        <div class="col-md-6 col-xl-4">
            <div class="card border shadow-sm">
                <div class="card-header border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol symbol-50px w-50px bg-light">
                            <img src="${sportTypeImage}" alt="${match.sport_type ? match.sport_type.title : 'Default Icon'}" class="p-3" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <span class="badge ${match.status_badge} fw-bold me-auto px-4 py-3">${match.status_definition}</span>
                    </div>
                </div>
                <div class="card-body p-9">
                    <div class="d-flex align-items-center mb-5">
                        <img src="${courtImage}"
                            alt="Court Image"
                            class="me-3 rounded" style="width: 50px; height: 50px; object-fit: cover;" />
                        <div class="fs-3 fw-bold text-gray-900">
                            <a href="${matchActivityUrl}">${match.title}</a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap mb-5">
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">
                                ${match.expiring_date ? formatDate(match.expiring_date) : (match.play_date ? formatDate(match.play_date) : 'No Due Date')}
                            </div>
                            <div class="fw-semibold text-gray-500">Due Date</div>
                        </div>
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">
                                ${match.city_title || 'N/A'}
                            </div>
                            <div class="fw-semibold text-gray-500">City</div>
                        </div>
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">
                                ${match.court ? match.court.title : 'N/A'}
                            </div>
                            <div class="fw-semibold text-gray-500">Court</div>
                        </div>
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">
                                ${match.from_hour && match.to_hour ? `${formatTime(match.from_hour)} - ${formatTime(match.to_hour)}` : 'N/A'}
                            </div>
                            <div class="fw-semibold text-gray-500">Time</div>
                        </div>
                    </div>

                    <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="Project completion" data-bs-original-title="Project completion" data-kt-initialized="1">
                        <div class="bg-primary rounded h-4px" role="progressbar" style="width: ${progressPercentage}%" aria-valuenow="${progressPercentage}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="symbol-group symbol-hover">
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="No users assigned" data-bs-original-title="No users assigned" data-kt-initialized="1">
                            <span class="symbol-label bg-secondary text-inverse-secondary fw-bold">?</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}
