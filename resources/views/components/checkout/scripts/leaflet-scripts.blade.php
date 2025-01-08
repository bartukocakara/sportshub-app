<script>
    $(document).ready(function () {
        // Initialize the map with default latitude and longitude
        const map = L.map('kt_contact_map').setView([37.0, 30.0], 10);  // Default location (latitude: 37.0, longitude: 30.0)

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Court data (using a single court's data for now)
        const court = {
            title: 'Sample Court',  // Court title
            street_name: 'Sample Street',  // Street name
            neighborhood: 'Sample Neighborhood',  // Neighborhood
            id: 1,  // Court ID
            latitude: 37.0,  // Default latitude
            longitude: 30.0  // Default longitude
        };

        // Add the marker with the court's location
        const marker = L.marker([court.latitude, court.longitude]).addTo(map);

        // Add popup with court details
        marker.bindPopup(`
            <strong>${court.title}</strong><br>
            ${court.street_name}, ${court.neighborhood}<br>
            <a href="/courts/${court.id}">View Details</a>
        `);

        // Ensure the map properly adjusts its size
        map.invalidateSize();
    });
</script>
