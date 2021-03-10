<?php include("db.php")?>
<?php include("includes/header.php")?>
<div class="container p-4">
<div class="row">
    <div class="col-md-4">
        <?php if(isset($_SESSION['message'])){
            echo '<div class="alert alert-'.$_SESSION['message_type'].' alert-dismissible fade show" role="alert">
            <strong>'.$_SESSION['message'].'</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            session_unset();
          } ?>
        <div class="card card-body">
            <form action="save_task.php" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="title" placeholder="ingrese el nombre" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="description" id="" rows="2" class="form-control" placeholder="taskdescription"></textarea>
                </div>
                <input type="submit" value="Enviar" class="btn btn-success btn-block" name="save_task">
            </form>
        </div>
    </div>
    <div class="col-md-8">
    
          <table class="table table-bordered">
          <thead>
            <tr>
                <td>Title</td>
                <td>Description</td>
                <td>Created at</td>
                <td>Actions</td>
            </tr>
          </thead>
          <tbody>
          <?php
          $query="SELECT * FROM task";
          $resultado=$conn->query($query);
          while($row=$resultado->fetch_row()){
            echo "
            <tr>
                <td>".$row[1]."</td>
                <td>".$row[2]."</td>
                <td>".$row[3]."</td>
                <td><a class='btn btn-secondary' href='edit_task.php?id=".$row[0]."'><i class='fas fa-pencil-alt'></i></a>
                <a class='btn btn-danger' href='delete_task.php?id=".$row[0]."'><i class='fas fa-trash'></i></a>
                </td>
            </tr>
            ";
          }
          ?>
          </tbody>
          </table>
    </div>
</div>
</div>






<?php include("includes/footer.php")?>






