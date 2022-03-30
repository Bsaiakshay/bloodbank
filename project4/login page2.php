<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="stylelogin.css">
<body>
<div class="loginpage">
    <h1> Login Page </h1>
    <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    
        <form action="loginpage2p.php" method="post">
        <label for="mail">Email</label>
        <input type="email" id="name" name="name" placeholder="your email">
        <small class="error"></small>

        <label for="pass">password</label>
        <input type="password" id="password" name="password" placeholder="your password">
        <small class="error"></small>
        <button class="button button1">Login</button>
    </form>
</div>

<p>Not have an account?</p>
<a href="signup2.php">Sign up Here</a>

</body>
</head>
</html>


        

