       	<?php
       	$stmt = $pdo->prepare($query);
        $stmt->bindParam(':activity', $_POST['activity']);
        $stmt->bindParam(':theme', $_POST['theme']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':website', $_POST['website']);
        $stmt->bindParam(':image', $_POST['image']);
        $stmt->bindParam(':tourguide_id', $_POST['tourguide_id']);
       
        ?>