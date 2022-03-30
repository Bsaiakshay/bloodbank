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

<link rel="stylesheet" href="stylepatient.css">
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
        <form action="patient2pp.php" method="POST">
            <h1> patient details</h1>
            <br>
        <?php if (isset($_GET['error'])) { ?>
         <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
            <table>
                <tr>
                    <td>
                    blood bank name
                    </td>
                    <td>
                    <select id="cars" name="blood_bank">
                <option value="Apollo_hospital">Apollo_hospial</option>
                <option value="kims_hospital">Kims_hospial</option>
                <option value="shreyas_hospital">shreyas_hospital</option>
                <option value="Victoria_hospital">Victoria_hospital</option>
                <option value="Manipal_hospital">Manipal_hospital</option>
                     </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        patient name:
                    </td>
                    <td>
                        <input type="text" placeholder="name" name="patient"> *
                    </td>
                </tr>
            
            <tr>
                <td>
                    Mobile number:
                </td>
                <td>
                    <input type="text" placeholder="phone number" name="mobile"> *
                </td>
            </tr>
            <tr>
                <td>
                blood type:
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
                    Hospital address
                </td>
                <td>
                <textarea id="w3review" name="hospital" placeholder="hi" rows="3" cols="40">
                </textarea>
                </td>
            </tr>
           
             <tr>
                <td>
                    patient_address
                </td>
                <td>
                <textarea id="text" name="patient_addr" placeholder="blood bank address" rows="3" cols="40" >
                </textarea>
                </td>
            </tr>
            <br>
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
   