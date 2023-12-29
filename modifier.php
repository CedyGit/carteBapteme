<?php 
    include 'bdd.php';

    $success = null;
    $erreur = null;

    if(isset($_GET['id']) AND $_GET['id'] > 0){
        $id = intval($_GET['id']);
        $manova = $bdd->prepare('SELECT * FROM `batisa` WHERE `id` = ?');
        $manova->execute(array($id));

        if(isset($_POST['hanova'])){
            
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

            if (!empty($_POST['nom'])){
                $up_nom = $bdd->prepare('UPDATE batisa SET nom = ? WHERE id = ?');
                $up_nom->execute(array($nom, $id));         
                }

            if (!empty($_POST['prenom'])){
                $up_prenom = $bdd->prepare('UPDATE batisa SET prenom = ? WHERE id = ?');
                $up_prenom->execute(array($prenom, $id));
            }
            
            if (!empty($_POST['laharana_karatra'])){
                $up_laharana_karatra = $bdd->prepare('UPDATE batisa SET laharana_karatra = ? WHERE id = ?');
                $up_laharana_karatra->execute(array($laharana_karatra, $id));
                }

            if (!empty($_POST['endrika'])){
                $up_endrika = $bdd->prepare('UPDATE batisa SET endrika = ? WHERE id = ?');
                $up_endrika->execute(array($endrika, $id));
            }

            if (!empty($_POST['adiresy'])){
                $up_adiresy = $bdd->prepare('UPDATE batisa SET adiresy = ? WHERE id = ?');
                $up_adiresy->execute(array($adiresy, $id));
            }

            if (!empty($_POST['fiainana'])){
                $up_fiainana = $bdd->prepare('UPDATE batisa SET fiainana = ? WHERE id = ?');
                $up_fiainana->execute(array($fiainana, $id));
            }

            if (!empty($_POST['daty_nahaterahany'])){
                $up_daty_nahaterahany = $bdd->prepare('UPDATE batisa SET daty_nahaterahany = ? WHERE id = ?');
                $up_daty_nahaterahany->execute(array($daty_nahaterahany, $id));
            }  

            if (!empty($_POST['toerana_nahaterahany'])){
                $up_toerana_nahaterahany = $bdd->prepare('UPDATE batisa SET toerana_nahaterahany = ? WHERE id = ?');
                $up_toerana_nahaterahany->execute(array($toerana_nahaterahany, $id));
            }  

            if (!empty($_POST['daty_nanaovana_batisa'])){
                $up_daty_nanaovana_batisa = $bdd->prepare('UPDATE batisa SET daty_nanaovana_batisa = ? WHERE id = ?');
                $up_daty_nanaovana_batisa->execute(array($daty_nanaovana_batisa, $id));
            }  

            if (!empty($_POST['eglise'])){
                $up_eglise = $bdd->prepare('UPDATE batisa SET eglise = ? WHERE id = ?');
                $up_eglise->execute(array($eglise, $id));
            }

            $success = "<h3>Vita ny fanovana!<h3/>";
        }else{
            $erreur = "<h3>Mbola tsy nanova<h3/>";
        }    

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
            <div class="col-md-6">
                <div class="bouton">
                     <!-- erreur -->
                    <?php if ($erreur): ?>
                            <div class="alert alert-danger" style="text-align: center;">
                                <?= $erreur ?>    
                            </div>
                            > 
                    <?php endif ?>
                    <!-- erreur -->

                    <!-- success -->
                    <?php if ($success): ?>
                        <div class="alert alert-success" style="text-align: center;">
                            <?= $success ?>    
                        </div>
                    <?php endif ?>
                    <!-- success -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="bouton">
                    <a href="index.php" class="btn btn-info" style="float: right;"><i class="bi bi-list-check"> Hijery lisitra</i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="menubar">
                  <p style="text-align: center; font-size: 35px; " class="lisitra"><em>Hanova ny mombamomban'i<?=$ovaina['nom']?></em></p>
                </div>
                <div class="modal-body" style="background:lavender;">       
                    
                <form method="post" enctype="multipart/form-data" style="background-color:lavender;">

                            <div class="row">
                            <?php while($ovaina = $manova->fetch()) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Anarana</label>
                                        <input class="form-control" type="text" id="nom" name="nom" value="<?= $ovaina['nom']?>" required="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Fanampiny</label>
                                        <input class="form-control" type="text" id="prenom" name="prenom" value="<?= $ovaina['prenom']?>" required="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Laharana Karatra</label>
                                        <input class="form-control" type="number" id="laharana" name="laharana_karatra" value="<?= $ovaina['laharana_karatra']?>" required="">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Endrika<span class="text-danger">* *</span></label>
                                        <select class="select form-control" id="endrika" name="endrika" value=">">
                                            <option value=""><?= $ovaina['endrika']?></option>
                                            <option value="lahy">Lahy</option>
                                            <option value="vavy">Vavy</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Adiresy<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="" name="adiresy" value="<?= $ovaina['adiresy']?>" required="">
                                        
                                      </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="col-form-label">Fiainana</label>
                                      <select class="select form-control" id="Budget_et_service" name="fiainana" value="<?= $ovaina['fiainana']?>">
                                          <option value=""><?= $ovaina['fiainana']?></option>
                                          <option value="Mpitovo">Mpitovo</option>
                                          <option value="Manambady">Manambady</option>
                                      </select>
                                      
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label">Daty Nahaterahana</label>
                                      <div class="cal-icon">
                                      <input type="date" class="form-control" name="daty_nahaterahany" value="<?= $ovaina['daty_nahaterahany']?>" required="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label">Toerana Nahaterahana<span class="text-danger">*</span></label>
                                      <input type="text" class="form-control" id="emploi_et_grade" name="toerana_nahaterahany" value="<?= $ovaina['toerana_nahaterahany']?>" required="">
                                    </div>
                                  <div class="form-group">
                                      <label class="col-form-label">Daty nanaovana Batisa</label>
                                      <div class="cal-icon">
                                          <input type="date" class="form-control" name="daty_nanaovana_batisa" value="<?= $ovaina['daty_nanaovana_batisa']?>" required="">
                                          
                                      </div>
                                  </div>                    
                                  <div class="form-group">
                                    <label class="col-form-label">Anaran'Fiangonana<span class="text-danger"> Facultatif</span></label>
                                    <input class="form-control" type="text" id="eglise" name="eglise" value="<?= $ovaina['eglise']?>" required="">
                                    
                                  </div>
                                </div> 
                            </div>
                                <input type="submit" class="btn btn-success" name="hanova" value="Hanova">
                            <?php } ?>
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