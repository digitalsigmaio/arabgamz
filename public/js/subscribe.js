/**
 * Created by Manson on 11/21/2017.
 */

$(document).ready(function(){
    $('.list-inline-item').click(function() {
        var operator = '#' + $(this).children('input').val();
        $('option').attr('selected', false);
        $(operator).attr('selected', true);
    });
});