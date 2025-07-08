<script>
    const deleteConfirmModal = document.getElementById('deleteConfirmModal');
    deleteConfirmModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        const button = event.relatedTarget;
        // Extract info from data-delete-url attribute
        const deleteUrl = button.getAttribute('data-delete-url');
        // Update the modal's form action
        const deleteConfirmForm = document.getElementById('deleteConfirmForm');
        deleteConfirmForm.setAttribute('action', deleteUrl);
    });
</script>
