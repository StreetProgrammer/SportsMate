//////////////////////start check all records in datatable using one checkbox ///////////////////////////////////
function check_all() {
    $('input[class="item_checkbox"]:checkbox').each(function() {
        if ( $('input[class="checkAll"]:checkbox:checked').length == 0 ) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
    });
}
//////////////////////end check all records in datatable using one checkbox ///////////////////////////////////
///////////////////////////////////// delete all 
function delete_all() {

    $(document).on('click', '.del_all', function() {
       $('#form_data').submit();
    });
    

    $(document).on('click', '.delBtn', function() {
        var item_checked = $('input[class="item_checkbox"]:checkbox').filter(':checked').length;
        if ( item_checked > 0 ) {

            $('.notEmptyRecord').removeClass('hidden') ;
            $('.record_count').text(item_checked);
            $('.emptyRecord').addClass('hidden') ;
        } else {
            $('.emptyRecord').removeClass('hidden') ;
            $('.notEmptyRecord').addClass('hidden') ;
        }
        $('#multipleDelete').modal('show');
        //alert('done');
    });
}
