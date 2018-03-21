<?php

    date_default_timezone_set("America/Toronto");

    $model = isset($_POST['model']) ? $_POST['model'] : '';
    $qty = isset($_POST['qty']) ? $_POST['qty'] : '';
    $error = -1;


    require "shared/connect.php";

    if ($model != ''){

        $sql = "select model from count where model = '$model'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $count = $sth->rowCount();

        if($count > 0){
            if($qty == '') {
                $sql = "UPDATE count SET count = count +1 WHERE model = '$model'";
                $dbh->exec($sql);
                $error = 0;
            }
            else{
                $sql = "UPDATE count SET count = count +$qty WHERE model = '$model'";
                $dbh->exec($sql);
                $error = 0;
            }
        }
        else{
            $error = 1;
        }
    }

    $dbh=null;

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
<div class="container" id="container1">
    <div class="jumbotron pb-4">
        <h1><a href="/scan" >Count Inventory</a></h1>
        <p>Select model to add to inventory. DO NOT REFRESH AFTER ADDING.</p>
        <p><a href="/scan">&lt;&lt;Back</a></p>
    </div>
    <div class="input-field">
        <form id="calculator" method="post" action="">
            <div class="form-group">
                <input id="model" name="model" class="auto form-control" placeholder="Model" type="text" />
            </div>
            <div class="form-group">
                <input id="qty" name="qty" class="form-control" placeholder="Qty" type="number" />
            </div>
            <div class="btn-group d-flex" role="group">
                <button class="btn btn-primary w-100" id="generate" type="submit">Add</button>
            </div>
        </form>
    </div>
    <hr>
    <?php
    if ($error==0){echo"<h3 class='text-center'>$model Added</h3>";}
    elseif($error ==1){
        echo "<h3 class='text-center'>Model not found <a href='add.php?model=$model'>Add $model to Database</a></h3>";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function() {

        //autocomplete
        $(".auto").autocomplete({
            source: "search.php",
            minLength: 1
        });

    });
</script>
<script>
    document.addEventListener('keydown', function(event) {
        if( event.keyCode == 17 || event.keyCode == 74 ) {
            event.preventDefault();
            document.getElementById("calculator").submit();
        }
    });
    document.getElementById("model").focus();
</script>
<script>console.log("Balpreet Punia \nhttps://balpreetpunia.github.io \n705-500-4784");</script>
</body>
</html>




