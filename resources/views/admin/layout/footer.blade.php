    <!-- JS -->
    <script src="{{ asset('UI/Admin/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('UI/Admin/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('UI/Admin/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('UI/Admin/vendors/scripts/layout-settings.js') }}"></script>


    <!-- Plugins -->
    <script src="{{ asset('UI/Admin/src/plugins/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('UI/Admin/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('UI/Admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('UI/Admin/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('UI/Admin/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>


    {{-- Optional vendor dashboard script if you want --}}
    {{-- <script src="{{ asset('backend/vendors/scripts/dashboard3.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @yield('scripts')

    <script>
        // Get modal and form elements
        const deleteModal = document.getElementById('deleteModal');
        const confirmDelete = document.getElementById('confirmDelete');
        const cancelDelete = document.getElementById('cancelDelete');
        const deleteForm = document.getElementById('deleteForm'); // The form that will be submitted

        // Add event listener to open the modal when delete button is clicked
        document.querySelectorAll('.deleteButton').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent form submission
                deleteForm.action = this.getAttribute(
                'data-form-action'); // Set form action to delete route
                deleteModal.style.display = 'block'; // Show the modal
            });
        });

        // Close the modal if "No" is clicked
        cancelDelete.addEventListener('click', function() {
            deleteModal.style.display = 'none'; // Hide the modal
        });

        // Submit the form if "Yes" is clicked
        confirmDelete.addEventListener('click', function() {
            deleteForm.submit(); // Submit the delete form
        });
    </script>
