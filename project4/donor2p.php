<?php
session_start();
include "dbconnection.php";
if (isset($_POST["name"]) && isset($_POST["ddname"])
    && isset($_POST["pincode"]) && isset($_POST["street_name"])
    && isset($_POST["city"]) && isset($_POST["dob"])
    && isset($_POST["weight"]) && isset($_POST["phone_number"])
    && isset($_POST["gender"]) && isset($_POST["blood_bank"])
    && isset($_POST["blood_type"]));
function validate($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;


    }

$name = validate($_POST["name"]);
$ddname = validate($_POST["doct"]);
$pin = validate($_POST["pincode"]);
$street = validate($_POST["street_name"]);
$city = validate($_POST["city"]);
$dob = validate($_POST["dob"]);
$weight = validate($_POST["weight"]);
$phone = validate($_POST["phone_number"]);
$gen = validate($_POST["Gender"]);
$bank =validate($_POST["blood_bank"]);
$type =validate($_POST["blood_type"]);

if(empty($name)) 
    {
        header("Location: donor2.php?error=name is required");
        exit();
    }
    else if(empty($weight)) {
        header("Location: donor2.php?error=weight is required");
        exit();
    }
    else if(empty($phone)) {
        header("Location: donor2.php?error=phone number is required");
        exit();
    }

    
    else
    {
        echo " ";
    }
    


try
{
$sql = "insert into doctor(doctor_name) values ('$ddname')";
$query1= mysqli_query($conn,$sql);
/*if(mysqli_num_rows($result) > 0) 
{
    
    header("Location: signup2.php?error=the email is taken try another");
     exit();
}


$sql1 = "insert into donor(donor_name ,phone_no ,dob ,gender ,weight,pincode,street,city) values ('$name','$phone','$dob','$gen','$weight','$pin','$street','$city')";

$sql2 ="insert into blood_bank(blood_bank_name) values ('$bank')";

$sql3 ="insert into blood(blood_type) values ('$type')";*/

/*$query1= mysqli_query($conn,$sql);
$query2= mysqli_query($conn,$sql1);
$query3= mysqli_query($conn,$sql2);
$query4= mysqli_query($conn,$sql3);


$sql ="select * from signup where email='$name' ";
$result = mysqli_query($conn,$sql);*/
if($query1) 
{
    //echo "1";
    
    $sql1 = "insert into donor(donor_name ,phone_no ,dob ,gender ,weight,pincode,street,city,doctor_id) values ('$name','$phone','$dob','$gen','$weight','$pin','$street','$city','$last_id')";
    $query2= mysqli_query($conn,$sql1);
    //echo "2";
    $sql2 ="insert into blood_bank(blood_bank_name) values ('$bank')";
    $query3= mysqli_query($conn,$sql2);
    //echo "3";
    if($query3)
    {
        //echo "3.1";
        $last_id1 =$conn ->insert_id;
        //echo "3.2";
          //$GLOBALS['z']==$last_id1;
        
    
    $sql3 ="insert into blood(blood_type,blood_bank_id,donor_id) values ('$type','$last_id1','$last_id')";
    //$sql4 = "insert into blood_delivery(blood_bank_id) values('$last_id1')";
    }
    $query4= mysqli_query($conn,$sql3);
    //$query5= mysqli_query($conn,$sql4);
    //echo "4";
    //header("location:index2.php");
    if($query4)
    {
        echo '<script type="text/javascript"> alert("data saved") </script>';
        include "login page2.php";
        
        
    }
    else
    {
        echo '<script type="text/javascript"> alert("data  not saved") </script>';
        include "location:donor2.php";
        
    }

   

}

}

catch(mysqli_sql_exception $exception)
{
    mysqli_rollback($conn);
    throw $exception;
    echo "error";

}


?>