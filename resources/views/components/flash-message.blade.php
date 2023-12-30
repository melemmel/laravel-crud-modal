@if (session()->has('message'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                Swal.fire({
                    title: "Good job!",
                    text: "{{ session('message') }}",
                    icon: "success"
                });
            }, 1000);
        });
    </script>
@endif
