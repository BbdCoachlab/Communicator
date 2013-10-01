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
            },
            rsvp: {
                required: true
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
            },
            rsvp: {
                required: "Please provide an email address to which RSVP messages must be sent to"
            }
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
    });
});