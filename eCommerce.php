<?php
session_start();
$product_ids = array();
$total = 0;
$GLOBALS[items];
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Legal &mdash; Red Cross Pharmacy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="html5, template, bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="Armando van Wyk" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Prata" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Simple Line Icons -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header role="banner" id="fh5co-header">

        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <!-- Mobile Toggle Menu Button -->
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                    <a class="navbar-brand"><span>Red</span><span>+</span>🚪<span><a href="#" class="btn navbar-brand" role="button" data-toggle="modal"data-target="#myModal">Logout</a></span></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#" data-nav-section="home"><span>Home</span></a></li>
                        <li><a href="#" data-nav-section="about"><span></span></a></li>
                        <li><a href="#" data-nav-section="Cart"><span>Cart 🛒:<?php
                        echo (count($_SESSION['Shopping_Cart']));
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div id="myModal" class="modal fade modal-sm" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h2 style="color:Tomato" class="modal-title">Logout?</h2>
                            </div>
                            <div class="modal-body">
                            <p>Click one of buttons below to confirm your logout.</p>
    
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-default"><a href="index.html">Yes Logout</a></button>
                            <?php session_cache_expire($_SESSION['uname']); ?>
                            
            </div>
        </div>
    </div>
    <section id="fh5co-home" data-section="home" style="background-image: url(images/Pills.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="text-wrap">
                <div class="text-inner">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 to-animate">
                            <h1 font="red">Welcome:<br/> <?php echo $_SESSION['uname'] ?></h1>
                            <h2>Our products make a real difference...</h2>
                            <div class="call-to-action">
                                <div class="row SLIDE">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-9 help">
                                                <div class="item active">
                                                    <img src="images/pharmacy.jpg" width="800" height="600" class="img-shadow img-responsive col-md-10 col-md-offset-1 to-animate" alt="About image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </section>
    <section id="fh5co-about" data-section="about" method="post">
        <div class="container">
                <div class="col-xs-5 col-sm-4">
                <?php
                $connect = mysqli_connect('localhost','root','#Arra1997_','Cart');
                $query = 'SELECT ProductCode, LatestUnitPrice,StockDescription, ProductImage FROM Products ORDER BY ProductCode ASC';
                $result = mysqli_query($connect,$query);
                if ($result)
                {
                    if(mysqli_num_rows($result)>0)
                       {
                           while($Products = mysqli_fetch_assoc($result))
                            { 
                                echo "<div class='container'>";
                                echo "<form method='post' action='eCommerce.php?action=add&ProductCode={$Products['ProductCode']}'>";
                                echo "<h2 style='font-size:3vw;'>{$Products['StockDescription']}</h2>";
                                echo "<h2></h2>";
                                echo "<img src={$Products['ProductImage']} class='img-responsive' alt='Load Error' width='auto' height='auto'>";
                                echo "<h3 style='font-size:2vw;'>R{$Products['LatestUnitPrice']}</h3>";
                                echo "<input padding='18p 32px' type='text' name='quantity' class='form-control' value='1'/>";
                                echo "<input type='hidden' name='StockDescription' value='{$Products['StockDescription']}'/>";
                                echo "<input type='hidden' name='LatestUnitPrice' value='{$Products['LatestUnitPrice']}'/>";
                                echo "<input type='submit' name='Add_to_Cart' style='margin-top:10px' class='btn btn-danger' value='Add to Cart'/>";
                                echo "<h4></h4>";
                                echo "</form>";
                                echo "</div>";
                            }               
                        }
                }
                ?>
                    
                </div>
            <!--new pill-->
    </section>
    <section data-section="Cart">
        <div class="getting-started">
            <div class="container">
                <table class="table">
                        <div class="table-responsive">
                                <tr><th colespan="5"><h3>Order Details</h3></th></tr>
                                <tr>
                                    <th width="40%">Product Name</th>
                                    <th width="20%">Price</th>
                                    <th width="10%">Quantity</th>
                                    <th width="15%">Total</th>
                                    <th width="5%">Action</th>
                                </tr>

    <?php
     global $total;
    //Check if Add to cart is clicked
    if(filter_input(INPUT_POST, 'Add_to_Cart'))
    {
        if(isset($_SESSION['Shopping_Cart']))
        {
            //keep Track of items in shopping cart
            $GLOBALS[count] = count($_SESSION['Shopping_Cart']);
            //Create sequential array
            $product_ids = array_column($_SESSION['Shopping_Cart'],'ProductCode');

            if(!in_array(filter_input(INPUT_GET,'ProductCode'),$product_ids))
            {
                $_SESSION['Shopping_Cart'][$count]= array
                (
                    'ProductCode' => filter_input(INPUT_GET, 'ProductCode'),
                    'StockDescription' => filter_input(INPUT_POST, 'StockDescription'),
                    'LatestUnitPrice' => filter_input(INPUT_POST,'LatestUnitPrice'),
                    'quantity' => filter_input(INPUT_POST,'quantity')
                );
            }
            else
            {
                for ($i=0; $i < count($product_ids); $i++) { 
                    if ($product_ids[$i] == filter_input(INPUT_GET, 'ProductCode')) {
                        //Increase quantity when the same product is clicked more than once
                        $_SESSION['Shopping_Cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    }
                }
            }
        }
        else
            {
            //if shopping cart doesn't exist create first product with array key 0
            //Create array using submitted form data from key 0 and fill it with data
            $_SESSION['Shopping_Cart'][0]= array
            (
               'ProductCode' => filter_input(INPUT_GET, 'ProductCode'),
               'StockDescription' => filter_input(INPUT_POST, 'StockDescription'),
               'LatestUnitPrice' => filter_input(INPUT_POST,'LatestUnitPrice'),
               'quantity' => filter_input(INPUT_POST,'quantity')
            );
        
            }
    }
    if (filter_input(INPUT_GET, 'action')== 'delete') {
        //Loop through shopping cart until it matches the get id variable
        foreach ($_SESSION['Shopping_Cart'] as $key => $Product) {
            if ($Product['ProductCode'] == filter_input(INPUT_GET, ProductCode)) {
                unset($_SESSION['Shopping_Cart'][$key]);
            }
        }
        //reset session array keys
        $_SESSION['Shopping_Cart'] = array_values($_SESSION['Shopping_Cart']);
    }

    function pre_r($array)
    {
        if (!empty($_SESSION['Shopping_Cart'])) {
            $total == 0;
        }
        foreach ($_SESSION['Shopping_Cart'] as $key => $Product)
        {
            echo "<tr>";
            echo "<td>{$Product['StockDescription']}</td>";
            echo "<td>{$Product['LatestUnitPrice']}</td>";
            echo "<td>{$Product['quantity']}</td>";
            echo "<td>";
            echo "R";
            echo number_format($Product['LatestUnitPrice']*$Product['quantity'],2);
            echo "</td>";
            echo "<td>";
            echo "<a href='eCommerce.php?action=delete&ProductCode={$Product['ProductCode']}' class='button'>";
            echo "<div class='btn-danger'>Remove</div>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
            $GLOBALS[items] += number_format($Product['quantity']);
            $GLOBALS[total] += number_format($Product['LatestUnitPrice']*$Product['quantity'],2);

            
        }
        echo "<tr></tr>";
        echo "<tr>";
        echo "<td>Total: </td>";
        echo "<td><td><td>R$GLOBALS[total]</td></td></td>";
        echo "</tr>";
        echo "<div class='col-md-6 to-animate'>";
        echo "<tr>";
        echo "<td></td>";
        if (count($_SESSION['Shopping_Cart'])>0) {

            echo "<td colespan='10'>";
            echo "<div class='call-to-action text-right'>";
            echo "<a href='eCommerce.php?action=Order' name='Order' class='sign-up'>Buy products</a>";
            echo "</div>";
            echo "</td>";
        }
        echo "<td>";
        echo "</td>";
        echo "</tr>";
        echo "</div>";

    };
    pre_r($_SESSION);
    if (filter_input(INPUT_GET, 'action') == 'Order') {
        echo "<div class='alert alert-danger'>Thank You. Your order has been processed! Thanks for using Red Cross.</div>";
             if (isset($_POST['action'=='Order'])) {
                 
                
                for($i = '0'; $i<=count($_SESSION['Shopping_Cart']); $i++)
                {
                            
                   $var1 = $_POST[$_SESSION['Shopping_Cart'][$i]['StockDescription']];
                   $var2 = $_POST[$_SESSION['Shopping_Cart'][$i]['LatestUnitPrice']];
                   $var3 = $_POST[$_SESSION['Shopping_Cart'][$i]['quantity']];
                   $var4 = $_SESSION['uname'];
                                
                $query = "INSERT INTO Order(ProductOrderd, PricePerUnit, Quantity, Customer) 
                VALUES ('$var1', '$var2', '$var3', '$var4')";
                                
                if(mysqli_query($connect, $query))
                {
                echo "<div class='alert alert-danger'>'Order Placed', 'Confirmation Email Sent', 'Success')</div>";
                }
                Else
                {
                echo "<div class='alert alert-danger'> 'Order not in DB', 'SHIT', 'Error') </div>";
                }
            } 
                
                
            }
            require 'phpmailer/PHPMailerAutoload.php';

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;
                $mail->SMTPAuth = true;
                $mail->Username = 'redcrossmobile5443@gmail.com';
                $mail->Password = '%Test5443#';

                $mail->setFrom('redcrossmobile5443@gmail.com', 'RedCrossMobile Team');
                $mail->addAddress($_SESSION['uname']);
                $mail->Subject = 'SMTP email test';
                $mail->Body = "'Thanks for using RedCorssMobile pharmacy. Your Products will be Delivered shortley.";

                if ($mail->send()){
                    echo "<div class='alert alert-danger'>A Mail has been sent to confirm your order. Your total is: R$GLOBALS[total]</div>";
                    echo "<meta http_equiv='refresh' content='0'";
                        }
        }
    
    $GLOBALS[r]="W1";
    ?>
                </div>
            </table>
        </div>
    </div>
    </section>
    <section id="fh5co-team" data-section="team">
        <div class="fh5co-team">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 section-heading text-center">
                        <h2 class="to-animate">Meet The Pharmicists</h2>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 subtext">
                                <h3 class="to-animate">Info. </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="team-box text-center to-animate-2">
                            <div class="user"><img class="img-reponsive" src="images/Austin.jpg" alt="Austin Andreas"></div>
                            <h3>Austin Andreas</h3>
                            <span class="position">Pharmicist</span>
                            <p>Info.</p>
                            <ul class="social-media">
                                <li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
                                <li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
                                <li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>
                                <li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-box text-center to-animate-2">
                            <div class="user"><img class="img-reponsive" src="images/Gerbrand.jpg" alt="Gerbrand Le Grange"></div>
                            <h3>Gerbrand Le Grange</h3>
                            <span class="position">Pharmicist</span>
                            <p>Info.</p>
                            <ul class="social-media">
                                <li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
                                <li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
                                <li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>
                                <li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-box text-center to-animate-2">
                            <div class="user"><img class="img-reponsive" src="images/Charles.jpg" alt="Charles Boon"></div>
                            <h3>Charles Boon</h3>
                            <span class="position">Pharmicist</span>
                            <p>Info.</p>
                            <ul class="social-media">
                                <li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
                                <li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
                                <li><a href="#" class="codepen"><i class="icon-codepen"></i></a></li>
                                <li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="fh5co-footer" data-section="contact" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-4 to-animate">
                    <h3 class="section-title">About Us</h3>
                    <p>where we are located and how the business started...</p>
                    <p class="copy-right">
                        &copy; 2018 Legal Pharmacy. <br>All Rights Reserved. <br>
                        Designed by Armando van Wyk
                    </p>
                </div>
                <div class="col-md-4 to-animate">
                    <h3 class="section-title">Our Address</h3>
                    <ul class="contact-info">
                        <li><i class="icon-map-marker"></i>Gerrit dekker Potchefstroom</li>
                        <li><i class="icon-phone"></i>+ 27625981740</li>
                        <li><i class="icon-envelope"></i><a href="#">info@whatever.com</a></li>
                        <li><i class="icon-globe2"></i><a href="#">www.onsSite.com</a></li>
                    </ul>
                    <h3 class="section-title">Connect with Us</h3>
                    <ul class="social-media">
                        <li><a href="#" class="facebook"><i class="icon-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="icon-twitter"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#" class="github"><i class="icon-github-alt"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 to-animate">
                    <h3 class="section-title">Drop us a line</h3>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Stellar Parallax -->
    <script src="js/jquery.stellar.min.js"></script>
    <!-- Owl Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Main JS (Do not remove) -->
    <script src="js/main.js"></script>
</body>
</html>