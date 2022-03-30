<?php
session_start();
include "dbconnection.php";
if (isset($_POST["name"]) && isset($_POST["password"])
    && isset($_POST["email"]) && isset($_POST["re_password"])) 
{
    
    function validate($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }

    $uname = validate($_POST["name"]);
    $pass = validate($_POST["password"]);

    $re_pass = validate($_POST["re_password"]);
    $name = validate($_POST["email"]);

    $user_data = "&uname=". $uname. "&name=". $name; 

    echo $user_data;

    if(empty($uname)) 
    {
        header("Location: signup2.php?error=name is required");
        exit();
    }
    else if(empty($name)) {
        header("Location: signup2.php?error=email is required");
        exit();
    }
    else if(empty($pass)) {
        header("Location: signup2.php?error=password is required");
        exit();
    }
    else if(empty($re_pass)) {
        header("Location: signup2.php?error=re password is required");
        exit();
    }
    else if($pass != $re_pass) {
        header("Location: signup2.php?error=comfirmation password does not match");
        exit();
    }
    

    else 
    {

       // $pass = md5($pass);

        $sql ="select * from signup where email='$name' ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0) 
        {
            
            header("Location: signup2.php?error=the email is taken try another");
             exit();
        }
        else
        {
            $sql2 = "insert into signup(name,email,password,re_password) values ('$uname','$name','$pass','$re_pass')";
            $result2 = mysqli_query($conn,$sql2);
            if($result2) {
                $sql3 = "insert into loginpage(name,password) values ('$name','$pass')";
                $result3= mysqli_query($conn,$sql3);
                header("Location: login page2.php?success=your account has been created");
                 

             exit();
            }
            else
            {
                 header("Location: signup2.php?error=unknown error occured");
             exit();
            }
        }
    
    }

}
 
else 
{
    header("Location: login page2.php");
    exit();
}



?>
