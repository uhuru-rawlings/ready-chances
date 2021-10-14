<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>joblister || login system</title>
</head>
<body>
    <div class="signup" id="login">
        <?php
          if(isset($_POST['login'])){
            $connect = mysqli_connect("127.0.0.1","root","","joblister");
            if($connect){
                $uemails = mysqli_real_escape_string($connect, $_POST['uemails']);
                $passw = trim($_POST['passwords']);

                // check if the username exist
                $sql  = "SELECT * FROM userreg WHERE uemails = '".$uemails."' LIMIT 1";
                $query = mysqli_query($connect, $sql);
                $rows = mysqli_num_rows($query);
                if($rows < 1){
                    echo("<script>alert('No user with the same useremail')</script>");
                }else{
                  while($results = mysqli_fetch_assoc($query)){
                     $pass = $results["passwords"];
                     $passwordveryfy = password_verify($passw, $pass);
                     if($passwordveryfy){
                        setcookie("useremail",$_POST['uemails'], time()+3600);
                         header("location: default.php");
                     }else{
                         echo("<script>alert('Wrong password, reload and try again')</script>");
                     }
                  }
                } 
            }else{
                echo("<script>alert('Cannot connect to the database, please contact system admin')</script>");
            }
          }
        ?>
        <form action="#" method="post">
           
                <label for="">userEmail
                <br>
                <img src="images/gmail.png" class="left" width="30px" height="20px" alt=""><input type="email" name="uemails" id="uemails" placeholder="Enter userEmail">
            </label>
            <br>
            <br>
            <label for="">Password
                <br>
               <img src="images/lock.png" id="left" class="left" width="30px" height="20px" alt=""> <input type="password" name="passwords" id="passwords" placeholder="Enter password"><img src="images/eye.png" onclick="show()" class="right" width="30px" height="20px" alt=""> 
            </label>
            <script>
                function show(){
                    let inputs = document.getElementById("passwords");
                    if(inputs.type === "password"){
                        inputs.type="text";
                    }else{
                        inputs.type="password";
                    }
                }
            </script>
            <br>
            <br>
            <input type="submit" value="Login" name="login" onclick="return validate()">
            </fieldset>
            <script>
                function validate(){
                   let data = {
                       email: document.getElementById("uemails").value,
                       passwords: document.getElementById("passwords").value  
                   }
                   if(data.email === ""){
                      alert("Email input field is blank");
                      document.getElementById("uemails").style.border = "2px solid red";
                      return false;
                   }else if(data.passwords=== ""){
                      alert("please input password, password empty");
                      document.getElementById("passwords").style.border = "2px solid red";
                      return false;
                   }else{
                       return true;
                   }
                }
            </script>
        </form> 
    </div>
</body>
</html>