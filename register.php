<?php	
	session_start();
	$conn = mysqli_connect('localhost','redcrkfh_root','#Arra1997_','redcrkfh_Cart');
		
	if(!$conn)
	{
		echo 'NOT CONNECTED TO DATABASE';
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>RedCross Registration</title>
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
                    <a class="navbar-brand" href="Register.html"><span>Red</span>+</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="background-of-page" id="img">
        <img src="images/A1.jpg" height="700" width="1350" style="opacity: 0.3 ">

        <div class="login-form-container" id="login-form">
            <div class="register-form-content">
                <div class="register-form-header">
                    <div class="fh5co-home">
                        <img src="images/LoginHeader.png" height="180" width="400" allign="top" />
                    </div>
                    <h3>Create Your RedCross Account</h3>
                    <form action="register.php" method="post" class="login-form">

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="text" id="register-name" class="input" name="name" placeholder="Name" required />
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="text" id="register-Lname" class="input" name="lname" placeholder="Last Name" required />
                        </div>

                        <div class="input-container">
                            <i class="fa fa-envelope"></i>
                            <input type="email" class="input" name="email" placeholder="Email" required/>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="register-passwordA" class="input" name="passwordA" placeholder="Enter Password" required />
                            <i id="show-password" class="fa fa-eye"></i>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="register-passwordB" class="input" name="passwordB" placeholder="Confirm Password" required />
                            <i id="show-password" class="fa fa-eye"></i>
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="text" id="phone" class="input" name="phone" placeholder="Enter Phone Number" required />
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="text" id="allergies" class="input" name="allergies" placeholder="Enter Allergies (optional)" />
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="text" id="history" class="input" name="history" placeholder="Enter chronological history (optional)" />
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <input type="text" id="address" class="input" name="address" placeholder="Enter your address" required />
                        </div>

                        <div class="input-container">
                            <i class="fa fa-lock"></i>
                            <p>Enter your date of birth</p>
                            <input type="date" id="register-dob" class="input" name="dob" placeholder="Date of Birth" required />
                        </div>

                        <div action="">
                            <br>
                            <p>Please select your gender</p>
                            <input type="radio" name="gender" value="male" > Male<br>
                            <input type="radio" name="gender" value="female" > Female<br>
                            <br>
                        </div>

                        <input type="submit" id = "register" name="register" value="Register" class="button" href="login.html" /><br>
						<a href="login.php" class="login">Back to Login</a><br>
                    </form>
					
					<?php
					
					if(isset($_POST['register']))
					{
						$name = ($_POST['name']);
						$lname = ($_POST['lname']);
						$email = mysqli_real_escape_string($conn, $_POST['email']);
						$passwordA = mysqli_real_escape_string($conn, $_POST['passwordA']);
						$passwordB = mysqli_real_escape_string($conn, $_POST['passwordB']);
						$phone = ($_POST['phone']);
						$allergies = ($_POST['allergies']);
						$history = ($_POST['history']);
						$address = ($_POST['address']);
						$dob = ($_POST['dob']);
						$gender = ($_POST['gender']);
						
						$query = "SELECT * FROM register WHERE email = '$email'";
						$result = mysqli_query($conn, $query);
						
						if(mysqli_num_rows($result) == 0)
						{
							if($passwordA == $passwordB)
							{	
								if (preg_match("/^[0][0-9]{9}$/", $phone)) 
								{
									$password = md5($passwordA);
									$sqla = "INSERT INTO login (username, password, name)
									VALUES ('$_POST[email]', '$_POST[passwordA]', '$_POST[name]')";
									
									$sql = "INSERT INTO register (name, lname, email, password, phone, allergies, history, address, dob, gender)
									VALUES ('$_POST[name]', '$_POST[lname]', '$_POST[email]', '$_POST[passwordA]', '$_POST[phone]', '$_POST[allergies]', '$_POST[history]', '$_POST[address]', '$_POST[dob]', '$_POST[gender]')";
								
									if(mysqli_query($conn, $sql) && mysqli_query($conn, $sqla))
									{
										echo '<script type = "text/javascript"> swal("USER CREATED", "Please LOGIN", "Success") </script>';
										echo '<meta http-equiv="refresh" content="3; URL=login.php" />';
									} 
									else
									{
										echo '<script type = "text/javascript"> swal("GROOT FOUT", "GROOT GROOT MOEILIKHEID", "AII") </script>';
										die();
									}
								}
								else
								{
									echo '<script type = "text/javascript"> swal("INCORRECT PHONE NUMBER", "Please Try Again", "Error") </script>';
									die();
								}
					
							}
								
							else
							{
								echo '<script type = "text/javascript"> swal("PASSWORDS DO NOT MATCH", "Please Try Again", "Error") </script>';
								die();
							}

						}
						else
						{	
							echo '<script type = "text/javascript"> swal("EMAIL ALREADY EXISTS", "Please Try Again", "Error") </script>';	
							die();
			
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