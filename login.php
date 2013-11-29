<?php
session_start();
//logout function
if(isset($_GET["u"]) && $_GET["u"]==1){
session_destroy();
//return to main
header("Location: login.php");
}
//if loged in, redirects to admin panel
if (isset($_SESSION['id'])){
    header("Location:admin.php");
    exit;
}
?>

<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="images/favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="css/style.css">
        <title>Celtic Music</title>
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    
    <body>
        <div class="container">
            <header class="header clearfix">
                <div class="logo">Celtic Music</div>
                <nav class="menu_main">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                    </ul>
                </nav>
            </header>
            <div class="container">
                <div class="info">
                    <article class="hero clearfix">
                        <div class="col_100">
                                <form action="login.php" method="POST" class="center">
                                   		 <p class="col_33"><input type="text" id="username" name="username" placeholder="Username"></p>
                                   		 <p class="col_33"><input type="password" id="password" name="password" placeholder="Password"></p>
                                   	 	 <p class="col_33"><input type="submit" class="button" name="submit" value="Login"></p>
                                <?php 
                                    //we start a session here and if the login is succesful
                                    //we assign a session variable $_SESSION['id']=ID 
                                    include 'includes/connect.php'; 
                                    //if we get a username and password submitted from the loginform assign the
                                    //data to the variables $username and $password
                                    if (isset($_POST['username']) && isset($_POST['password'])) {
                                    $username=$_POST['username'];
                                    $password=$_POST['password'];
                                    //Get the data from the login table
                                        $sql = "SELECT * FROM login WHERE username = :username";
                                        $query = $pdo -> prepare($sql);
                                        $query -> bindParam(':username',$username);
                                        $query ->execute();
                                        //store retrieved row to a variable
                                        $results = $query -> fetch(PDO::FETCH_ASSOC);
                                        //check to see if we get a result and that it has a row
                                        if($results != FALSE && $query -> rowcount() > 0 ) {
                                                //set the salt to be the username from the login table
                                                $salt =$results['username'];
                                                //hash the submitted password
                                                $auth_user = hash('sha256', $salt.$password);
                                                //if the password in the login table matches the submitted password
                                                // set the $_SESSION variable $_SESSION['id'] and goto the admin page
                                                if($results['password'] == $auth_user ){
                                                $_SESSION['id']=$results['id'];
                                                header("Location:admin.php");
                                                exit;

                                                } else {//otherwise return to the loginform
                                                    echo '<br/><p class="warning">Login failed, check username and password.</p>';
                                                }
                                        }else {//otherwise return to the loginform
                                                 echo '<br/><p class="warning">Login failed, check username and password.</p>';
                                            }
                                        }
                                ?>
                                </form>
                        </div>
                        <div class="clearfix"></div>
                    </article>
                </div>
                <footer class="footer clearfix">
                    <div class="copyright">Celtic Music</a>
                    </div>
                    <nav class="menu_bottom">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                        </ul>
                    </nav>
                </footer>
            </div>
    </body>

</html>