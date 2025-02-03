
        // Inisialisasi DataTables
        $(document).ready(function() {
            $('#barangHilangTable').DataTable({
                pageLength: 15, // Menampilkan 15 data per halaman
                lengthMenu: [15, 30, 50, 100], // Opsi jumlah data per halaman
                ordering: true, // Mengaktifkan pengurutan
                searching: true, // Mengaktifkan fitur pencarian
                language: {
                    paginate: {
                        previous: '<i class="fas fa-chevron-left"></i>', // Tombol previous
                        next: '<i class="fas fa-chevron-right"></i>' // Tombol next
                    },
                    search: 'Cari:', // Label pencarian
                    lengthMenu: 'Tampilkan _MENU_ data per halaman', // Label length menu
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data', // Info tabel
                    emptyTable: 'Tidak ada data tersedia', // Pesan jika tabel kosong
                }
            });
        });
    