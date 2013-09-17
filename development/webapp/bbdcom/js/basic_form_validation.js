/// <reference path="jquery.js" />
/// <reference path="jquery_validation.js" />

$(document).ready(function () {
        
    var validator = $("#basic_form").validate({
        rules: {
            subject: {
                required: true
            },
            department_list: {
                required: true
            },
            image: {
                accept: "png|jpg|jpeg|jpe|gif",
                fileSize: 2097152       //2MB
            }
        },
        messages: {
            subject: {
                required: "Please provide a subject"
            },
            department_list: {
                required: "Please select recipients of message"
            },
            image: {
                accept: "Please upload images only",
                fileSize: "Pleas upload image smaller than 2MB"
            }
        },
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
            $(element).parent().addClass("form-group has-error");
        }
    });

    $.validator.addMethod('fileSize', function (value, element, param) {
        if (value == "") {
            return true;
        }
        if (element.files[0].size > param)
        {
            return false;
        }

        return true;
    });

    $("#btn_cancel").click(function(){        
        validator.resetForm();
        $(".form-group.has-error").removeClass("form-group has-error");
    });
});