<script>
document.addEventListener('DOMContentLoaded', function () {
    // Image box addition
    const addImageBoxButton = document.getElementById('add-image-box');
    if (addImageBoxButton) {
        addImageBoxButton.addEventListener('click', addImageBox);
    }
    // Leaflet map initialization
    const latInput = document.querySelector('input[name="court_address[latitude]"]');
    const lngInput = document.querySelector('input[name="court_address[longitude]"]');
    const defaultLat = 37.0;
    const defaultLng = 30.0;
    const map = L.map('kt_contact_map').setView([defaultLat, defaultLng], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(map);
    let marker;
    function updateLatLngInputs(lat, lng) {
        if (latInput && lngInput) {
            latInput.value = lat;
            lngInput.value = lng;
        }
    }
    function moveMarkerIfValid(lat, lng) {
        if (!isNaN(lat) && !isNaN(lng)) {
            if (!marker) {
                marker = L.marker([lat, lng], { draggable: true }).addTo(map);
                marker.on('dragend', function (event) {
                    const position = event.target.getLatLng();
                    updateLatLngInputs(position.lat.toFixed(6), position.lng.toFixed(6));
                });
            } else {
                marker.setLatLng([lat, lng]);
            }
            map.setView([lat, lng], 14);
        }
    }
    // Initialize map with existing coordinates
    const initialLat = parseFloat(latInput?.value);
    const initialLng = parseFloat(lngInput?.value);
    if (!isNaN(initialLat) && !isNaN(initialLng)) {
        moveMarkerIfValid(initialLat, initialLng);
    }
    // Update marker on map click
    map.on('click', function (e) {
        const lat = e.latlng.lat.toFixed(6);
        const lng = e.latlng.lng.toFixed(6);
        moveMarkerIfValid(lat, lng);
        updateLatLngInputs(lat, lng);
    });
    // Update marker on input change
    latInput?.addEventListener('input', () => {
        const lat = parseFloat(latInput.value);
        const lng = parseFloat(lngInput.value);
        moveMarkerIfValid(lat, lng);
    });
    lngInput?.addEventListener('input', () => {
        const lat = parseFloat(latInput.value);
        const lng = parseFloat(lngInput.value);
        moveMarkerIfValid(lat, lng);
    });
    // City and district dropdown population
    const citySelect = document.getElementById('city-select');
    const districtSelect = document.getElementById('district-select');
    const oldDistrictId = '{{ old('court_address.district_id', '') }}';
    if (citySelect && districtSelect) {
        citySelect.addEventListener('change', function () {
            const cityId = this.value;
            districtSelect.innerHTML = '<option value="">{{ __('messages.select_district') }}</option>';
            if (!cityId) return;
            districtSelect.innerHTML = '<option value="">{{ __('messages.loading') }}...</option>';
            fetch(`/api/districts/cities/${cityId}`)
                .then(response => {
                    if (!response.ok) throw new Error('Failed to fetch districts');
                    return response.json();
                })
                .then(data => {
                    let options = '<option value="">{{ __('messages.select_district') }}</option>';
                    data?.result?.data?.forEach(district => {
                        const selected = district.id == oldDistrictId ? 'selected' : '';
                        options += `<option value="${district.id}" ${selected}>${district.title}</option>`;
                    });
                    districtSelect.innerHTML = options;
                })
                .catch(() => {
                    districtSelect.innerHTML = '<option value="">{{ __('messages.load_failed') }}</option>';
                });
        });
        // Trigger district fetch if city is preselected
        if (citySelect.value) {
            citySelect.dispatchEvent(new Event('change'));
        }
    }
});
</script>
