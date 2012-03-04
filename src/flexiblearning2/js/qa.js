/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var submitAnswer = function() {
    var form = this;
    var action = jQuery(form).attr('action');
    var data = jQuery(form).serialize();
    jQuery.post(action, data, function(data) {
        if (data != '-1') {
            jQuery(form).parentsUntil('.box-questions-and-answers').html(data);
            jQuery('form.frm-answer').bind('submit', submitAnswer);

        } else {
            alert('There is an error occured ! Please try again !');
        }
    });
    return false;
}
    
jQuery(document).ready(function() {
    jQuery('#question-form').submit(function() {
        var form = this;
        var action = jQuery(form).attr('action');
        var params = jQuery(form).serializeArray();
        if (params[0].value != '') {
            jQuery(form).find('textarea').val('');            
            jQuery.post(action, params, function(data) {
                jQuery(form).next('.box-questions-and-answers').html(data);
                jQuery('form.frm-answer').unbind('submit').bind('submit', submitAnswer);
            });
        } 
        return false;
    });
    
    jQuery('form.frm-answer').bind('submit', submitAnswer);
});

