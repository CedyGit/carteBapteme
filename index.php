<?php
include "bdd.php";

// datables
$sql = 'SELECT * FROM `batisa` ORDER by `id`';
$query = $bdd->prepare($sql);
$query->execute();
// recuperer les valeurs
$select = $query->fetchAll(PDO::FETCH_ASSOC);

// mamafa
if (isset($_GET['fafana']) and $_GET['fafana'] > 0) {
    $fafana = intval($_GET['fafana']);
    $sql = 'DELETE FROM `batisa` WHERE `id` = ?';
    $mamafa = $bdd->prepare($sql);
    $mamafa->execute(array($fafana));
    header('location:index.php');
}

// pagination
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
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
$parPage = 8;
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
// fin pagination

// recherche
$sql = 'SELECT * FROM `batisa`';
$params = [];


if (!empty($_GET['recherche'])) {
    $sql .= " WHERE prenom LIKE :prenom";
    $params['prenom'] = '%' . $_GET['recherche'] . '%';

    $statement = $bdd->prepare($sql);
    $statement->execute($params);
    $select = $statement->fetchAll();
}
$sql .= "LIMIT 8";
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
                        <span>
                            <h3>Karatra_Batisa</h3>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- recherche -->
                    <div class="search">
                        <form method="GET" class="form-inline">
                            <input type="search" name="recherche" class="form-control" placeholder="Tadiavo eto" value="<?= htmlentities($_GET['recherche'] ?? null) ?>" style="text-align: center; margin-left: 85px;">&nbsp;&nbsp;
                            <button class="btn btn-success">Hitady</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bouton">
                        <a href="ajouter.php" class="btn btn-info" style="float: right;"><i class="bi bi-plus-circle-fill"> Hanampy</i></a>
                        <a href="karatra.php" class="btn btn-info" style="float: left;"><i class="bi bi-cash-stack"> Karatra</i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="menubar">
                        <p style="text-align: center; font-size: 35px; " class="lisitra"><em>Lisitry ny vita batisa</em></p>
                    </div>

                    <table id="vitabatisa" class="table table-bordered table-sm" style="border-color: #454d55;">
                        <thead>
                            <tr style="text-align: center;" class="bg-dark">
                                <th class="text-white bg-dark">#</th>
                                <th class="text-white bg-dark">Anarana</th>
                                <th class="text-white bg-dark">Fanampiny</th>
                                <th class="text-white bg-dark">Daty nahaterahana</th>
                                <th class="text-white bg-dark">Adiresy</th>
                                <th class="text-white bg-dark">Fiangonana</th>
                                <th class="text-white bg-dark">Daty batisa</th>
                                <th class="text-white bg-dark">Hanova</th>
                            </tr>
                        </thead>
                        </tbody>
                        <!--  -->
                        <tbody>
                            <?php
                            foreach ($select as $liste) {
                            ?>

                                <tr style="text-align: center;">
                                    <td><?= $liste['id'] ?></td>
                                    <td><a title="Hijery ny momba azy?" href="detail.php?id=<?= $liste['id']; ?>"><?= $liste['nom'] ?></a></td>
                                    <td><?= $liste['prenom'] ?></td>
                                    <td><?= $liste['daty_nahaterahany'] ?></td>
                                    <td><?= $liste['adiresy'] ?></td>
                                    <td><?= $liste['eglise'] ?></td>
                                    <td><?= $liste['daty_nanaovana_batisa'] ?></td>
                                    <td>
                                        <a href="modifier.php?id=<?= $liste['id']; ?>"><i class="bi bi-pencil-fill" style="color: green; font-size: 25px; "></i></a>&times;
                                        <a href="index.php?fafana=<?= $liste['id']; ?>"><i class="bi bi-trash-fill" onclick="return confirm('Voulez-vous supprimer')" style="color: red; font-size: 25px;"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- pagination -->

                    <nav aria-label="Page navigation example">
                        <ul class="pagination" style="margin-left: 40%;">
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                <a class="page-link" href="./?page=<?= $currentPage - 1 ?>">aloha</a>
                            </li>

                            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                <a href="./?page=<?= $page ?>" class="page-link"><?= $currentPage ?></a>
                            </li>

                            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                <a class="page-link" href="./?page=<?= $currentPage + 1 ?>">Manaraka</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </header>


    <script src="js/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function() {

        });
    </script>

    <script src="print.js"></script>
    <script src="js/myscript.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>