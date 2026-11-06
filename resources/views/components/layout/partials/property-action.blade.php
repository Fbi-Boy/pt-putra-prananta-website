<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi Share (Bagikan)
        document.querySelectorAll('[data-share]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.dataset.share;
                const title = this.dataset.title;

                if (navigator.share) {
                    navigator.share({ title: title, url: url }).catch(console.error);
                } else {
                    navigator.clipboard.writeText(url).then(() => {
                        alert('Tautan properti berhasil disalin!');
                    });
                }
            });
        });

        // Fungsi Favorit (Simpan)
        document.querySelectorAll('[data-fav]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const isPressed = this.getAttribute('aria-pressed') === 'true';
                this.setAttribute('aria-pressed', !isPressed);

                // Di sini nanti bisa ditambahkan AJAX untuk simpan ke database
            });
        });
    });
</script>
