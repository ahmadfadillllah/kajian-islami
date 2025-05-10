@if (session('success'))
    <script>
        Swal.fire({
        position: "top-end",
        icon: "success",
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000
        });
    </script>
@endif

@if (session('info'))
    <script>
        Swal.fire({
        position: "top-end",
        icon: "info",
        title: "{{ session('info') }}",
        showConfirmButton: false,
        timer: 3000
        });
    </script>
@endif
