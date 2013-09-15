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

    $('#dj-equipment').on('change, keyup', function(e) {
        var value = $(this).val(),
            sources = equipmentList,
            modal = $(this).closest('.modal');


        if ($.inArray(value, sources) == -1) {
            $('.modal-submit-btn', modal).addClass('disabled');
        } else {
            $('.modal-submit-btn', modal).removeClass('disabled');
        }
    });

    $('.modal form').on('submit', function(e) {
        var modalSubmitBtn = $(this)
            .closest('.modal').find('.modal-submit-btn');
        if (modalSubmitBtn.hasClass('disabled')) {
            e.preventDefault();
            return false;
        } else {
            return true;
        }
    });

    $('.modal-submit-btn').live('click', function(e) {
        e.stopPropagation();
        if ($(this).hasClass('disabled')) {
            return false;
        }
        $('form', modal).submit();
    });
});
