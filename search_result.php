<?php
//first connect to the database
require_once('includes/connect.php');
if (!$_POST['search']) {
	echo 'Please return to the home page and enter a search query';
	exit;
} else {
	$search=$_POST['search'];
/* Define the SQL statement that will be applied in prepare() note the use of :search parameter */
 $sql = "SELECT *  FROM activities WHERE (activity LIKE :search OR  description LIKE :search) ";
$search_result = $pdo->prepare($sql);  //prepares and stores the SQL statement in $result
/*we use the bindValue method of the pdo statement object to bind a value (%swimming%) 
to the parameter :search and then use the execute method to execute the query stored in $result */
$search_result->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);
$search_result -> execute();
// this gets the theme that was passed in the URL and places it in $link
if (isset($_GET['theme'])) {
	$link = $_GET['theme'];
} else {
	$link='relax';
}

//this helps to prevent sql injection
$link=htmlspecialchars($link,ENT_QUOTES, 'UTF-8');
//prepare the navigation result set
$navigation_sql = "SELECT * FROM activities WHERE theme LIKE :theme";
$resultNavigation = $pdo -> prepare($navigation_sql);
//bind the query
$resultNavigation->bindValue(':theme','%'.$link.'%',PDO::PARAM_STR);
//execute the query
$resultNavigation -> execute();
/* check to see if the URL contains the id if not give it a default value */
if (isset($_GET['id'])) {
	$id = $_GET['id'];
} else {
	$id=4;
}
$id=htmlspecialchars($id,ENT_QUOTES, 'UTF-8');
// get the activity recordset
$activity_sql="SELECT * from activities WHERE id=:id";
$resultActivity = $pdo -> prepare($activity_sql);
//bind the query
$resultActivity->bindValue(':id',$id,PDO::PARAM_STR);
//execute the query
$resultActivity -> execute();
}
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="images/favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="css/style.css">
        <title>Celtic Music</title>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">
            <header class="header clearfix">
                <div class="logo">Celtic Music</div>
                <nav class="menu_main">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                       
                            <li><a href="activity.php?id=10&theme=scotish">Scotland</a></li>
                            <li><a href="activity.php?id=13&theme=irish">Ireland</a></li>
                            <li><a href="activity.php?id=21&theme=wales">Wales</a></li>
                            <li><a href="activity.php?id=24&theme=man">Isle of Man</a></li>
                            <li><a href="activity.php?id=29&theme=cornwall">Cornwall</a></li>
                            <li><a href="activity.php?id=6&theme=bretton">Brittany</a></li>
                        <li>
                            <form action="search_result.php" method="post" id="searchform">
                                <input type="text" size="18" maxlength="30" name="search" />
                                <input type="submit" class="button" name="submit" value="Search" />
                            </form>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="info">
                <article class="hero clearfix">
                    <div class="col_100">
                    	<div class="col_75">
                    		<ul>
                    			<h2>Search Results</h2>
									<h3>Please click a link for more detailed information</h3>
								<?php
									// Parse the result set
									foreach($search_result as $row) { ?>
									<li><h4><a href="activity.php?id=<?php echo $row['id'];?>&amp;theme=<?php echo $row['theme'];?>&amp;from_search=2">
										<?php echo $row['activity'];?></a></h4></li> <br />
										<?php
									} ?>	
								</ul>
	  				 </div>
	  				 <div class="col_25">
	  				 			<?php include('includes/information.php'); ?>

	  				 </div>
                    <div class="clearfix"></div>
                </article>
            </div>
            <footer class="footer clearfix">
                <div class="copyright">Celtic Music || <a href="login.php">Admin</a>
                </div>
                <nav class="menu_bottom">
                    <ul>
                           <li><a class="active" href="index.php">Home</a></li>
                            <li><a href="activity.php?id=10&theme=scotish">Scotland</a></li>
                            <li><a href="activity.php?id=13&theme=irish">Ireland</a></li>
                            <li><a href="activity.php?id=21&theme=wales">Wales</a></li>
                            <li><a href="activity.php?id=24&theme=man">Isle of Man</a></li>
                            <li><a href="activity.php?id=29&theme=cornwall">Cornwall</a></li>
                            <li><a href="activity.php?id=6&theme=bretton">Brittany</a></li>
                        </li>
                    </ul>
                </nav>
            </footer>
        </div>
    </body>

</html>