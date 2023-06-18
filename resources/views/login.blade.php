@include('header')
<h1>Login</h1>
<form id="login_form">
    <input type="email" name="email" placeholder="Enter Email">
    <br>
    <span class="error email_err"></span>
    <br>
    <input type="password" name="password" placeholder="Enter Password">
    <br>
    <span class="error password_err"></span>
    <br>
    <input type="submit" value="login">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#register_form").submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: "http://127.0.0.1:8000/api/login",
                type: "POST",
                data: formData,
                success: function(data) {
                    if (data.success==false) {
                        $(".result").text(data.msg);
                    }
                    else{
                        printErrorMsg(data)
                    }
                }
                    }); 
        });
        function printErrorMsg(msg) {
            $(".error").text("");
            $.each(msg, function(key, value) {
                $("." + key + "_err").text(value);
            });
        }
    });
</script>
