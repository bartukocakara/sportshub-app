document.addEventListener('DOMContentLoaded', function() {

    const initializeMap = (elementId, location) => {
        if (!location?.latitude || !location?.longitude) {
            document.getElementById(elementId).innerHTML = `
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="text-center text-gray-600">
                        <i class="ki-duotone ki-geolocation fs-3x mb-3"></i>
                        <p class="mb-0">${@json(__('messages.location_not_available'))}</p>
                    </div>
                </div>
            `;
            return;
        }

        const map = L.map(elementId).setView([location.latitude, location.longitude], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Custom icon for the marker
        const locationIcon = L.icon({
            iconUrl: '{{ asset("assets/media/icons/location-marker.png") }}',
            iconSize: [32, 32],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        // Add marker with custom popup
        const marker = L.marker([lat, lng], { icon: locationIcon }).addTo(map);

        if (location.name || location.address) {
            const popupContent = `
                <div class="map-popup">
                    ${location.name ? `<h4>${location.name}</h4>` : ''}
                    ${location.address ? `<p>${location.address}</p>` : ''}
                </div>
            `;
            marker.bindPopup(popupContent).openPopup();
        }

        // Add zoom controls
        map.zoomControl.setPosition('bottomright');

        // Refresh map when it becomes visible
        map.invalidateSize();
    };
});
