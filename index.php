<?php ?><!DOCTYPE html>
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
        <div class="jumbotron">
            <h1>Count Inventory</h1>
            <p>Select model to add to inventory. DO NOT REFRESH AFTER ADDING.</p>
        </div>
        <div class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 col-sm-12">
            <div class="row p-2">
                <a class="btn btn-primary btn-block btn-lg" href="scan">Scan</a>
            </div>
            <div class="row p-2">
                <a class="btn btn-primary btn-block btn-lg" href="enter">Enter</a>
            </div>
            <div class="row p-2">
                <a class="btn btn-primary btn-block btn-lg" href="view">View</a>
            </div>
            <div class="row p-2">
                <a class="btn btn-primary btn-block btn-lg disabled" href="reset">Reset</a>
            </div>
        </div>
    </div>
</body>
</html>
