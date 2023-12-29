<?php
   include "bdd.php";


   $success = null;
   $erreur = null;

    // ampiana 
    if(isset($_POST['ampiana'])){

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $laharana_karatra = htmlspecialchars($_POST['laharana_karatra']);
        $endrika = htmlspecialchars($_POST['endrika']);
        $adiresy = htmlspecialchars($_POST['adiresy']);
        $fiainana = htmlspecialchars($_POST['fiainana']);
        $daty_nahaterahany = htmlspecialchars($_POST['daty_nahaterahany']);
        $toerana_nahaterahany = htmlspecialchars($_POST['toerana_nahaterahany']);
        $daty_nanaovana_batisa = htmlspecialchars($_POST['daty_nanaovana_batisa']);
        $eglise = htmlspecialchars($_POST['eglise']);
        
        if(!empty($_POST['nom']) and !empty($_POST['prenom'])  and !empty($_POST['laharana_karatra'])
            and !empty($_POST['endrika']) and !empty($_POST['adiresy']) and !empty($_POST['fiainana']) 
             and !empty($_POST['daty_nahaterahany']) and !empty($_POST['toerana_nahaterahany'])
             and !empty($_POST['eglise']))
             {
                 $req = $bdd->prepare("INSERT INTO batisa (nom, prenom, laharana_karatra, endrika, adiresy,
                 fiainana, daty_nahaterahany, toerana_nahaterahany, daty_nanaovana_batisa, eglise) VALUES (:nom, :prenom, 
                 :laharana_karatra, :endrika, :adiresy, :fiainana, :daty_nahaterahany, :toerana_nahaterahany,
                 :daty_nanaovana_batisa, :eglise)");

                // mandeha io fa don't Touch anh
                // regleo kely fotsiny
                // manjary very maina ny ezaka hahaa

                 $req->execute(array(
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "laharana_karatra" => $laharana_karatra,
                    "endrika" => $endrika,
                    "adiresy" => $adiresy,
                    "fiainana" => $fiainana,
                    "daty_nahaterahany" => $daty_nahaterahany,
                    "toerana_nahaterahany" => $toerana_nahaterahany,
                    "daty_nanaovana_batisa" => $daty_nanaovana_batisa,
                    "eglise" => $eglise,
                 ));
                
             }
                $success = "<h3>Vita ny fanampiana ny lisitra<h3/>";

             }else{
                $erreur = "<h3>Misy olana ny fanampiana lisitra<h3/>";
            
            }
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
                    <a href="index.php" class="btn btn-info" style="float: right;"><i class="bi bi-list-check"> Hijery lisitra</i></a>
                    <a href="karatra.php" class="btn btn-info" style="margin-left: 681px;"><i class="bi bi-cash-stack">  Karatra</i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="menubar">
                  <p style="text-align: center; font-size: 35px; " class="lisitra"><em>Hanampy ny isan'ny vita batisa</em></p>
                </div>
                 <!-- erreur -->
                 <?php if ($erreur): ?>
                            <div class="alert alert-danger" style="text-align: center;">
                                <?= $erreur ?>    
                            </div>
                            
                    <?php endif ?>
                    <!-- erreur -->

                    <!-- success -->
                    <?php if ($success): ?>
                        <div class="alert alert-success" style="text-align: center;">
                            <?= $success ?>    
                        </div>
                    <?php endif ?>
                    <!-- success -->

                <form method="post" enctype="multipart/form-data" style="background-color:lavender;">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Anarana</label>
                                        <input class="form-control" type="text" id="nom" name="nom" placeholder="Anarana" value="" required="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Fanampiny</label>
                                        <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Fanampiny" value="" required="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Laharana Karatra <span class="text-danger"> (Aza atao misy diso)</span></label>
                                        <input class="form-control" type="number" id="prenom" name="laharana_karatra" placeholder="Laharana Karatra" value="" required="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Endrika<span class="text-danger">* *</span></label>
                                        <select class="select form-control" id="endrika" name="endrika">
                                            <option value="">Hisafidy</option>
                                            <option value="lahy">Lahy</option>
                                            <option value="vavy">Vavy</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Adiresy<span class="text-danger"> (Adiresy mazava)</span></label>
                                        <input type="text" class="form-control" id="" name="adiresy" placeholder="Adiresy" value="" required="">
                                        
                                      </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="col-form-label">Fiainana</label>
                                      <select class="select form-control" id="Budget_et_service" name="fiainana">
                                          <option value="">Hisafidy</option>
                                          <option value="Mpitovo">Mpitovo</option>
                                          <option value="Manambady">Manambady</option>
                                      </select>
                                      
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label">Daty Nahaterahana</label>
                                      <div class="cal-icon">
                                      <input type="date" class="form-control" name="daty_nahaterahany" value="" required="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label">Toerana Nahaterahana<span class="text-danger"> (Toerana mazava)</span></label>
                                      <input type="text" class="form-control" id="emploi_et_grade" name="toerana_nahaterahany" placeholder="Toerana Nahaterahana" value="" required="">
                                    </div>
                                  <div class="form-group">
                                      <label class="col-form-label">Daty nanaovana Batisa</label>
                                      <div class="cal-icon">
                                          <input type="date" class="form-control" name="daty_nanaovana_batisa" value="" required="">
                                          
                                      </div>
                                  </div>                    
                                  <div class="form-group">
                                    <label class="col-form-label">Anaran'Fiangonana<span class="text-danger">  (Anaram-piangonana mazava)</span></label>
                                    <input class="form-control" type="text" id="nom_et_prenom" name="eglise" placeholder="Fiangonana" value="" required="">
                                    
                                  </div>
                                </div> 
                            </div>
                                <input type="submit" class="btn btn-success" name="ampiana" value="Ampiana">
                        </form>
                      </div>
            </div>
        </div>
    </div>
</header>



<script src="js/myscript.js"></script>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>