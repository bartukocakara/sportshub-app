<script>
    $(document).ready(function () {
        // Initialize the map
        const map = L.map('kt_contact_map').setView([37.0, 30.0], 10);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Court data from backend
        const courts = @json($homeData['courts']['data']);

        $.each(courts, function (index, court) {
            if (court.latitude && court.longitude) {
                const marker = L.marker([court.latitude, court.longitude]).addTo(map);

                // Add popup with court details
                marker.bindPopup(`
                    <strong>${court.title || 'Unnamed Court'}</strong><br>
                    ${court.street_name}, ${court.neighborhood}<br>
                    <a href="/courts/${court.id}">View Details</a>
                `);
            }
        });
    });
</script>
