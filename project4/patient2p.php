<?php
session_start();
include "dbconnection.php";
echo "!";
if (isset($_POST["blood_bank"]) && isset($_POST["patient"])
    && isset($_POST["mobile"]) && isset($_POST["blood_type"])
    && isset($_POST["hospital"]) && isset($_POST["patient_addr"]));

    
    function validate($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
    $bank =validate( $_POST["blood_bank"]);
    $pat = validate($_POST["patient"]);
    $mob = validate($_POST["mobile"]);
    $type = validate($_POST["blood_type"]);
    $haddr= validate($_POST["hospital"]);
    $paddr = validate($_POST["patient_addr"]);

    if(empty($pat)) 
    {
        header("location: patient2.php?error=name is required");
        exit();
    }
    else if(empty($mob)) 
    {
        header("location: patient2.php?error=mobile number is required");
        exit();
    }
    else 
    {
        echo "1";
        $sql ="select b.blood_bank_name, c.blood_type from blood_bank b,blood c
               where blood_bank_name='$bank' and blood_type='$type'and b.blood_bank_id = c.blood_bank_id ";
               $result =mysqli_query($conn,$sql);
        echo "2";
        if ($result -> num_rows) 
        {   echo "2.1";
            $row =mysqli_fetch_assoc($result);
                if ($row['blood_bank_name'] === $bank && $row['blood_type'] === $type) 
                {
                    echo "3";
                    $sq2 = "insert into patient(patient_name,p_phno,h_add,p_add) values ('$pat','$mob','$haddr','$paddr')";
                    $query1= mysqli_query($conn,$sq2);
                    if($query1)
                    {
                    echo "3.1";
                    $last_id2 =$conn ->insert_id;
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("no blood avaliable") </script>';
                        incude "login page2.php";
                        exit();
                    }
                    
                    
                    $last_id3 =29;
                    echo "3.2";
                    $id =++$last_id3;
                    $sql3 = "insert into blood_delivery(patient_id,blood_bank_id,type) values('$last_id2','$id','$row[blood_type]')";
                    echo "3.3";
                    
                    $query2 = mysqli_query($conn,$sql3);
                   // mysqli_fetch_assoc($query2);
                    echo "4";
                    if($query2)
                    {
                        echo '<script type="text/javascript"> alert("data saved") </script>';
                        include "login page2.php" ;
                        exit();
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("data  not saved") </script>';
                        include "location:patient2.php" ;
                        exit();
                    }

                }
        }
        else
        {
            echo '<script type="text/javascript"> alert("no blood avaliable") </script>';
            include "login page2.php";
        }
    }


 
?>
