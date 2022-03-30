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
//echo "1";
$name = validate($_POST["name"]);
$ddname = validate($_POST["doct"]);
$pin = validate($_POST["pincode"]);
$street = validate($_POST["street_name"]);
$city = validate($_POST["city"]);
$dob = validate($_POST["dob"]);
$weight = validate($_POST["weight"]);
$phone = validate($_POST["phone_number"]);
$gen = validate($_POST["Gender"]);
$bank = validate($_POST["blood_bank"]);
$type = validate($_POST["blood_type"]);
//echo "2";
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
        //echo "";
    }
    

echo "3";
try
{
echo "4";
$sql = "select doctor_id,doctor_name from doctor where doctor_name ='$ddname'";
$result =mysqli_query($conn,$sql);
echo "5";
if ($result -> num_rows) 
        {
            echo "5";
            $row =mysqli_fetch_assoc($result);
            if ($row['doctor_name'] === $ddname ) 
                {
                    echo "0";

                    echo "1";
    
                    $sql1 = "insert into donor(donor_name ,phone_no ,dob ,gender ,weight,pincode,street,city,doctor_id) values ('$name','$phone','$dob','$gen','$weight','$pin','$street','$city','$row[doctor_id]')";
                    $query2= mysqli_query($conn,$sql1);
                    $last_id1 =$conn ->insert_id;
                     echo "2";
                    $sql2="select blood_bank_id,blood_bank_name from blood_bank where blood_bank_name='$bank'";
                    $result1 =mysqli_query($conn,$sql2);
                    echo "22";
                    if ($result1 -> num_rows)  
                    
                    {
                        echo "3";
                    $row1 =mysqli_fetch_assoc($result1);

                    
                    //echo $result1;
                        echo "33";
                        echo "id: " . $row1["blood_bank_name"]. "<br>";
                        echo "name: ". $bank. "<br>";
                    if ($row1['blood_bank_name'] == $bank) 
                     {
                        echo "1";
                        
                        $sql3 ="insert into blood(blood_type,donor_id,blood_bank_id) values ('$type','$last_id1','$row1[blood_bank_id]')";
                        $query4= mysqli_query($conn,$sql3);
                        
                        if($query4)
                        {
                            echo '<script type="text/javascript"> alert("data saved") </script>';
                            //exit();
                            include "login page2.php";
                            
        
        
                        }
                        else
                        {
                            echo '<script type="text/javascript"> alert("data  not saved") </script>';
                            include "location:donor2.php";
        
                        } 
                     }
   
                    }

                }

            }
}       
    //echo "3";
    
        
    
    //$sql3 ="insert into blood(blood_type,donor_id) values ('$type','$last_id') where blood_bank_id=";
    //$sql4 = "insert into blood_delivery(blood_bank_id) values('$last_id1')";
    
    
    //$query5= mysqli_query($conn,$sql4);
    //echo "4";
    //header("location:index2.php");
   /* if($query4)
    {
        echo '<script type="text/javascript"> alert("data saved") </script>';
        include "login page2.php";
        
        
    }
    else
    {
        echo '<script type="text/javascript"> alert("data  not saved") </script>';
        include "location:donor2.php";
        
    }*/

catch(mysqli_sql_exception $exception)
{
    mysqli_rollback($conn);
    throw $exception;
    echo "error";

}


?>