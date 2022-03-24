<?php
  define("TOOL", "scaler");
  define("TITLE", "LEGO Model Scaler");
  require_once('../common/php/header.php');
 ?>
 <link rel="stylesheet" href="style.css?ver=5">

          <div class="main-content-container container-fluid px-0">
            <!-- Page Header -->

            <div class="page-header row no-gutters p-4 align-items-center justify-content-between">
              <div class="text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">aspect_ratio</span> Model Scaler
                </h3>
              </div>
              <div class="d-flex">
                <button id="multicollapse" data-toggle="collapse" data-target=".collapse"
                class="btn btn-outline-primary text-uppercase mr-2">toggle all boxes</button>

                <button id="saveLoadButton" type="button" class="btn btn-success text-uppercase w-100" data-toggle="modal" data-target="#saveModal">save/load</button>

                <!-- Save / Load Modal -->
                <div class="modal fade" id="saveModal">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Save / load the results</h5>
                        <button type="button" class="close" data-dismiss="modal">
                          <span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        You can save up to three various blueprints with all measurements in your browser. Please note
                        that these will only be available in your current browser, and that loading a save overwrites
                        the current canvas content. Also, if you've uploaded image from your device, it will not be
                        included in the save.

                        <?php
                          for ($i = 1; $i <= 3; $i++) {
                            echo '<div id="save'.$i.'" class="border my-2 p-2 rounded d-flex w-100">
                              <div class="blueprintSaveImg rounded"></div>
                              <div class="blueprintSave text-center pt-2 pl-4"><span>EMPTY</span><br><br>
                                <button class="save btn btn-success text-uppercase m-1">Save here</button>
                                <button class="load btn btn-info text-uppercase m-1 d-none">Load</button>
                                <button class="delete btn btn-danger text-uppercase m-1 d-none">Delete</button>
                              </div>
                            </div>';
                          }
                        ?>

                      </div>
                      <div class="modal-footer">
                        <button type="button" id="closeModal" class="btn btn-warning text-uppercase" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

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
                      <a href="https://youtu.be/0rWyReGCmc0" target="_blank"
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
                        <input type="submit" id="blueprint-submit" value="Load" class="btn btn-success text-uppercase">
                      </div>
                    </div>

                    Or upload an image from your device:

                    <div class="input-group mb-3 mt-2">
                      <input accept="image/*" type="file" id="blueprint-local" class="form-control">
                      <div class="input-group-append">
                        <input type="submit" id="blueprint-upload" value="Upload" class="btn btn-success text-uppercase">
                      </div>
                    </div>

                    <input type="hidden" id="blueprintSize">

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

                        <div class="form-row my-2 border-bottom pb-3">
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

                      <div class="text-muted small my-2">
                        If you know the real counterpart of the dimension you entered above,
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

                    <div class="text-muted small mb-2">
                      When activated, click any two points on the image below. A line will connect them and the line's
                      length and angles will be displayed below. Click anywhere again and a new line will be added connecting
                      the end of the previous line with the new point you've just addeds. Length and angles values will be
                      updated to show that new line. You can chain up any number of lines this way. Deactivate to return to standard drawing.
                    </div>

                    <div class="d-none"><span class="bold">Point #1:</span> <span id="protractor1">unknown</span> <span id="protractor-reset1" class="d-none">[ <a href="">reset</a> ]</span><br />
                    <span class="bold">Point #2:</span> <span id="protractor2">unknown</span> <span id="protractor-reset2" class="d-none">[ <a href="">reset</a> ]</span><br /><br />
                    </div>
                    <span class="bold">Distance:</span> <span id="protractor-distance">unknown</span><br />
                    <span class="bold">Angle:</span> <span id="protractor-angle">unknown</span>
                    <div id="protractor-angle-img"></div>

                    <div class="form-row pt-3 mt-2 border-top">
                      <div class="col text-center">
                        Transparency level for inactive lines:
                        <div id="shards-custom-slider" class="mx-3">
                          <input type="hidden" class='custom-slider-input' id="protractorTransparency">
                        </div>
                        <br>Transparency level for inactive labels:
                        <div id="shards-custom-slider2" class="mx-3">
                          <input type="hidden" class='custom-slider-input' id="protractorLabelTransparency">
                        </div>
                      </div>
                    </div>
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

                    <div class="form-row pb-3 mb-2">
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
                            <option value="0">1</option>
                            <option value="1" selected>0.1</option>
                            <option value="2">0.01</option>
                            <option value="3">0.001</option>
                            <option value="4">0.0001</option>
                            <option value="5">0.00001</option>
                            <option value="6">0.000001</option>
                            <option value="7">0.0000001</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-row pb-3 mb-2 border-bottom">
                          <div class="col">
                            Line / digits color:<br/>
                            <select class="form-control" id="colors">
                              <option>red</option>
                              <option>white</option>
                              <option>black</option>
                              <option>yellow</option>
                              <option>orange</option>
                              <option>lime</option>
                              <option>green</option>
                              <option>cyan</option>
                              <option>blue</option>
                            </select>
                          </div>
                          <div class="col">
                            Labels color:<br/>
                            <select class="form-control" id="labelColors">
                              <option>black</option>
                              <option>white</option>
                              <option>red</option>
                              <option>yellow</option>
                              <option>orange</option>
                              <option>lime</option>
                              <option>green</option>
                              <option>cyan</option>
                              <option>blue</option>
                            </select>
                          </div>
                          <input type="hidden" id="color" value="red">
                          <input type="hidden" id="labelcolor" value="black">
                        </div>

                      <div class="pb-3 mb-2 border-bottom">Clearing the measurements:<br />
                        <div class="text-muted small">Only clears protractor lines while protractor is active</div>
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
  <script src="jquery.cookie.js"></script>
  <script src="script.js?v=11"></script>

  </div>

  </body>
  </html>
