    // Pagelength override scripts
    $.extend(true, $.fn.dataTable.defaults, {
    "pageLength": 20,
    "lengthMenu": [ [10, 20, 50, -1], [10, 20, 50, "All"] ]
    });
    $(document).ready(function() {
        $('#purchaseDataTable').DataTable();
    });