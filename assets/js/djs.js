$(function() {

    var dataTableVars = {
        'aaSorting': [[ 1, 'asc' ]],
        'iDisplayLength' : 25,
        'sDom': '<"row-fluid"<"span5"l><"span5"f>r>t<"row-fluid"<"span5"i>' +
            '<"span5"p>>',
        'sPaginationType': 'bootstrap'
    };
    $('#djs-table').dataTable(dataTableVars);

    $('.dj-delete-check').live('click', function(e) {
        e.stopPropagation();
        var confirmDelete;

        confirmDelete = confirm('Are you sure you wish to delete?');
        if (confirmDelete === true) {
            return true;
        } else {
            return false;
        }
    });

    $('.datePicker').datepicker();
});
