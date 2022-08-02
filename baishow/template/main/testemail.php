<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4 class="sent-notification"></h4>
    <form action="" id="myForm">
    <input type="text" id="name"></br>
    <input type="text" id="email"></br>
    <input type="text" id="subject"></br>
    <textarea name="" id="body" cols="30" rows="10"></textarea>
    </br>
    <button type="button" onclick="sendEmail()" value="send an email">Submit</button>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    function sendEmail(){
        var name = $("#name");
        var email = $("#email");
        var subject = $("#subject");
        var body = $("#body");

        if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
            $.ajax({
                url: 'sendEmail.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val()
                }, success: function(response){
                    $('#myForm')[0].reset();
                    $('.sent-notification').text("MESSAGE SENT SUCCESSFULLY");
                }
            })
        }
    }
    function isNotEmpty(caller){
        if(caller.val() == ""){
            caller.css('border','1px solid red');
            return false;
        }
        else{
            caller.css('border','');
            return true;
        }
    }
</script>
</html>