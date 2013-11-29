<?php
//Check to see if user logged in 
include 'includes/session.php';
require_once 'includes/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="images/favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="css/style.css">
        <title>Admin || Celtic Music</title>
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
                       <li><a href="admin.php">↜Back</a></li>
                            
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="info">
                <article class="hero clearfix">
                    <div class="col_100">
<?php
$action = isset( $_POST['action'] ) ? $_POST['action'] : "";
if($action == 'update'){

    try{
   
        //write query
        $query = "UPDATE activities
                    SET activity = :activity, theme = :theme, description = :description, website  = :website, image = :image, tourguide_id = :tourguide_id
                    where id = :id";
        //prepare query for excecution and bind the parameters
    include 'includes/prepare_bind.php';
        $stmt->bindParam(':id',$_POST['id']);
       
        // Execute the query
        $stmt->execute();
       
        echo "<p class='success'>Successful editing!</p>";
   
    }catch(PDOException $exception){ //to handle error
        echo '<p class="warning">'."Error: " . $exception->getMessage() . '</p>';
    }
}

if (isset($_GET['e'])){
try {
    //prepare query
    $query = "select id, activity, theme, description, website, image, tourguide_id  from activities where id = :id limit 0,1";
    $stmt = $pdo->prepare( $query );
    $stmt->bindParam(':id', $_GET['e']);
    //execute our query
    $stmt->execute();
   
    //store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
   
    //values to fill up our form
    $id = $row['id'];
    $activity = $row['activity'];
    $theme = $row['theme'];
    $description = $row['description'];
    $website = $row['website'];
    $image = $row['image'];
    $tourguide_id = $row['tourguide_id'];
}catch(PDOException $exception){ //to handle error
    echo '<p class="warning">'."Error: " . $exception->getMessage() . '</p>';
}
}

if($action=='create'){
    try{
   
        //write query  
        $query = "INSERT INTO activities 
        SET activity = :activity, theme = :theme, description = :description, website  = :website, image = :image, tourguide_id = :tourguide_id";
        //prepare query for excecution and bind the parameters
        include 'includes/prepare_bind.php';
        
        // Execute the query
        $stmt->execute();
       
        echo "<p class='success'>New record added</p>";
   
    }catch(PDOException $exception){ //to handle error
            echo '<p class="warning">'."Error: " . $exception->getMessage() . '</p>';
    }
}
?>
<!--we have our html form here where user information will be entered-->
<form action='#' method='post' border='0'>
    <table>
       <tr>
            <td>Band</td>
            <td><input type='text' name='activity' value='<?php if(isset($activity)){ echo $activity;}  ?>' /></td>
        </tr>
        <tr>
             <td><p>Region</p></td>
              <td><select name="theme" id="select-choice">
                <option value="scotish">Scotland</option>
                <option value="irish">Ireland</option>
                <option value="wales">Wales</option>
                <option value="man">Isle of Man</option>
                <option value="cornwall">Cornwall</option>
                <option value="bretton">Brittany</option>
              </select>
              <script type="text/javascript">document.getElementById('select-choice').value = '<?php if(isset($theme)){echo $theme;}  ?>'</script>
           
            </td>
        </tr>
        <tr>
            <td>Description</td>
                <td ><textarea name='description' rows ='10' cols ='100' wrap = 'virtual'><?php if(isset($description)){echo $description;}  ?></textarea>
           <!-- textarea gives a multilined (10 rows) area to display the field -->
        </tr>
        <tr>
            <td>Website</td>
            <td><input type='text' name='website'  value='<?php if(isset($website)){echo $website;}  ?>' /></td>
        <tr>
            <td>Image</td>
            <td><input type='text' name='image'  value='<?php if(isset($image)){echo $image;}  ?>' /></td>
        </tr>
        <tr>
            <td>Author ID</td>
            <td><input type='text' name='tourguide_id'  value='<?php if(isset($tourguide_id)){echo $tourguide_id;}  ?>' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='hidden' name='id' value='<?php if (isset($_GET['e'])){echo $_GET['e'];}?>' />
                <input type='hidden' name='action' value='<?php  if (isset($_GET['e'])){echo 'update';}else{echo 'create';} ?>' />
                <input type='submit' value='Save' />
            </td>
        </tr>
    </table>
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
                            <li><a href="admin.php">↜Back</a></li>
                        </ul>
                    </nav>
                </footer>
            </div>
    </body>

</html>