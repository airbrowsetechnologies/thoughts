window.onload = mainLoad;

function mainLoad() {
    //add submit handler
    $("#addform").submit(function(event) {
        // Stop the browser from submitting the form.
        event.preventDefault();

        $("status").html("Uploading your comment...");
        var formData = $("#addform").serialize();
        $.ajax({
            type: 'POST',
            url: $("#addform").attr('action'),
            data: formData

        }).done(function(response) {
            console.log(response);
            $("#status").html("Your comment has been successfully posted!");
            setTimeout(refreshCommentFrame, 500);
            $('#comment').val('');
            $('#name').val('');
            $('#email').val('');
            $("#status").removeClass("error noshow");
            $("#status").addClass("success");
        }).fail(function(data) {
            if (data.responseText !== '') {
                $("#status").html(data.responseText);
                console.log(data.responseText);
            } else {
                $(formMessages).html('Oops! An error occured and your comment could not be posted!');
            }

            $("#status").removeClass("success noshow");
            $("#status").addClass("error");

        })
    });

    //add load handler
    $("#comframe").load(function() {
        var iframe = document.getElementById("comframe");
        var frameDoc = iframe.contentDocument || iframe.contentWindow.document;
        var el = frameDoc.getElementById("main-comments");
      
        $("#refresh").removeClass("spinny");
    });


    //get usernames for autocomplete 
    $.ajax({
        type: 'POST',
        url: "getusers.php",
    }).done(function(response) {
        var users = response.split("\r\n");
        for (i = 0; i < users.length; i++) {
            document.getElementById("users").innerHTML += "<option value=\"@" + users[i] + "\">";
        }
    }).fail(function(data) {
        if (data.responseText !== '') {

            console.log(data.responseText);
        } else {
        }
    });

document.getElementById("comframe").src = "index.php";
}