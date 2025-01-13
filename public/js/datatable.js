$(document).ready(function() {
    var dataTable = $('#data_table').DataTable({
        lengthMenu: [
            [20, 50, 100, -1],
            [20, 50, 100, 'ทั้งหมด']
        ],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json',
        },
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const dateColumns = document.querySelectorAll('.date-column');
    dateColumns.forEach(function(cell) {
        const dateText = cell.textContent.trim();
        const dateParts = dateText.split('-');
        if (dateParts.length === 3) {
            let year = parseInt(dateParts[0], 10);
            const month = dateParts[1];
            const day = dateParts[2];
            year += 543;
            cell.textContent = `${day}/${month}/${year}`;
        }
    });
});
