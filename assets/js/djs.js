$(function() {

    var dataTableVars = {
        'aaSorting': [[ 1, 'asc' ]],
        'iDisplayLength' : 25,
        'sDom': '<"row-fluid"<"span5"l><"span5"f>r>t<"row-fluid"<"span5"i>' +
            '<"span5"p>>',
        'sPaginationType': 'bootstrap'
    };
    $('#djs-table').dataTable(dataTableVars);

});
