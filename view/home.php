<?php $page = $_GET['page']; if (isset($_GET['action'])) { $action= $_GET['action'];} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= isset($title) ? $title : "Stamp Collecting Home" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        #large-card-wrap{
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        #large-card{
            max-width: 28rem;
            min-width: 28rem;
        }
        #large-card-top{
            display: flex;
            flex-direction: row;
            font-size: 14px;
            color: #fff;
            background-color: #343a40;
            justify-content: space-between;
        }
        #large-card-center{
            display: flex;
            flex-direction: row;
            font-size: 10px;
            background-color: #eee;
            justify-content: start;
        }
        #large-card-center img{
            padding-right: 5px;
            max-height: 200px;
            max-width: 200px;
            border: 1px solid #343a40;
        }
        #large-card-bottom{
            display: flex;
            flex-direction: row;
            font-size: 10px;
            color: #fff;
            background-color: #343a40!important;
            justify-content: space-between;
        }
        #large-card-text{
            padding: 5px 5px 5px 20px;
            
            color: #000!important;
        }

        .border-success{
            border-color: #6c757d!important;
        }

        .hit-the-floor {
            color: #fff;
            font-size: 12em;
            font-weight: bold;
            font-family: Helvetica;
            text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
            }

        .hit-the-floor {
            text-align: center;
        }
        .subheader{
            font-family: 'Dancing Script', cursive;
            font-size: 2em;
            text-align: center;
        }
        .main-header-wrap{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
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
            <li class="nav-item <?php if($page=="heat" && $action !== "add" && $action !== "report"){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=heat">View </a>
            </li>
            <li class="nav-item <?php if($page=="heat" && $action == "add"){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=heat&action=add">Add </a>
            </li>
            <li class="nav-item <?php if($page=="heat" && $action == "report"){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=heat&action=report">Report </a>
            </li>
            <li class="nav-item <?php if($page=="about"){ ?>active<?php } ?>">
              <a class="nav-link" href="index.php?page=about">About </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <div class="row">
            <div id="large-card-wrap" class="col-sm-12">
                <?php if(!empty($records3 )){  ?>
                <div id="large-card" class="card border-success mb-3">
                    <div id="large-card-top" class="card-header border-success">
                        <div><?= $records3['name']; ?></div>
                        <div><?= $records3['quantity']; ?></div>
                    </div>
                    <div id="large-card-center" class="card-body text-success">
                        <div class="card-title"><img src="<?= $records3['image']; ?>"></div>
                        <div id="large-card-text" class="card-text"><?= $records3['description']; ?></div>
                    </div>
                    <div id="large-card-bottom" class="card-footer bg-transparent border-success">
                        <div>Width: <?= $records3['width']; ?></div>
                        <div>Height: <?= $records3['height']; ?></div>
                        <div>Grade: <?= $records3['grade']; ?></div>
                        <div>Album: <?php if($records3['album'] == 1){?>Yes<?php }else{?>No<?php } ?></div>
                    </div>
                </div>
                <?php }else{?><div class="main-header-wrap"><div class="hit-the-floor">Stamps</div>
                    <div>Simple and Effective<div class="subheader">A Collector's Tool</div></div></div><?php }?>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="container-fluid">
            <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                    <?php foreach ($records2 as $t) $i = 0; { 
                    if($i++ == 0) {?>


                    <div class="carousel-item col-md-3  active">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <div class="card" style="width: 22rem;">
                                    <div class="card-body">
                                        <div class="slidertop">
                                            <div class="sliderleft"><img class="card-img-top img-fluid mx-auto" src="<?=$t->image ?>" alt="stamp collecting"></div>
                                            <div class="sliderright">
                                            <a class="cardlink" href="index.php?page=home&action=submit&name=<?=$t->name ?>&description=<?=$t->description ?>&year=<?=$t->year ?>&width=<?=$t->width ?>&height=<?=$t->height ?>&quantity=<?=$t->quantity ?>&album=<?=$t->album ?>&image=<?=$t->image ?>&grade=<?=$t->grade ?>">
                                            <h5 class="card-title"><?=$t->name ?></h5></a>
                                            <div class="card-info"><span>YEAR: <?=$t->year ?></span><span>QTY: <?=$t->quantity ?></span></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                    <?php foreach ($records2 as $t) { ?>
                    
                        <div class="carousel-item col-md-3 ">
                            <div class="panel panel-default">
                                <div class="panel-thumbnail">
                                    <div class="card" style="width: 22rem;">
                                        <div class="card-body">
                                            <div class="slidertop">
                                                <div class="sliderleft"><img class="card-img-top img-fluid mx-auto" src="<?=$t->image ?>" alt="stamp collecting"></div>
                                                <div class="sliderright">
                                                <a class="cardlink" href="index.php?page=home&action=submit&name=<?=$t->name ?>&description=<?=$t->description ?>&year=<?=$t->year ?>&width=<?=$t->width ?>&height=<?=$t->height ?>&quantity=<?=$t->quantity ?>&album=<?=$t->album ?>&image=<?=$t->image ?>&grade=<?=$t->grade ?>">
                                                <h5 class="card-title"><?=$t->name ?></h5></a>
                                                <div class="card-info"><span>YEAR: <?=$t->year ?></span><span>QTY: <?=$t->quantity ?></span></div></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
                <!-- for adding left and right arrows to manually control carousel -->
                <!-- <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> -->
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script type="text/javascript">

        $('#carouselExample').on('slide.bs.carousel', function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $('.carousel-item').length;

        if (idx >= totalItems-(itemsPerSlide-1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i=0; i<it; i++) {
                // append slides to end
                if (e.direction=="left") {
                    $('.carousel-item').eq(i).appendTo('.carousel-inner');
                }
                else {
                    $('.carousel-item').eq(0).appendTo('.carousel-inner');
                }
            }
        }
        });

        $('#carouselExample').carousel({ 
            interval: 200;
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".cardlink").click(function(){
                var data_id = $(this).data('cardid');
                console.log(">>>>" + data_id);
                $.ajax({
                    type: 'POST',
                    url: 'models/ajax.php',
                    data: {id: data_id},
                    dataType: 'json',
                    success: function(data) {
                    console.log(">>>>>>>" + data);
                    //    $("#message").text(data);
                       if(data.success){
                            //    elem.hide();
                               $('#message').html(data.message);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
