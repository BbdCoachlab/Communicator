$(document).ready(function () {    
    $("#basic_form").validate({
        rules: {
            subject: {
                required: true
            },
            department_list: {
                required:true
            }
        },
        messages: {
            subject: {
                required:"Please provide a subject"
            },
            department_list: {
                required: "Please select recipients of message"
            }
        },
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);                        
            $(element).parent().addClass("form-group has-error");
        }
    });

});