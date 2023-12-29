<?php 
    include "bdd.php";

    // datables
    $sql = 'SELECT * FROM `batisa` ORDER by `id`';
    $query = $bdd->prepare($sql);
    $query->execute();
    // recuperer les valeurs
    $select = $query->fetchAll(PDO::FETCH_ASSOC);

    // mamafa
    if(isset($_GET['fafana']) AND $_GET['fafana'] > 0){
        $fafana = intval($_GET['fafana']);
        $sql = 'DELETE FROM `batisa` WHERE `id` = ?';
        $mamafa = $bdd->prepare($sql);
        $mamafa->execute(array($fafana));
        header('location:index.php');
    }

    // pagination
    if(isset($_GET['page']) &&!empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }
    // on determine le nombre de vita batisa
    $sql = 'SELECT COUNT(*) AS nbVitabatisa FROM `batisa`;';
    $query = $bdd->prepare($sql);
    $query->execute();
    // recuperena ny nb
    $result = $query->fetch();
    $nbVitabatisa = (int) $result['nbVitabatisa'];

    // nb vitabatisa par page
    $parPage = 6;
    // calcul nb page total
    $page = ceil($nbVitabatisa / $parPage);
    // calcul du premier article de la page
    $premier = ($currentPage * $parPage) - $parPage;

    $sql = 'SELECT * FROM `batisa` ORDER BY `date` DESC LIMIT :premier, :parpage;';
    $query = $bdd->prepare($sql);

    $query->bindValue(':premier', $premier, PDO::PARAM_INT);
    $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

    $query->execute();
    // recuperena
    $select = $query->fetchAll(PDO::FETCH_ASSOC);

?>


    <!-- pagination -->

    <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a class="page-link" href="./?page=<?= $currentPage - 1 ?>">aloha</a>
                        </li>

                        <?php for($pages = 1; $pages <= $pages; $pages++): ?>

                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="./?page=<?= $page ?>" class="page-link"><?= 1?></a>
                        </li>

                        <?php endfor ?>

                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a class="page-link" href="./?page=<?= $currentPage + 1 ?>">Manaraka</a>
                        </li>
                    </ul>
                </nav>


<!-- mety -->
                    <!-- pagination -->

                    <nav aria-label="Page navigation example">
                    <ul class="pagination" style="margin-left: 40%;">
                        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                            <a class="page-link" href="./?page=<?= $currentPage - 1 ?>">aloha</a>
                        </li>

                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="./?page=<?= $page ?>" class="page-link"><?= $currentPage?></a>
                        </li>

                        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                            <a class="page-link" href="./?page=<?= $currentPage + 1 ?>">Manaraka</a>
                        </li>
                    </ul>
                </nav>



        <!-- modifier -->

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

            $success = "Vita fanovana";
        }else{
            $erreur = "Misy olana";
        }    

    }




      // recherche
      $sql = 'SELECT * FROM `batisa`';
      $param = [];
  
      if(!empty($_GET['recherche'])){
          $sql .= " WHERE nom LIKE \"%". $_GET['recherche'] . "%\"";
      }
  
      $sql .= "LIMIT 8";

      $select = $bdd->query($sql)->fetchAll();


      // recherche
    $sql = 'SELECT * FROM `batisa`';
    $params = [];
    

    if(!empty($_GET['recherche'])){
        $sql .= " WHERE prenom, LIKE :prenom";
        $params['prenom'] = '%' . $_GET['recherche'] . '%';

        $statement = $bdd->prepare($sql);
        $statement->execute($params);
        $select = $statement->fetchAll();
    }
    $sql .= "LIMIT 8";



        // pagination
        $queryCount = "SELECT COUNT(id) as count FROM `batisa`";

        define('PER_PAGE', 10);
    
        $page = (int)($_GET['p'] ?? 1);
        $offset = ($page-1) * PER_PAGE;
    // requeste pagination
    $statement = $bdd->prepare($queryCount);
    $statement->execute($params);
    $count = (int)$statement->fetch()['count'];
    $pages = ceil($count / PER_PAGE);
?>

