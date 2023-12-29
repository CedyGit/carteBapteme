<?php 
    include 'bdd.php';

   if(isset($_GET['id']) AND $_GET['id'] > 0){
       $id = intval($_GET['id']);
       $details = $bdd->prepare('SELECT * FROM `batisa` WHERE `id` = ?');
       $details->execute(array($id));
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
<style>
#card-profil {
    background-color: #fff;
    border: 6px solid #ededed;
    box-shadow: 0 6px 6px 0 rgb(0 0 0 / 20%);
    margin-top: 25px;
    margin-left: 24%;
    width: 50%;
}
.card-title {
  text-align: center;
  margin-top: 15px;
  color: firebrick;
  text-decoration: underline;
}
.card-img-top{
  margin-top: 180px;
}
li {
  list-style: none;
}
li .info{
  font-weight: bold;
}
/* details */
.infop {
  font-family: cursive;
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
                    <a href="index.php" class="btn btn-info" style="float: right;"><i class="bi bi-list-check"> Hijery lisitra</i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="menubar">
                  <p style="text-align: center; font-size: 35px; " class="lisitra"><em>Mombamomban'ireo vita batisa</em></p>
                </div>
            <!-- details -->
            <?php 
                foreach($details as $momba_azy){
            ?>
                <div id="card-profil">
                      <h2 class="card-title"><?= $momba_azy['prenom']?></h2>
                        <div class="row">
                          <div class="col-md-6 d-flex">
                            <div class="card-body">
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-single-02 "></i> # :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-single-02 "></i> Anarana :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-circle-08 "></i> Fanampiny :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-email-83 "></i> laharany Karatra :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-album-2 "></i> Endrika :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-user-run "></i> Adiresy :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-pin-3 "></i> Fiainana :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-mobile-button"></i> Daty nahaterahany :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-laptop "></i> Toerana nahaterahany :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-briefcase-24 "></i> Daty nanaovana batisa :</div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="info"><i class="ni ni-badge "></i> Fiangonana misy azy :</div></li>
                                  </ul>
                              </div>
                             
                            </div>
                          </div>
                          <!-- donnée -->
                        
                          <div class="col-md-6 d-flex">
                            <div class="card-body">
                            <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['id']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['nom']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['prenom']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['laharana_karatra']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['endrika']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['adiresy']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['fiainana']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['daty_nahaterahany']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['toerana_nahaterahany']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['daty_nanaovana_batisa']?></div></li>
                                  </ul>
                              </div>
                              <div class="title">
                                  <ul class="personnal-info">
                                    <li><div class="infop"><?= $momba_azy['eglise']?></div></li>
                                  </ul>
                              </div>
                              
                            <?php } ?>

                            </div>
                            
                            </div>
                          
                          </div>
                         
                          <button class="btn btn-success" onclick="imprimer()">Imprimer</button>
                          <!-- <button class="btn btn-primary" style="float: right"><a href="modifier.php?id=/"></a> Hanova</button> -->
                          
                        </div>
                       
                      </div>
                      
                  </div>
        <!-- details -->
            </div>
        </div>
    </div>
</header>

<script src="js/jquery-3.4.1.js"></script>
<script>
  function imprimer(){
    window.print();
  }
</script>




<script src="print.js"></script>
<script src="js/myscript.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>