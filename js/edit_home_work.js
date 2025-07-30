$(document).ready(function(){

    $('#home_work_comments').keyup(function() {
        $('#hw_char_count').val(this.value.length)
    });
});
