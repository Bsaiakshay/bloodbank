<?php
session_start();
include "dbconnection.php";
if (isset($_POST["name"]) && isset($_POST["password"])) 
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

    if(empty($uname)) 
    {
        header("location: login page2.php?error=user name is required");
        exit();
    }
    else if(empty($pass)) {
        header("location: login page2.php?error=password is required");
        exit();
    }
    else 
    {
        echo "valid";
        $sql ="select * from loginpage where name='$uname' and password='$pass'";
        $result =mysqli_query($conn,$sql);
        if ($result -> num_rows) 
        {
            $row =mysqli_fetch_assoc($result);
                if ($row['name'] === $uname && $row['password'] === $pass) 
                {
                    echo 'logged in';
                    $_SESSION['name'] =$row['name'];
                    $_SESSION['password']=$row['password'];
                    header("location:index2.php");

                }
                else 
                {
                    header("Location: login page2.php?error=incorrect user name or password");
                    exit();
                } 
        }
        else 
        {
                    header("Location: login page2.php?error=incorrect user name or password");
                    exit();
        } 
        
    }

}
   
else 
{
    header("Location: index2.php");
}
/*echo "valid";
         $sql ="select * from loginpage where name ='$uname' and password ='$pass'"; 
        $result = mysqli_query($conn,$sql);
        if ($result -> num_rows)
        {
            $row =mysqli_fetch_assoc($result);

            print_r($row);
        }
    }
}
*/


?>

