<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""> </script>
<script>
    $(document).ready(function () {
        // Initialize the map
        const map = L.map('kt_contact_map').setView([37.0, 30.0], 10);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Court data from backend
        const courts = @json($datas['courts']['data']);

        $.each(courts, function (index, court) {
            let latitude = null;
            let longitude = null;

            // Check if latitude and longitude are available from court_business
            if (court.court_business && court.court_business.latitude && court.court_business.longitude) {
                latitude = court.court_business.latitude;
                longitude = court.court_business.longitude;
            }
            // If not, check court_address for latitude and longitude
            else if (court.court_address && court.court_address.latitude && court.court_address.longitude) {
                latitude = court.court_address.latitude;
                longitude = court.court_address.longitude;
            }

            // If latitude and longitude are available, add the marker
            if (latitude && longitude) {
                const marker = L.marker([latitude, longitude]).addTo(map);

                // Add popup with court details
                marker.bindPopup(`
                    <strong>${court.title || 'Unnamed Court'}</strong><br>
                    ${court.street_name || 'No Street Info'}, ${court.neighborhood || 'No Neighborhood Info'}<br>
                    <a href="/courts/${court.id}">View Details</a>
                `);
            }
        });
    });
</script>
