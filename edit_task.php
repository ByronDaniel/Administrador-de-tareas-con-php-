<?php
include("db.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $SELECT="SELECT * FROM task WHERE id = ".$id;
    $mtst=$conn->query($SELECT);
    $resultado=$mtst->fetch_row();
}
if(isset($_POST['update'])){
    $id=$_GET['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $UPDATE="UPDATE task set title='".$title."', description='".$description."' WHERE id=".$id."";
    $mtst->close();
    mysqli_query($conn,$UPDATE);
    header("Location:index.php");
}   

?>
<?php include("includes/header.php");?>
<?php
    echo "
            <form action='edit_task.php?id=".$_GET['id']."' method='POST'>
                <div class='form-group'>
                    <input class='form-control' type='text' name='title' placeholder='ingrese el nombre' value='".$resultado[1]."' autofocus>
                </div>
                <div class='form-group'>
                    <textarea name='description' id='' rows='2' class='form-control' placeholder='taskdescription'>".$resultado[2]."</textarea>
                </div>
                <input type='submit' value='Actualizar' class='btn btn-success btn-block' name='update'>
            </form>
    "
?>


<?php include("includes/footer.php");?>