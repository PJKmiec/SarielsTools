<?php
  define("TOOL", "scaler");
  define("TITLE", "LEGO Model Scaler");
  require_once('../common/php/header.php');
 ?>
 <link rel="stylesheet" href="style.css?ver=1">

          <div class="main-content-container container-fluid px-0">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4 px-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">aspect_ratio</span> Model Scaler
                </h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row px-4">

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <a data-toggle="collapse" href="#collapse1" class="d-flex justify-content-between">
                      <span><span class="material-icons align-bottom mr-1">help_outline</span>Help</span>
                      <span class="material-icons expander">expand_circle_down</span>
                    </a>
                  </div>
                  <div id="collapse1" class="collapse show card-body">
                    <strong>What you need:</strong><br/>
                    <ul type="disc">
                      <li>an image available online, showing the blueprint of the original vehicle (there's plenty of blueprints e.g. <a href="http://www.the-blueprints.com/blueprints/" target="_blank">here</a>)
                      <li>the URL address of that image (can be obtained by right-clicking the image you found online and choosing "Copy image link")
                      <li>known dimension - one dimension of your model that you know (e.g. wheel diameter or track's width)
                    </ul>
                    <div class="text-center border-top pt-2">Need help? Try watching this:<br><br>
                      <a href="https://youtu.be/0rWyReGCmc0"target="_blank"
                      class="btn btn-outline-primary btn-pill btn-lg text-uppercase">complete video tutorial</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <a data-toggle="collapse" href="#collapse2" class="d-flex justify-content-between text-success">
                      <span><span class="material-icons align-bottom mr-1">upload_file</span>Load image</span>
                      <span class="material-icons expander">expand_circle_down</span>
                    </a>
                  </div>
                  <div id="collapse2" class="collapse show card-body">
                    <div id="lastused"></div>
                    Paste & load URL address of the image file (<b>NOT of a website that includes this image, but of the image itself - it usually ends with .jpg or .png</b>):<br />

                    <div class="input-group mb-3 mt-2">
                      <input type="text" id="blueprint" class="form-control">
                      <div class="input-group-append">
                        <input type="submit" id="blueprint-submit" value=" Load &raquo; " class="btn btn-success text-uppercase">
                      </div>
                    </div>

                    <div id="imageControls" class="d-none">
                      <div class="text-center">Adjust the image size:</div>

                      <div class="d-flex justify-content-between m-2">
                        <a href="" id="fit" class="btn btn-success btn-circle" title="Fit to canvas width"><span class="material-icons">settings_overscan</span></a>
                        <a href="" id="increase" class="btn btn-success btn-circle" title="Increase by 10%"><span class="material-icons">zoom_in</span></a>
                        <a href="" id="decrease" class="btn btn-success btn-circle" title="Decrease by 10%"><span class="material-icons">zoom_out</span></a>
                        <a href="" id="refit" class="btn btn-success btn-circle" title="Restore original size"><span class="material-icons">aspect_ratio</span></a>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <a data-toggle="collapse" href="#collapse3" class="d-flex justify-content-between text-info">
                      <span><span class="material-icons align-bottom mr-1">photo_size_select_large</span>Get size reference</span>
                      <span class="material-icons expander">expand_circle_down</span>
                    </a>
                  </div>
                  <div id="collapse3" class="collapse show card-body">
                    <div>
                      Draw a dimension you know on the image below (e.g. wheel's diameter), then enter how many studs it corresponds to in your project:

                      <div class="form-row border-top mt-2 pt-3">
                          <div class="col">
                            <input id="ratio-size" type="number" class="form-control" min="0" max="999999" step="0.1">
                          </div>
                          <div class="col">
                            <select id="ratio-type" class="form-control">
                              <option value="h" selected>width</option>
                              <option value="v">height</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-row mt-2 mb-2 border-bottom pb-3">
                          <div class="col">
                            <button id="getratio" class="btn btn-info w-100 text-uppercase">click here to calculate</button>
                          </div>
                        </div>

                    </div>

                    <div class="note text-muted small">
                      <strong>Note:</strong> the width or height is always taken from the first measurement,
                      no matter how many you draw and even if you clear them all. It lets you change the dimension
                      above and get updated results without starting anew.
                    </div>

                    <input type="hidden" id="originaldimension" value="0">
                    <input type="hidden" id="ratio" value="1">
                    <div id="ratioresult" class="mt-2 border-top pt-2"></div>
                    <div id="scale" class="mt-2 border-top pt-2 d-none">
                      Calculate the scale:

                      <div class="text-muted small mt-2 mb-2">If you know the real counterpart of the dimension you entered above,
                        enter it here to calculate what scale your model is in:
                      </div>

                      <div class="form-row">
                          <div class="col-5">
                            <input type="number" min="1" max="999999" step="0.1" id="scale-size" class="form-control">
                          </div>
                          <div class="col-5">
                            <select id="scale-units" class="form-control">
                              <option value="8">millimeters</option>
                              <option value="0.008">meters</option>
                              <option value="0.3149">inches</option>
                              <option value="0.026">feet</option>
                            </select>
                          </div>
                          <div class="col-2">
                            <button type="submit" id="getscale" class="btn btn-info">GO</button>
                          </div>
                        </div>

                      <div id="scaleresult"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <a data-toggle="collapse" href="#collapse4" class="d-flex justify-content-between text-warning">
                      <span><span class="material-icons align-bottom mr-1">image_aspect_ratio</span>Protractor tool</span>
                      <span class="material-icons expander">expand_circle_down</span>
                    </a>
                  </div>
                  <div id="collapse4" class="collapse show card-body">
                    <div class="custom-control custom-toggle d-block mb-3">
                      <input type="checkbox" id="protractor-active" class="custom-control-input">
                      <label class="custom-control-label" for="protractor-active">Activate</label>
                    </div>

                    When activated, click any two points on the image below to find angle and distance between them. Deactivate to return to standard drawing.<br /><br />
                    <span class="bold">Point #1:</span> <span id="protractor1">unknown</span> <span id="protractor-reset1" class="d-none">[ <a href="">reset</a> ]</span><br />
                    <span class="bold">Point #2:</span> <span id="protractor2">unknown</span> <span id="protractor-reset2" class="d-none">[ <a href="">reset</a> ]</span><br /><br />
                    <span class="bold">Distance:</span> <span id="protractor-distance">unknown</span><br />
                    <span class="bold">Angle:</span> <span id="protractor-angle">unknown</span>
                    <div id="protractor-angle-img"></div>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <a data-toggle="collapse" href="#collapse5" class="d-flex justify-content-between text-secondary">
                      <span><span class="material-icons align-bottom mr-1">settings</span>Settings</span>
                      <span class="material-icons expander">expand_circle_down</span>
                    </a>

                  </div>
                  <div id="collapse5" class="collapse show card-body">

                    <form action="" method="GET">
                    <div class="form-row">
                      <div class="col">
                        Canvas width (%):<br/>

                        <?php
                        $canvasWidth = 98;
                        if (isset($_GET["canvasWidth"]) && is_numeric($_GET["canvasWidth"])) {
                          $canvasWidth = $_GET["canvasWidth"];
                        }

                        $canvasHeight = 3000;
                        if (isset($_GET["canvasHeight"]) && is_numeric($_GET["canvasHeight"])) {
                          $canvasHeight = $_GET["canvasHeight"];
                        }
                        ?>


                        <input type="number" min="20" max="300" step="0.1" class="form-control" name="canvasWidth" placeholder="<?php echo $canvasWidth; ?>">
                      </div>
                      <div class="col">
                        Canvas height (px):<br/>
                        <input type="number" min="50" max="6000" step="1" class="form-control" name="canvasHeight" placeholder="<?php echo $canvasHeight; ?>">
                      </div>
                    </div>

                    <div class="form-row mt-2 pb-3 mb-2 border-bottom">
                      <div class="col">
                        <button id="resizeCanvas" class="btn btn-secondary w-100 text-uppercase" type="submit">update canvas size (reloads page)</button>
                      </div>
                    </div>
                  </form>

                    <div class="form-row pb-3 mb-2 border-bottom">
                        <div class="col">
                          Units:<br/>
                          <select class="form-control" id="units">
                            <option value="1">studs</option>
                            <option value="0.8333">LEGO bricks</option>
                            <option value="8">millimeters</option>
                            <option value="0.3149">inches</option>
                          </select>
                        </div>
                        <div class="col">
                          Accuracy:<br/>
                          <select class="form-control" id="accuracy">
                            <option value="10">0.1</option>
                            <option value="100">0.01</option>
                            <option value="1000">0.001</option>
                            <option value="10000">0.0001</option>
                            <option value="100000">0.00001</option>
                            <option value="1000000">0.000001</option>
                            <option value="10000000">0.0000001</option>
                            <option value="1">1</option>
                          </select>
                        </div>
                      </div>

                      <div class="pb-3 mb-2 border-bottom">Label color:
                        <div id="colors" class="d-flex">
                          <a href="" id="c-red"></a>
                          <a href="" id="c-white"></a>
                          <a href="" id="c-yellow"></a>
                          <a href="" id="c-orange"></a>
                          <a href="" id="c-lime"></a>
                          <a href="" id="c-cyan"></a>
                          <a href="" id="c-green"></a>
                          <a href="" id="c-blue"></a>
                          <a href="" id="c-black"></a>
                          <input type="hidden" id="color" value="red">
                          <input type="hidden" id="labelcolor" value="black">
                        </div>
                      </div>

                      <div class="pb-3 mb-2 border-bottom">Clearing the measurements:<br />
                        <div class="form-row mt-2">
                            <div class="col">
                              <a href="" id="clear-last" class="btn btn-outline-danger text-uppercase w-100">clear last one</a>
                            </div>
                            <div class="col">
                              <a href="" id="clear-all" class="btn btn-danger text-uppercase w-100">clear all</a>
                            </div>
                          </div>
                      </div>

                      What next?
                      <div class="small">
                        The easiest way to save the resulting image is to use <a href="http://en.wikipedia.org/wiki/Print_screen" target="_blank">the Print Screen button</a>
                      and then to paste the image into some image manipulation program - or even easier, paste it directly into <a href="https://pasteboard.co/" target="_blank">Pasteboard</a>.
                    </div>

                  </div>
                </div>
              </div>

  </div>

		<div id="canvas" style=

    <?php
      echo '"';
      if (isset($_GET["canvasWidth"]) && is_numeric($_GET["canvasWidth"])) {
        echo ' width: '.$_GET["canvasWidth"].'%;';

        if ($_GET["canvasWidth"] < 100) {
          echo ' margin-left: calc((100% - '.$_GET["canvasWidth"].'%) / 2);';
        }
      }

      if (isset($_GET["canvasHeight"]) && is_numeric($_GET["canvasHeight"])) {
          echo ' height: '.$_GET["canvasHeight"].'px;';
      }
      echo '"';
     ?>

    ></div>
		<div id="paper" style=

    <?php
      echo '"';
      if (isset($_GET["canvasWidth"]) && is_numeric($_GET["canvasWidth"])) {
        echo ' width: '.$_GET["canvasWidth"].'%;';

        if ($_GET["canvasWidth"] < 100) {
          echo ' margin-left: calc((100% - '.$_GET["canvasWidth"].'%) / 2);';
        }
      }

      if (isset($_GET["canvasHeight"]) && is_numeric($_GET["canvasHeight"])) {
          echo ' height: '.$_GET["canvasHeight"].'px;';
      }
      echo '"';
     ?>

    >
    </div>
    <div id="labels"></div>

    </div>
  </main>

  <footer class="bg-light text-center text-lg-start shadow footer"

  <?php
  if (isset($_GET["canvasHeight"]) && is_numeric($_GET["canvasHeight"])) {
      echo ' style="top: '.($_GET["canvasHeight"] - 180).'px;"';
  }
  ?>

  >
  <!-- Copyright -->
  <div class="text-center p-2">
    <span class="material-icons align-middle mr-2" style="font-size: 1.4rem">pets</span>
    Powered by hamsters | Developed by <a href="http://sariel.pl">Sariel</a> |
    Uses <a href="https://designrevision.com/downloads/shards/">Bootstrap Shards</a> and <a href="http://raphaeljs.com/">RaphaelJS</a>
  </div>
  <!-- Copyright -->
  </footer>
  <?php
  require_once('../common/php/footerScripts.php');
  ?>
  <script src="raphael.packed.js"></script>
  <script src="script.js"></script>
  <script src="jquery.cookie.js"></script>

  </div>

  </body>
  </html>
