<?php

    require 'shared/connect.php';

    $sql = "select * from count where count > 0";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $available = $sth->fetchAll();
    $count = $sth->rowCount();

    $total = 0;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Count</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-aNUYGqSUL9wG/vP7+cWZ5QOM4gsQou3sBfWRr/8S3R1Lv0rysEmnwsRKMbhiQX/O" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron pb-4">
            <h1><a href="/scan" >Count Inventory</a></h1>
            <p>View Counted Inventory</p>
            <p><a href="/scan">&lt;&lt;Back</a></p>
        </div>
        <hr class="pb-3">
        <div class="table-responsive">
            <table class="table table-stripped table-hover">
                <thead>
                <tr>
                    <td>Product</td>
                    <td>Brand</td>
                    <td>Model</td>
                    <td>In Hand</td>
                    <td>Counted</td>
                    <td>Cost</td>
                    <td>Amount</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($available as $avail ): ?>
                <tr <?php $amount = round($avail['cost']*$avail['count'],2); $total += $amount?>>
                    <td><?= $avail['product']?></td>
                    <td><?= $avail['brand']?></td>
                    <td><?= $avail['model']?></td>
                    <td><?= $avail['in_hand']*3?></td>
                    <td><?= $avail['count']?></td>
                    <td><?= '$'.$avail['cost']?></td>
                    <td><?= '$'.$amount?></td>
                </tr>
                <?php endforeach ?>
                <tr><td colspan="5"></td>
                    <td>Total:</td>
                    <td><?= '$'.$total ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>