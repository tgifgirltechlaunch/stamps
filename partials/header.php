<?php $page = $_GET['page']; if (isset($_GET['action'])) { $action= $_GET['action'];}?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= isset($title) ? $title : "Stamp Collecting Home" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Stamp Collection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($page=="home"){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=home">Home</a>
            </li>
            <li class="nav-item <?php if($page=="heat" && $action != "add"){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=heat">View </a>
            </li>
            <li class="nav-item <?php if($page=="heat" && $action == "add"){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=heat&action=add">Add </a>
            </li>
            <li class="nav-item <?php if($page=="features" && !$action){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=features">Features </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Begin page content -->
    <main role="main" class="container">
      <div class="row">
            <div class="col-sm-12">