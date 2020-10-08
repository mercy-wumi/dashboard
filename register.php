<?php  
   include_once 'class.php';  

   $user = new User(); 
   $alertClasses = "hidden";
   $alertMessage = "";
   if ($_SERVER["REQUEST_METHOD"] == "POST"){  
      $register = $user->register($_REQUEST['firstname'],$_REQUEST['lastname'],$_REQUEST['email'],$_REQUEST['password']);  
      //echo $register;
      if($register["status"] == "success"){  
        $alertClasses = "alert-success";
        $alertMessage = "Registration Successful!<br> Check your email to verify your account";
      }
      else
      {  
        $alertClasses = "alert-danger";
        $alertMessage = $register["msg"];
      }  
   }  
?>  

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Register Page - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="./app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="./app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/themes/semi-dark-layout.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- register section starts -->
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10">
                        <div class="card bg-authentication mb-0">
                            <div class="row m-0">
                                <!-- register section left -->
                                <div class="col-md-6 col-12 px-0">
                                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="text-center mb-2">Sign Up</h4>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p> <small> Please enter your details to sign up and be part of our great community</small>
                                            </p>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form class="form" action="" method="post">
                                                    <!-- <div class="form-row"> -->
                                                        <div class="form-group mb-50">
                                                            <label for="inputfirstname4">first name</label>
                                                            <input type="text" class="form-control" id="inputfirstname4" name= "firstname" placeholder="First name" required>
                                                        </div>
                                                        <!-- <div class="form-group col-md-6 mb-50">
                                                            <label for="inputlastname4">last name</label>
                                                            <input type="text" class="form-control" id="inputlastname4" placeholder="Last name">
                                                        </div> -->
                                                    <!-- </div> -->
                                                    <div class="form-group mb-50">
                                                        <label class="text-bold-600" for="exampleInputUsername1">lastname</label>
                                                        <input type="text" class="form-control" id="exampleInputUsername1" name= "lastname" placeholder="Last name" required></div>
                                                    <div class="form-group mb-50">
                                                        <label class="text-bold-600" for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" name= "email" placeholder="Email address" required></div>
                                                    <div class="form-group mb-2">
                                                        <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword1" name= "password" placeholder="Password" required>
                                                    </div>
                                                    <div class="alert alert-dismissible fade show <?php echo $alertClasses; ?>" role="alert">
                                                        <?php echo $alertMessage; ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary glow position-relative w-100" name = "signup">SIGN UP<!-- <i id="icon-arrow" class="bx bx-right-arrow-alt"></i> --></button>

                                                </form>
                                                <hr>
                                                <div class="text-center"><small class="mr-25">Already have an account?</small><a href="login.php"><small>Sign in</small> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- image section right -->
                                <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                    <img class="img-fluid" src="./app-assets/images/pages/register.png" alt="branding logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- register section endss -->
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="./app-assets/vendors/js/vendors.min.js"></script>
    <script src="./app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
    <script src="./app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
    <script src="./app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="./app-assets/js/core/app-menu.js"></script>
    <script src="./app-assets/js/core/app.js"></script>
    <script src="./app-assets/js/scripts/components.js"></script>
    <script src="./app-assets/js/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>

    <!-- <html>  
  
    <head>  
        <title>Registration</title>  
        <link rel="stylesheet" href="style.css" />  
    </head>  
  
    <body>  
      <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="firstname" placeholder="Firstname" required />
        <input type="text" class="login-input" name="lastname" placeholder="Lastname" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
        <div class="form">  
            <h1>Registration</h1>  
            <form action="" method="post">  
                <input type="text" name="name" placeholder="Please Enter Name" required />  
                <br />  
                <input type="text" name="username" placeholder="Please Enter Userame" required />  
                <br />  
                <input type="text" name="email" placeholder="Please Enter Email" required />  
                <br />  
                <input type="password" name="password" placeholder="Please Enter Password" required />  
                <br />  
                <input type="submit" name="submit" value="Register" />  
            </form>  
            <p>Alredy Registered?<a href="login.php"> Login Here</a></p>  
        </div>  
    </body>  
  
    </html> -->