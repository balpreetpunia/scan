<?php

$model = isset($_GET['model']) ? $_GET['model'] : '';

if($model != ''){

    require 'shared/connect.php';

    $sql = "select model from count where model = '$model'";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $count = $sth->rowCount();

    if ($count > 0){

    }
    else{
        $sql = "INSERT INTO count (model, count) VALUES ('$model',1)";
        $dbh->exec($sql);
    }

    $dbh = null;

}

header('Location: /');


?>