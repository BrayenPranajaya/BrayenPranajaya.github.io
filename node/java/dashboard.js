let currentPage = 1;
const rowsPerPage = 8; // Jumlah baris yang ditampilkan per halaman
const tableBody = document.getElementById('table-body');

// Ambil semua baris tabel dan simpan dalam array
const rows = Array.from(tableBody.getElementsByTagName('tr'));

// Hitung total halaman
const totalPages = Math.ceil(rows.length / rowsPerPage);

// Fungsi untuk mengupdate tampilan tabel berdasarkan halaman yang aktif
function updateTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;

    // Sembunyikan semua baris
    rows.forEach((row, index) => {
        row.style.display = (index >= start && index < end) ? '' : 'none';
    });

    // Update tombol pagination
    document.getElementById('prev-btn').style.display = currentPage === 1 ? 'none' : '';
    document.getElementById('next-btn').style.display = currentPage === totalPages ? 'none' : '';
}

// Fungsi untuk mengubah halaman
function changePage(direction) {
    currentPage += direction;

    // Pastikan currentPage tidak kurang dari 1 atau lebih dari totalPages
    if (currentPage < 1) currentPage = 1;
    if (currentPage > totalPages) currentPage = totalPages;

    updateTable();
}

// Inisialisasi tabel pada load pertama
updateTable();
