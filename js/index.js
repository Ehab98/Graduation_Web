$(document).ready(function () {
    $("#Btnlogin").click(function () {
        var name = $("#Name").val();
        var address = $("#Address").val();
        var email = $("#Email").val();
        var number = $("#Number").val();
        var message = $("#message").val();

        $.ajax({
            type: "POST",
            url: "sendEmail.php",
            data: {
                name: name,
                address: address,
                email: email,
                number: number,
                message: message,
            },
            success: function (response) {
                if (response === "success") {
                    alert("Email sent successfully!");
                } else {
                    alert("Error sending email. Please try again later.");
                }
            },
            error: function () {
                alert("Error sending request. Please try again later.");
            },
        });
    });
});
