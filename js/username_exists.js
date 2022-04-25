$(document).ready(function() {

    $("#username").keyup(function() {

        var username = $(this).val().trim();

        if(username != '') {

            $.ajax({
                url: './ajax/username_exists.php',
                type: 'post',
                data: {username:username},
                success: function(response){
                    // Show response
                    $("#username_response").html(response);
                }
            });
        }
        else {
            $("#username_response").html("");
        }
    });
});