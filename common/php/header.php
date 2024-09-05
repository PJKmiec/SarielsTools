<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="https://tools.sariel.pl/common/styles/materialicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://tools.sariel.pl/common/styles/bootstrap.min.css">
    <link rel="stylesheet" href="https://tools.sariel.pl/common/styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="https://tools.sariel.pl/common/styles/navbarfix.css?v=1">
    <link rel="stylesheet" href="https://tools.sariel.pl/common/styles/darktheme.css"/>
  </head>
  <body class="h-100">
    <script src="https://tools.sariel.pl/common/scripts/darktheme.js"></script>
    <div class="container-fluid p-0">

        <main class="main-content">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand text-primary" href="https://tools.sariel.pl">
                <span class="material-icons mr-2">construction</span>
                Sariel's Tools
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="show navbar-collapse border-left" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                  <li class="nav-item <?php isActive('motors') ;?>">
                    <a class="nav-link <?php isBold('motors') ;?>" href="https://motors.sariel.pl">Motors Stats</a>
                  </li>
                  <li class="nav-item <?php isActive('gears') ;?>">
                    <a class="nav-link <?php isBold('gears') ;?>" href="https://gears.sariel.pl">Gear Ratio Calculator</a>
                  </li>
                  <li class="nav-item <?php isActive('pulleys') ;?>">
                    <a class="nav-link <?php isBold('pulleys') ;?>" href="https://sariel.pl/tools/pratios">Pulley Ratio Calculator</a>
                  </li>
                  <li class="nav-item <?php isActive('scaler') ;?>">
                    <a class="nav-link <?php isBold('scaler') ;?>" href="https://scaler.sariel.pl">Model Scaler</a>
                  </li>
                  <li class="nav-item <?php isActive('mocmanager') ;?>">
                    <a class="nav-link <?php isBold('mocmanager') ;?>" href="https://mocs.sariel.pl">MOC Manager</a>
                  </li>
                  <li class="nav-item <?php isActive('studs') ;?>">
                    <a class="nav-link <?php isBold('studs') ;?>" href="https://studs.sariel.pl">Unit Converter</a>
                  </li>
                  <li class="nav-item <?php isActive('colorchecker') ;?>">
                    <a class="nav-link <?php isBold('colorchecker') ;?>" href="https://colors.sariel.pl">Colors Checker</a>
                  </li>
                  <li class="nav-item <?php isActive('angles') ;?>">
                    <a class="nav-link <?php isBold('angles') ;?>" href="https://angles.sariel.pl">Angles Chart</a>
                  </li>
                  <li class="nav-item <?php isActive('wheels') ;?>">
                    <a class="nav-link <?php isBold('wheels') ;?>" href="https://wheels.sariel.pl">Wheels Chart</a>
                  </li>
                  <li class="nav-item <?php isActive('bs') ;?>">
                    <a class="nav-link <?php isBold('bs') ;?>" href="https://bs.sariel.pl">Bricksafe Thumbnail Helper</a>
                  </li>
                  <li class="nav-item <?php isActive('thumbs') ;?>">
                    <a class="nav-link <?php isBold('thumbs') ;?>" href="https://thumbs.sariel.pl">Brickshelf Thumbnail Helper</a>
                  </li>
                  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Misc. tools
        </a>
        <div class="dropdown-menu" style="min-width: 200px;">
          <a class="dropdown-item text-break" href="https://monorail.sariel.pl">Monorail Network Planner</a>
          <a class="dropdown-item" href="https://town.sariel.pl">Town Plot Planner</a>
          <a class="dropdown-item" href="https://stats.sariel.pl">Brickshelf Stats</a>
        </div>
      </li>

                </ul>

                <ul class="navbar-nav">
                  <li class="nav-item">
                    <div class="custom-control custom-toggle small"><script src="https://tools.sariel.pl/common/scripts/darkswitch.js"></script></div>
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
