$(document).ready(function() {

    $("#email").keyup(function() {

        var email = $(this).val().trim();

        if(email != ''){

            $.ajax({
                url: './ajax/email_exists.php',
                type: 'post',
                data: {email:email},
                success: function(response){
                    // Show response
                    $("#email_response").html(response);
                }
            });
        }
        else{
            $("#email_response").html("");
        }
    });
});