<?php
    require("database.php");
 
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    }
    
    session_start();
    if(empty($_SESSION['id'])){
      header("location:../index.php");
    }else{

    if(!empty($_POST)){
        $id = $_POST['id'];
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM projet WHERE id_projet = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: gestprojet.php"); 
    }

   
?>




<!DOCTYPE html>
<html lang="fr-FR">

<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/jquery.modal.min.css">

</head>

<body>
    
    <div class="container-fluid">
        <div class="row">
            <div class="divt">
                <h2 class="m-0 font-weight-bold text-primary"><strong>Suppression de client</strong></h2>
            </div>
        </div>
       <div class="row">
           <br>
           <form class="form" action="projetdelete.php" role="form" method="post">
               <input type="hidden" name="id" value="<?php echo $id;?>"/>
               <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
               <div class="form-actions">
                 <button type="submit" class="btn btn-warning">Oui</button>
                 <a class="btn btn-default" href="gestprojet.php">Non</a>
               </div>
           </form>
       </div>
    </div>
    
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/jquery.modal.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/all.js"></script>
</body>
</html>
<?php }?>