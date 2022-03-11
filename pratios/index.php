<?php
  define("TOOL", "pulleys");
  define("TITLE", "LEGO Pulleys Ratio Calculator");
  require_once('../common/php/header.php');
 ?>

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">hdr_weak</span> Pulley Ratio Calculator
                </h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    Pulley pieces visualized -
                    Bush 1/2: <img src="images/pulley1.png" width="150" height="148">
                    Micromotor pulley: <img src="images/pulley2.png" width="150" height="148">
                    Wedge belt wheel: <img src="images/pulley3.png" width="150" height="148">
                    Pulley large: <img src="images/pulley4.png" width="150" height="148">
                  </div>
                  <div class="card-body p-0 pb-3 text-center">

                    <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo '<form name="r'.$i.'" id="r'.$i.'" action="" method="POST" class="border-bottom">
                                              <div class="row p-3">
                                                <div class="col-2 text-right mt-1">
                                                  '.$i.'. Driver pulley:
                                                </div>
                                                <div class="col-2">
                                                  <select id="g1" class="form-control">
                                              			<option value="0"> -- choose -- </option>
                                              			<option value="2">bush 1/2</option>
                                              			<option value="5">micromotor pulley</option>
                                              			<option value="7">wedge belt wheel</option>
                                              			<option value="11">pulley large</option>
                                              		</select>
                                                </div>
                                                <div class="col-2 text-right mt-1">
                                                  Follower pulley:
                                                </div>
                                                <div class="col-2">
                                                <select id="g2" class="form-control">
                                              			<option value="0"> -- choose -- </option>
                                              			<option value="2">bush 1/2</option>
                                              			<option value="5">micromotor pulley</option>
                                              			<option value="7">wedge belt wheel</option>
                                              			<option value="11">pulley large</option>
                                              		</select>
                                                </div>
                                                <div class="col">
                                                  <span id="result'.$i.'"></span>
                                              		<input type="hidden" name="speed" value="1">
                                                </div>
                                              </div>
                                              <div id="expl'.$i.'" class="pb-2 d-none"></div>
                                            </form>';
                    }

                    ?>


		<!-- rest -->
		<div id="outcome" class="m-2"></div>

    <div class="mt-3 border-bottom">
		    <button id="submitter" class="btn btn-primary text-uppercase mr-2 mb-3">Calculate total ratio</button>
		    <button onClick="location.reload(true)" class="btn btn-danger text-uppercase mb-3">Reset</button>
    </div>

		<div id="motors" class="mt-2 d-none">
      <form name='motors' action='' method='post'>
        <input type='hidden' name='finalspeed' value=''>

        <div class="row p-3">
          <div class="col text-right mt-1">
            Show output for
          </div>
          <div class="col">
            <select name='motor' id='motorPicker' class="form-control">
            <option value='0'>-- choose a motor --</option>
            <optgroup label="Power Functions">
              <option value='275/3.63'>PF M</option>
              <option value='272/6.48'>PF L</option>
              <option value='146/14.5'>PF XL</option>
              <option value='420/1.32'>PF E</option>
            </optgroup>
            <optgroup label="Control+">
              <option value='198/8.81'>C+ L</option>
              <option value='198/8.81'>C+ XL</option>
              <option value='156/8.47'>C+ Servo</option>
            </optgroup>
            <optgroup label="Powered Up / Spike">
              <option value='270/4.08'>PU M</option>
              <option value='138/4.48'>Spike M</option>
              <option value='156/8.47'>Spike L</option>
            </optgroup>
            <optgroup label="9V">
              <option value='16/1.28'>Micromotor</option>
              <option value='1069/4.16'>RC buggy (innermost output)</option>
              <option value='780/5.7'>RC buggy (outermost output)</option>
              <option value='2000/0.45'>2838 motor</option>
              <option value='250/2.25'>714278 motor</option>
              <option value='219/2.25'>43362 motor</option>
              <option value='315/2.25'>47154 motor</option>
            </optgroup>
            <optgroup label="Mindstorms">
              <option value='165/6.64'>EV3 M</option>
              <option value='105/17.3'>EV3 L</option>
              <option value='117/16.7'>NXT L</option>
            </optgroup>
            <optgroup label="Trains">
              <option value='1250/0.9'>Train 9V</option>
              <option value='990/0.85'>Train RC</option>
              <option value='1458/0.85'>Train PF</option>
              <option value='1242/0.88'>Train PU</option>
            </optgroup>
            </select>
          </div>
          <div class="col text-left mt-1">
            motor:
          </div>
        </div>

        <span id='output'>0 RPM</span>
      </form>
    </div>

  </div>
  </main>

  <footer class="bg-light text-center text-lg-start shadow">
  <!-- Copyright -->
  <div class="text-center p-2">
    <span class="material-icons align-middle mr-2" style="font-size: 1.4rem">pets</span>
    Powered by hamsters | Developed by <a href="http://sariel.pl">Sariel</a> |
    Uses <a href="https://designrevision.com/downloads/shards/">Bootstrap Shards</a>
  </div>
  <!-- Copyright -->
  </footer>
  <?php
  require_once('../common/php/footerScripts.php');
  ?>
  <script src="script.js"></script>
  </div>

  </body>
  </html>
