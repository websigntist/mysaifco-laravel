<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
        Notiflix.Notify.success("{{ session('success') }}", {
            position: 'right-top',
            timeout: 5000,
        });
        @endif

        @if (session('error'))
        Notiflix.Notify.failure("{{ session('error') }}", {
            position: 'right-top',
            timeout: 5000,
        });
        @endif

        @if (session('warning'))
        Notiflix.Notify.warning("{{ session('warning') }}", {
            position: 'right-top',
            timeout: 5000,
        });
        @endif

        @if (session('info'))
        Notiflix.Notify.info("{{ session('info') }}", {
            position: 'right-top',
            timeout: 5000,
        });
        @endif
    });
</script>
