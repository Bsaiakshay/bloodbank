<?php 
session_start();

if (isset($_SESSION['name']) && isset($_SESSION['password'])) 
{
?>
<!DOCTYPE HTML>
<html>
<head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="styledonor.css">
<style>
body
{
background-image: url("ackground1.jpg"); 
background-repeat:no-repeat;
background-size:cover;
      
}
</style>
</head>
<body>
    <div style="float:right">
        <a href="logout.php" class="button">Logout</a>
    </div>
    <div class = "form1">
        <form action="donor2pp.php" method="POST">
            <h1>donor details</h1>
            <br>
            <?php if (isset($_GET['error'])) { ?>
           <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <table>
                <tr>
                    <td>
                        Name:
                    </td>
                    <td>
                        <input type="text" placeholder="name" name="name"> *
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender:
                    </td>
                    <td>
                        <input type="radio"  name="Gender" value="MALE">Male
                        <input type="radio"  name="Gender" value="FEMALE">Female
                        <input type="radio"  name="Gender" value="OTHERS">Others 
                    </td>
                </tr>
                <tr>
                    <td>
                        pincode:
                    </td>
                    <td>
                        <input type="text" placeholder="pincode" name="pincode">
                    </td>
                </tr>
            </tr>
            <tr>
                <td>
                    street name:
                </td>
                <td>
                    <input type="text" placeholder="street name" name="street_name">
                </td>
            </tr>
        </tr>
        <tr>
            <td>
                city:
            </td>
            <td>
                <input type="text" placeholder="city" name="city">
            </td>
        </tr>
    </tr>
    <tr>
        <td>
            weight:
        </td>
        <td>
            <input type="text" placeholder="weight" name="weight"> *
        </td>
    </tr>

    <tr>
        <td>
        phone number
        </td>
        <td>
        <input type="text" placeholder="phone number" name="phone_number"> *
        </td>
    </tr>
    <tr>
        <td>
        date_of_birth
        </td>
        <td>
            <input type="date" name="dob"> 
        </td>
    </tr>
    
<tr>
        <td>
        doctor name
        </td>
        <td>
            <select id="doct" name="doct">
                <option value="Dr.Akshay">Akshay</option>
                <option value="Dr.chandan">chandan</option>
                <option value="Dr.Latha">Latha</option>
                <option value="Dr.preetham">preetham</option>
                <option value="Dr.Madhu">Madhu</option>
              </select>
        </td>
    </tr>
    <tr>
        <td>
        blood bank
        </td>
        <td>
            <select id="blood_bank" name="blood_bank">
                <option value="Apollo_hospital">Apollo_hospial</option>
                <option value="kims_hospital">kims_hospial</option>
                <option value="shreyas_hospital">shreyas_hospital</option>
                <option value="Victoria_hospital">Victoria_hospital</option>
                <option value="Manipal_hospital">Manipal_hospital</option>
              </select>
        </td>
    </tr>
    <tr>
        <td>
        blood type
        </td>
        <td>
            <select id="cars" name="blood_type">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
        </td>
    </tr>
     <tr>
            <td>
                <button class="button button1">submit</button>
            </td>
    </tr>
    
</form>
        


    </div>  
</body>
</html>

<?php 
}else{
     header("Location: login page2.php");
     exit();
}
 ?>