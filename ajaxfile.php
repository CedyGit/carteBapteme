<?php 
    include "bdd.php";

    // read values
    $draw = $_POST['draw'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length'];
    $columnIndex = $_POST['order'][0]['column'];
    $columnName = $_POST['columns'][$columnIndex]['data'];
    $columnSortOrder = $_POST['order'][0]['dir'];
    $searchValue = $_POST['search']['value'];
  
    $searchArray = array();

    // recherche
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = "AND (nom LIKE :nom OR prenom LIKE :prenom OR laharana_karatra LIKE 
        :laharana_karatra)";
        $searchArray = array(
            'nom' => "%$searchValue%",
            'prenom' => "%$searchValue%",
            'laharana_karatra' => "%$searchValue%",
        );
    }

    // total ny hita tsy misy filtre
    $stmt = $bdd->prepare("SELECT COUNT(*) AS nbVitabatisa FROM batisa");
    $stmt->execute();
    $vita = $stmt->fetch();
    $totalVita = $vita['nbVitabatisa'];

    // total ny hita miosy filtre
    $stmt = $bdd->prepare("SELECT COUNT(*) AS nbVitabatisa FROM batisa WHERE 1 ".$searchQuery);
    $stmt->execute($searchArray);
    $vita = $stmt->fetch();
    $totalVitaFiltrer = $vita['nbVitabatisa'];

    // fetch record 
    $stmt = $bdd->prepare("SELECT * FROM `batisa` WHERE 1 ".$searchQuery." ORDER BY"
    .$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

    // bindvalues
    foreach($searchArray as $key->$search){
        $stmt->bindValue(":".$key,$search,PDO::PARAM_STR);
    }
    $stmt->bindValue(":limit",(int)$row,PDO::PARAM_INT);
    $stmt->bindValue(":offset",(int)$rowperpage,PDO::PARAM_INT);
    $stmt->execute();
    $vitaBa = $stmt->fetchAll();

    $data = array();

    foreach($vitaBa as $row){
        $data[] = array(
            "id" => $row['id'],
            "nom" => $row['nom'],
            "daty_nahaterahany" => $row['daty_nahaterahany'],
            "adiresy" => $row['adiresy'],
            "eglise" => $row['eglise'],
            "daty_nanaovana_batisa" => $row['daty_nanaovana_batisa'],
        );
    }

    // valiny
    $valiny = array(
        "draw" => intval($draw),
        "iTotalVita" => $totalVita,
        "iTotalDisplayRecords" => $totalVitaFiltrer ,
        "aaData" => $data
    );

    echo json_encode($valiny);

?>