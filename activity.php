<?php
require_once('includes/connect.php');

// this gets the theme that was passed in the URL and places it in $link
if (isset($_GET['theme'])) {
	$link = $_GET['theme'];
} else {
	$link='irish';
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
//$activity_sql="SELECT * from activities WHERE id=:id";
$activity_sql= "SELECT *
FROM activities
Inner Join tourguide on tourguide.id = activities.tourguide_id
WHERE activities.id =:id
";
$resultActivity = $pdo -> prepare($activity_sql);
//bind the query
$resultActivity->bindValue(':id',$id,PDO::PARAM_STR);
//execute the query
$resultActivity -> execute();
?>
<!doctype html>
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
                    	<div class="col_25">
                    		<nav>
								<?php	
								foreach($resultNavigation as $row) {
									echo '<li><a href="activity.php?id='. $row['id'] . '&amp;theme='. $row['theme'] .'">' . $row['activity'] .'</a></li><br />';
								} 
								if(isset($_GET['from_search'])) { ?>
									<li><a href="javascript:history.back(-1);">Back to search results</a></li>
									<?php } ?> 
                    		</nav>
                    	</div>
                    	<div class="col_75">
									<?php 
		 							foreach($resultActivity as $row) { 
                                        echo '<p class="right">Author: '.$row['firstname'].'</p>';
		 								$image_name = $row['image'];
		 								echo '<p><img class="img_floatright" src="images/' . $image_name . '" alt="' . $image_name . '"/>';
		 								echo '<h1>'.$row['activity'].'</h1>'. $row['description'].'</p>';
		 								

		 							} ?>
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