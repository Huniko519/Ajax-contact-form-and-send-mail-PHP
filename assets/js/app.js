$(document).ready(function () {
    var valid = false;
    $("#form-contact").validate({
        ignore: ".ignore",
        rules: {
            email: {
                required: true,
                email: true
            },
            message: {
                required: true
            },
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        invalidHandler: function (event, validator) {
            valid = false;
        },
        submitHandler: function () {
            valid = true;
        },
        errorClass: "validate-error-class",
        validClass: "validate-class"
    });
    $("#form-contact").submit(function (e) {
        e.preventDefault();
        if (valid == true) {
            $('#loading').show();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: 'sendmail.php',
                type: 'POST',
                data: formData,
                dataType: "json",
                // async: false,
                success: function (data) {                    
                    if (data.result) {
                        $("#form-contact input").val("");
                        $("#form-contact textarea").val("");
                    }
                    grecaptcha.reset();
                    $('#loading').hide();
                    $("#my_id").click();
                    $(".mail-result p").html(data.message);

                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        }
    });
});