<?php
include("db.php");
$title=$_POST['title'];
$description=$_POST['description'];
if(!empty($title)&&!empty($description)){
    $SELECT="SELECT title FROM task where title = ? limit 1";
    $INSERT="INSERT INTO task (title,description) values(?,?)";
    $mtst = $conn->prepare($SELECT);
    $mtst->bind_param('s',$title);
    $mtst->execute();
    $mtst->bind_result($title);
    $mtst->store_result();
    $rnum=$mtst->num_rows;
    if($rnum==0){
        $mtst->close();
        $mtst=$conn->prepare($INSERT);
        $mtst->bind_param('ss',$title,$description);
        $mtst->execute();

        $_SESSION['message']= "guardado";
        $_SESSION['message_type']= "success";
        header("Location: index.php");
        
    }else{
        $_SESSION['message']= "El titulo se repite";
        $_SESSION['message_type']= "warning";
        header("Location: index.php");
    }
    $mtst->close();
    $conn->close();
}else{
        $_SESSION['message']= "Llene todos los campos";
        $_SESSION['message_type']= "warning";
        header("Location: index.php");
    die();
}
?>