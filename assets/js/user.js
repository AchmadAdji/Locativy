$(document).ready(function() {
    const table = $('#userTable').DataTable();

    $('.filter-btn').on('click', function() {
        const filterValue = $(this).data('filter');
        table.column(4).search(filterValue).draw();
        $('.filter-btn').removeClass('active');
        $(this).addClass('active');
    });
});