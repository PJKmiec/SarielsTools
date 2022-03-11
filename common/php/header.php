<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="http://tools.sariel.pl/common/styles/materialicons.css" rel="stylesheet">
    <link rel="stylesheet" href="http://tools.sariel.pl/common/styles/bootstrap.min.css">
    <link rel="stylesheet" href="http://tools.sariel.pl/common/styles/shards-dashboards.1.1.0.min.css">
  </head>
  <body class="h-100">
    <div class="container-fluid p-0">

        <main class="main-content">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand text-primary" href="http://tools.sariel.pl">
                <span class="material-icons mr-2">construction</span>
                Sariel's Tools
              </a>
              <div class="border-left">
                <ul class="navbar-nav mr-auto">

                  <li class="nav-item <?php isActive('gears') ;?>">
                    <a class="nav-link <?php isBold('gears') ;?>" href="http://gears.sariel.pl">Gear Ratio Calculator</a>
                  </li>
                  <li class="nav-item <?php isActive('pulleys') ;?>">
                    <a class="nav-link <?php isBold('pulleys') ;?>" href="http://sariel.pl/tools/pratios">Pulley Ratio Calculator</a>
                  </li>
                  <li class="nav-item <?php isActive('scaler') ;?>">
                    <a class="nav-link <?php isBold('scaler') ;?>" href="http://scaler.sariel.pl">Model Scaler</a>
                  </li>
                  <li class="nav-item <?php isActive('studs') ;?>">
                    <a class="nav-link <?php isBold('studs') ;?>" href="http://studs.sariel.pl">Unit Converter</a>
                  </li>
                  <li class="nav-item <?php isActive('angles') ;?>">
                    <a class="nav-link <?php isBold('angles') ;?>" href="http://angles.sariel.pl">Angles Chart</a>
                  </li>
                  <li class="nav-item <?php isActive('wheels') ;?>">
                    <a class="nav-link <?php isBold('wheels') ;?>" href="http://wheels.sariel.pl">Wheels Chart</a>
                  </li>
                  <li class="nav-item <?php isActive('monorail') ;?>">
                    <a class="nav-link <?php isBold('monorail') ;?>" href="http://monorail.sariel.pl">Monorail Network Planner</a>
                  </li>
                  <li class="nav-item <?php isActive('makieter') ;?>">
                    <a class="nav-link <?php isBold('makieter') ;?>" href="http://town.sariel.pl">Town Plot Planner</a>
                  </li>
                  <li class="nav-item <?php isActive('bs') ;?>">
                    <a class="nav-link <?php isBold('bs') ;?>" href="http://bs.sariel.pl">Bricksafe Thumbnail Helper</a>
                  </li>
                  <li class="nav-item <?php isActive('thumbs') ;?>">
                    <a class="nav-link <?php isBold('thumbs') ;?>" href="http://thumbs.sariel.pl">Brickshelf Thumbnail Helper</a>
                  </li>

                </ul>
              </div>
            </nav>
          </div>
          <!-- / .main-navbar -->

<?php
  function isActive ($menuItem) {
    if (TOOL == $menuItem) {echo "active";}
  }

  function isBold ($menuItem) {
    if (TOOL == $menuItem) {echo "font-weight-bold";}
  }
 ?>
