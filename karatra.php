<?php 
    include "bdd.php";

     // datables
    $sql = 'SELECT * FROM `batisa` ORDER by `id`';
    $query = $bdd->prepare($sql);
    $query->execute();
    // recuperer les valeurs
    $badge = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Karatra Batisa</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
</head>
<style>
.card {
    margin-bottom: 11px;
    margin-top: 12px;
}
.sary{
    border: 2px solid black;
    float: right;
    box-shadow: 10px 5px 5px grey;
    width: 100px;
    height: 100px;
}
.card-body {
    display: flex;
    flex-direction: column;
}
.momba {
    margin-top: 13px;
}

</style>
<body>
   <header class="main-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="logo">
                    <span><h3>Karatra_Batisa</h3></span>
                </div>
            </div> 
            
            <div class="col-md-9">
                <div class="bouton">
                    <a href="ajouter.php" class="btn btn-info" style="float: right;"><i class="bi bi-plus-circle-fill">  Hanampy</i></a>
                    <a href="index.php" class="btn btn-info" style="margin-left: 69%;"><i class="bi bi-list-check">  Hijery lisitra</i></a>
                   
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="menubar">
                  <p style="text-align: center; font-size: 35px; " class="lisitra"><em>Karatr'ireo vita batisa</em></p>
                </div>
            </div>
        </div>
</div>
<!-- badge -->
    <!-- Profil des employes-->
<div class="page-wrapper">
    <div class="content container-fluid">
        
        <div class="profile d-flex flex-wrap justify-content-between">
            <?php foreach($badge as $propos){ ?>
            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <div class="sary">
                        <img src="img/za.jpeg" style="width: 96px; height: 96px;" alt="">
                    </div>
                    <div class="momba">
                        <p class="card-title" style=""><?=$propos['nom']?></p>
                        <p class="card-title" style=""><?=$propos['prenom']?></p>
                        <p class="card-title" style=""><?=$propos['eglise']?></p>
                        <p class="card-title" style=""><?=$propos['daty_nahaterahany']?></p>
                        <p class="card-title" style=""><?=$propos['daty_nanaovana_batisa']?></p>
                        
                        <a href=""class="btn btn-primary" style="margin-left:52px;">Details</a>
                        
                    </div>
                    
                </div>
            </div>
            <?php }?>
        </div>
        <button class="btn btn-success" onclick="alefa()">Imprimer</button>
      <!-- //photo anarana employe -->
        <!-- Farany container-fluid -->
  </div>
</div>
    <!-- Farany wrapper -->


<script type="text/javascript">
    function alefa(){
        window.print();
    }
</script>

<script src="js/myscript.js"></script>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>