$(document).ready(function () {


    function numberOfDays() {
        var start = $("#start").datepicker("getDate");
        var end = $("#end").datepicker("getDate");
        var days = (end - start) / (1000 * 60 * 60 * 24);
        var diff = (Math.round(days));

        if (diff === 1) {

            var text = " You are paying insurance for " + diff + " day";

        } else {

            var text = " You are paying insurance for " + diff + " days";
        }

        var content = '<div class="alert alert-info" role="alert">\n\
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n\
                                <small><b>Notice:</b>' + text + '</small>\n\
                           </div>';

        if (end > start) {

            $("#notice").html(content);

        }

    }

    $("#start").datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $("#end").datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function () {

            if ($("#start").datepicker("getDate")) {

                numberOfDays();
            }
        }
    });

    $('.repeater').repeater({});

    var button = $('.repeater .btn-primary');

    $(button).on('click', function (e) {

        e.preventDefault();

        $.ajax({

            "url": "process.php",
            "method": "POST",
            data: $('.repeater').serialize(),
            success: function (data)
            {
                alert(data);
                $('.repeater')[0].reset();
            }
        });

    });


    $("#policy-form").validate({
        highlight: function (element) {
            $(element).closest('.form-group').addClass("has-danger");
            $(element).addClass("contact-form-danger");
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-danger');

        },
        rules: {

            name: {
                required: true,
                rangelength: [2, 20]
            },

            surname: {
                required: true,
                rangelength: [2, 20]
            },

            email: {
                required: true,
                email: true
            },

            phone: {
                required: true

            },

            departure_date: {
                required: true
            },

            return_date: {
                required: true
            }

        },
        messages: {

            name: {
                required: "First name is required!",
                rangelength: "First name must be beetween 2 and 20 chars long"
            },

            surname: {

                required: "Last name is required!",
                rangelength: "Last name must be beetween 2 and 20 chars long"
            },

            email: {
                required: "Email field is required!",
                email: "Enter valid email adress!"
            },

            phone: {
                required: "Phone is required!"

            },

            departure_date: {
                required: "Departure date is required!"
            },

            return_date: {
                required: "Return date is required!"
            }
        },
        errorElement: 'p',
        errorPlacement: function (error, element) {
            error.appendTo($(element).closest('.form-group').find('.error'));
        }
    });
});


