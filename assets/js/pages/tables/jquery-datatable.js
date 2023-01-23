$(function () {
    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ]
    });
});