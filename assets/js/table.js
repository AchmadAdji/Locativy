$(document).ready(function() {
    // Inisialisasi DataTables
    const table = $('#barangHilangTable').DataTable({
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
        },
        columnDefs: [
            {
                targets: 3, // Kolom "Jenis Laporan" (indeks 3)
                render: function(data, type, row) {
                    // Tambahkan badge warna berbeda untuk tiap jenis laporan
                    const badgeClass = data === 'Laporan Kehilangan Barang' 
                        ? 'bg-danger' 
                        : 'bg-success';
                    return `<span class="badge ${badgeClass}">${data}</span>`;
                }
            }
        ]
    });

  
    // Filter tombol handler
    $('.filter-btn').on('click', function() {
        const filterValue = $(this).data('filter');
        table.column(3).search(filterValue).draw();
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
    });
});



  



$(document).ready(function() {
    const table = $('#barangHilangTable').DataTable({
        // ... (previous DataTable config)

        columns: [
            { data: 'no' },
            { data: 'username' },
            { data: 'jenis_barang' },
            { 
                data: 'jenis_laporan',
                render: function(data, type, row) {
                    // Tambahkan badge warna berbeda untuk tiap jenis laporan
                    const badgeClass = data === 'Laporan Kehilangan Barang' 
                        ? 'bg-danger' 
                        : 'bg-success';
                    return `<span class="badge ${badgeClass}">${data}</span>`;
                }
            },
            { data: 'tempat' },
            { data: 'gambar' },
            { data: 'waktu' },
            { data: 'aksi' }
        ]
    });

   


    $('#barangHilangTable').on('click', '.btn-delete', function() {
        const id = $(this).data('id');
        const confirmDelete = confirm(`Apakah Anda yakin ingin menghapus data dengan ID: ${id}?`);
        if (confirmDelete) {
            // Kirim permintaan DELETE ke backend
            fetch(`/api/barang-hilang/${id}`, {
                method: 'DELETE',
            })
            .then(response => response.json())
            .then(data => {
                alert('Data berhasil dihapus.');
                location.reload(); // Muat ulang halaman untuk memperbarui tabel
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    });
     // Event listener untuk tombol Edit
     $('#barangHilangTable').on('click', '.btn-edit', function() {
        const id = $(this).data('id'); // Ambil ID dari atribut data-id
        // Isi form edit dengan data yang sesuai (contoh)
        $('#username').val('john_doe');
        $('#jenisBarang').val('Dompet');
        $('#jenisLaporan').val('Kehilangan');
        $('#tempat').val('Pos Satpam Gedung A');
        $('#waktu').val('2023-10-01T14:30');
        // Tampilkan modal edit
        $('#editModal').modal('show');
    });

    // Event listener untuk tombol Hapus
    $('#barangHilangTable').on('click', '.btn-delete', function() {
        const id = $(this).data('id'); // Ambil ID dari atribut data-id
        // Set ID data yang akan dihapus
        $('#confirmDelete').data('id', id);
        // Tampilkan modal hapus
        $('#deleteModal').modal('show');
    });

    // Event listener untuk tombol Hapus di modal
    $('#confirmDelete').on('click', function() {
        const id = $(this).data('id'); // Ambil ID dari atribut data-id
        alert(`Data dengan ID: ${id} berhasil dihapus.`);
        // Tambahkan logika untuk menghapus data di sini
        $('#deleteModal').modal('hide');
    });
});