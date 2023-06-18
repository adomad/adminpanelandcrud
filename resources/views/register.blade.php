@include('header')
<h1>User Registration</h1>

<form id="register_form">
    <input type="text" name="name" placeholder="Enter Name">
    <br>
    <span class="error name_err"></span>
</br>
<input type="email" name="email" placeholder="Enter Email">
    <br>
    <span class="error email_err"></span>

</br>
    <input type="password" name="password" placeholder="Enter password">
    <br>
    <span class="error password_err"></span></br>
    <input type="password" name="password_confirmation" placeholder="Enter Confirm password">
    <br>
    <span class="error password_confirmation_err"></span></br>
    <input type="submit" value="Register">
</form>

<script>


    $(document).ready(function(){
        $("#register_form").submit(function(event){
            event.preventDefault();
            var formData= $(this).serialize();
            $.ajax({
                url:"http://127.0.0.1:8000/api/register",
              type:"POST",
              data:formData,
              success:function(data){
                if(data.msg){
              }
              else{
                printErrorMsg(data);
              }
              }
        });
    });
        function printtErrorMsg(msg){
            $(".error").text("");
            $.each(msg,function(key,value){ 
                if(key=='password'){
                    if(value.length>1){
                        $(".password__err").text(value[0]); $(".password__err").text(value[0]);
                        $(".password_confirmation_err").text(value[1]);
                    }
                    else{

                    }
                }
                $("."+key+ "_err").text(value);
            });
}
});
</script>