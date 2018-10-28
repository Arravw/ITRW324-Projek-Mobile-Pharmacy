<?php	
	session_start();
	$conn = mysqli_connect('localhost','root','#Arra1997_','Cart');
		
	if(!$conn)
	{
		echo 'NOT CONNECTED TO DATABASE';
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>RedCross Login</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Prata" rel="stylesheet">
    <link rel="stylesheet" href="css/Login.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/sweetalert.min.js"></script>

</head>
<body>
    <header role="banner" id="fh5co-header">

        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                    <a class="navbar-brand" href="index.html"><span>Red</span>+</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="background-of-page" id="img">
    <div class="container">
        <img src="images/A1.jpg" height="700" width="1350" style="opacity: 0.3;">
        <div class="login-form-container" id="login-form">
            <div class="login-form-content">
                <div class="login-form-header">
                    <div class="fh5co-home">
                        <img src="images/LoginHeader.png" height="180" width="400" />
                    </div>
                    <h3>Login Into Your Account</h3>

                </div>
                <form method="post" action="" class="login-form">
                    <div class="input-container">
                        <i class="fa fa-envelope"></i>
                        <input type="email" class="input" name="email" placeholder="Email" />
                    </div>
                    <div class="input-container">
                        <i class="fa fa-lock"></i>
                        <input type="password" id="login-password" class="input" name="password" placeholder="Password" />
                        <i id="show-password" class="fa fa-eye"></i>
                    </div>
                    
                    <input type="submit" name="login" value="Login" class="button" href="eCommerce.php" />
                    <a href="register.php" class="register">Register</a>
                </form>
				
				<?php
                if(isset($_POST['login']))
				{
					$name = ($_POST['email']);
                    $password = ($_POST['password']);
                    
                    $userName = "SELECT * FROM login";
                    $res = mysqli_query($conn, $userName);
                    $row = mysqli_fetch_assoc($res);
                    $query = "SELECT * FROM login WHERE username = '$name' AND password = '$password'";
                    $result = mysqli_query($conn, $query);
                    $_SESSION['uname'] = $name;
		
					if(mysqli_num_rows($result) == 1)
					{

                        $_SESSION['uname'] = $name;
						echo '<script type = "text/javascript"> swal("LOGIN SUCCESS", " ", "Success") </script>';
                        echo '<meta http-equiv="refresh" content="1.5; URL=eCommerce.php" />';
					}
					else
					{
						echo '<script type = "text/javascript"> swal("ERROR", "Username Or Password is Incorrect", "Error") </script>';
					}
				}
				?>
            </div>
        </div>
    </div>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
