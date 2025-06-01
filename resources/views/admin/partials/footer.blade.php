<script>
    setTimeout(function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            alert.classList.add('opacity-0'); // Mulai fade-out
            setTimeout(() => alert.remove(), 500); // Hapus elemen dari DOM setelah animasi
        }
    }, 5000); // 5000ms = 5 detik
</script>

</script>
</body>