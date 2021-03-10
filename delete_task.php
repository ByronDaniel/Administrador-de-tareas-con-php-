<?php
    include("db.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query="DELETE FROM task WHERE id = ".$id;
        $mtst = $conn->prepare($query);
        $mtst->execute();
        $_SESSION['message']= "task deleted";
        $_SESSION['message_type']= "danger";
        header("Location: index.php");
        $mtst->close();
    }
?>