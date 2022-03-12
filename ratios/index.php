<?php
  define("TOOL", "gears");
  define("TITLE", "LEGO Gear Ratio Calculator");
  require_once('../common/php/header.php');
 ?>
 <link rel="stylesheet" href="style.css?ver=1">

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info"><span class="material-icons align-middle" style="font-size: 3rem">settings</span> Gear Ratio Calculator</h3>
              </div>
            </div>
            <!-- End Page Header -->

            <!-- Android app info -->
            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span></button> Now available as free Android app:
              <a href='https://play.google.com/store/apps/details?id=pl.sariel.brickgearratiocalculator&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'
              target='_blank'><img alt='Get it on Google Play' src='http://tools.sariel.pl/common/en_badge_web_generic.png' width="168" height="50" class="ml-3" /></a>
            </div>

            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-body">

                    <!-- tabs start -->
                    <ul class="nav nav-pills nav-fill pb-3 mb-2 border-bottom" id="myTab">
                      <li class="nav-item">
                        <a class="nav-link text-uppercase active" id="standard-tab" data-toggle="tab" href="#standard">Standard gear calculator</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-uppercase" id="teeth-tab" data-toggle="tab" href="#teeth">Gears and numbers of teeth</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-uppercase" id="planetary-tab" data-toggle="tab" href="#planetary">Planetary gear calculator</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-uppercase" id="coupler-tab" data-toggle="tab" href="#coupler">Gear coupler</a>
                      </li>
                    </ul>
                    <!-- tabs end -->

                    <div class="tab-content">

                      <!-- Standard gear calculator tab start -->
                      <div class="tab-pane fade show active" id="standard">

                          <?php
                            $drivers = array(1, 8, 12, 14, 16, 20, 24, 28, 36, 40, 56, 60);
                            $followers = array(8, 12, 14, 16, 20, 24, 28, 36, 40, 56, 60, '60a', 140, 168);
                            for ($i = 1; $i <= 25; $i++) {
                              $hidden = $i == 1 ? '' : 'd-none';

                              echo '<div class="row p-3 ml-2 mr-2 border-bottom '.$hidden.'">
                            <div class="col-1 text-right mt-3">
                              Pair '.$i.':
                            </div>
                            <div class="col-2 p-0">

                              <button class="btn btn-success btn-lg dropdown-toggle w-100 text-uppercase" type="button" data-toggle="dropdown" data-display="static">
                              Driver gear
                              </button>
                              <div class="dropdown-menu w-100" x-placement="bottom-start">';

                              foreach ($drivers as &$driver) {
                                $teeth = $driver == 1 ? 'tooth' : 'teeth';
                                echo '<a class="dropdown-item" href="'.$driver.'"><img src="images/gear'.$driver.'.png" class="mr-2">'.$driver.' '.$teeth.'</a>';
                              }

                              echo '</div>

                            </div>
                            <div class="col-2 p-0 ml-2">

                              <button class="btn btn-warning btn-lg dropdown-toggle w-100 text-uppercase" type="button" data-toggle="dropdown" data-display="static">
                              Follower gear
                              </button>
                              <div class="dropdown-menu w-100" x-placement="bottom-start">';

                              foreach ($followers as &$follower) {
                                echo '<a class="dropdown-item" href="'.$follower.'"><img src="images/gear'.$follower.'.png" class="mr-2">'.filter_var($follower, FILTER_SANITIZE_NUMBER_INT).' teeth</a>';
                              }

                              echo '</div>
                            </div>

                            <div class="col align-middle"></div>
                            <div class="col-2 align-middle">';

                            if ($i > 1) {
                              echo '<button class="btn btn-outline-warning btn-lg w-100 text-uppercase" type="button">Delete pair</button>';
                            }

                            echo '</div>
                          </div>';

                          }

                           ?>

                           <div class="row p-3 mx-2 border-bottom">
                             <div class="col text-center">
                               <button id="add" class="btn btn-primary btn-lg text-uppercase">Add another pair of gears</button>
                               <input type="hidden" id="pair" value="1">
                             </div>
                           </div>

                           <div class="row pb-4 mx-2 border-bottom">
                             <div class="col"></div>
                             <div class="col-2">

                               <div class="custom-control custom-toggle d-block mt-4">
                                 <input type="checkbox" id="planetary-active" class="custom-control-input">
                                 <label class="custom-control-label" for="planetary-active">Using planetary wheel hubs</label>
                               </div>

                             </div>
                             <div class="col"></div>
                           </div>

                           <div class="row pt-3 pb-2 mx-2 border-bottom">
                             <div id="finalRatio" class="col text-center">
                               <h3>Final ratio: <span>1:1</span></h3>
                               <span>Speed and torque are unaffected.</span>
                             </div>
                           </div>

                           <div class="mt-2">
                                <div class="row p-3">
                                  <div class="col form-inline">
                                    <div class="mx-auto">
                                    Show output for
                                    <select id='motorPicker' class="form-control form-control-lg mx-2">
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

                                    How many: <input id="motorNumber" type="number" value="1" min="1" max="20" class="form-control form-control-lg mx-2">
                                    motor(s):
                                  </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col text-center">
                                    <h4 id='output'></h4>
                                  </div>
                                </div>

                            </div>

                      </div>
                      <!-- Standard gear calculator tab end -->

                      <!-- Gears and numbers of teeth start -->
                      <div class="tab-pane fade" id="teeth">

                        <table class="table mb-0 table-hover">
                          <thead class="bg-light">
                            <tr>
                              <th scope="col" class="border-0">Teeth</th>
                              <th scope="col" class="border-0" colspan="5">Gears</th>
                            </tr>
                          </thead>
                          <tbody>

                            <tr>
                              <td class="align-middle text-center"><h3>1</h3></td>
                              <td><img src="images/w1.png"></td>
                              <td><img src="images/w2.png"></td>
                              <td><img src="images/w3.png"></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>8</h3></td>
                              <td><img src="images/g8.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>12</h3></td>
                              <td><img src="images/g12b.png"></td>
                              <td><img src="images/g12.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>14</h3></td>
                              <td><img src="images/g14.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>16</h3></td>
                              <td><img src="images/g16.png"></td>
                              <td><img src="images/g16c.png"></td>
                              <td><img src="images/g16dc.png"></td>
                              <td><img src="images/d16.png"></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>20</h3></td>
                              <td><img src="images/g20b.png"></td>
                              <td><img src="images/g20bo.png"></td>
                              <td><img src="images/g20.png"></td>
                              <td><img src="images/g20dc.png"></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>24</h3></td>
                              <td><img src="images/g24.png"></td>
                              <td><img src="images/g24c.png"></td>
                              <td><img src="images/g24wc.png"></td>
                              <td><img src="images/d24.png"></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>28</h3></td>
                              <td><img src="images/g28.png"></td>
                              <td><img src="images/d28-1.png"></td>
                              <td><img src="images/d28-2.png"></td>
                              <td><img src="images/d28-3.png"></td>
                              <td><img src="images/t28.png"></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>36</h3></td>
                              <td><img src="images/g36.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>40</h3></td>
                              <td><img src="images/g40.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>56</h3></td>
                              <td><img src="images/t56n.png"></td>
                              <td><img src="images/t56o.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>60</h3></td>
                              <td><img src="images/t60.png"></td>
                              <td><img src="images/g60a.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>140</h3></td>
                              <td><img src="images/g140a.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                            <tr>
                              <td class="align-middle text-center"><h3>168</h3></td>
                              <td><img src="images/g168a.png"></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>

                          </tbody>
                        </table>

                      </div>
                      <!-- Gears and numbers of teeth end -->

                      <!-- Planetary gear calculator start -->
                      <div class="tab-pane fade" id="planetary">

                        <table class="table mb-0">
                          <tbody>

                            <tr>
                              <td class="align-middle border-top-0"><img src="images/planetary.png" class="rounded"></td>
                              <td class="align-middle border-top-0">
                                Planetary gearing consists of three elements: a sun gear, a ring gear and a number of planet gears mounted on a carrier.
                                One of these elements is always fixed, one is an input and one is an output. Select gear sizes below and hit CALCULATE
                                to see ratios for all three cases.

                                <form class="form-inline mt-4" id="planetary">
                                  <span class="red">Sun gear:</span>
                                  <select id="planetary1" class="form-control ml-2 mr-4" id="inlineFormCustomSelect">
                                    <option selected>Select</option>
                                    <option value="8">8 teeth</option>
                                    <option value="12">12 teeth</option>
                                    <option value="14">14 teeth</option>
                                    <option value="16">16 teeth</option>
                                    <option value="20">20 teeth</option>
                                    <option value="24">24 teeth</option>
                                    <option value="28">28 teeth</option>
                                    <option value="36">36 teeth</option>
                                    <option value="40">40 teeth</option>
                                    <option value="56">56 teeth</option>
                                    <option value="60">60 teeth</option>
                                  </select>

                                  <span class="blue">Ring gear:</span>
                                  <select id="planetary2" class="form-control ml-2 mr-3" id="inlineFormCustomSelect">
                                    <option selected>Select</option>
                                    <option value="24">24 teeth (inside of a 56t turntable)</option>
                                    <option value="48">48 teeth (Power Miners wheel)</option>
                                    <option value="60">60 teeth (small 4-piece ring gear)</option>
                                    <option value="140">140 teeth (large 4-piece ring gear)</option>
                                    <option value="168">168 teeth (Hailfire Droid wheel)</option>
                                  </select>

                                  <button type="submit" class="btn btn-primary text-uppercase">Calculate</button>
                                </form>

                                <table class="table mb-0 mt-4">
                                  <tbody>
                                    <thead class="bg-light">
                                      <tr>
                                        <th scope="col" class="border-0">Input</th>
                                        <th scope="col" class="border-0">Output</th>
                                        <th scope="col" class="border-0">Fixed</th>
                                        <th scope="col" class="border-0">Ratio</th>
                                      </tr>
                                    </thead>

                                    <tbody>

                                      <tr>
                                        <td>
                                          <span class="red">Sun</span>
                                        </td>
                                        <td>
                                          Carrier
                                        </td>
                                        <td>
                                          <span class="blue">Ring</span>
                                        </td>
                                        <td id="planetary-result-1">?</td>
                                      </tr>

                                      <tr>
                                        <td>
                                          Carrier
                                        </td>
                                        <td>
                                          <span class="blue">Ring</span>
                                        </td>
                                        <td>
                                          <span class="red">Sun</span>
                                        </td>
                                        <td id="planetary-result-2">?</td>
                                      </tr>

                                      <tr>
                                        <td>
                                          <span class="red">Sun</span>
                                        </td>
                                        <td>
                                          <span class="blue">Ring</span>
                                        </td>
                                        <td>
                                          Carrier
                                        </td>
                                        <td id="planetary-result-3">?</td>
                                      </tr>

                                  </tbody>
                                </table>

                              </td>
                            </tr>

                          </tbody>
                        </table>

                      </div>
                      <!-- Planetary gear calculator end -->

                      <!-- Gear coupler start -->
                      <div class="tab-pane fade" id="coupler">

                        <div class="row">
                          <div class="col"></div>
                          <div class="col-6">

                        The <span class="red">+</span> marks the position of your driver gear's axle. Click an empty pin hole
                        to select the position of your follower gear's axle and see the available gear combinations:
                        <div class="d-flex justify-content-center">
                        <div class="form-inline mt-3">
                          Units:
                          <label><input type="radio" name="units" id="liftarms" class="form-control ml-3 mr-1" checked />liftarms</label>
                          <label><input type="radio" name="units" id="bricks" class="form-control ml-3 mr-1" /> bricks</label>
                        </div>
                      </div>

                        <div class="d-flex justify-content-center">

                          <div id="c-liftarms">
                            <div class="liftarm input"></div>
                            <div class="liftarm" id="l-f"></div>
                            <div class="liftarm" id="l-k"></div>
                            <div class="liftarm" id="l-p"></div>
                            <div class="liftarm" id="l-u"></div>
                            <div class="liftarm" id="l-x"></div>

                            <div class="liftarm" id="l-a"></div>
                            <div class="liftarm" id="l-g"></div>
                            <div class="liftarm" id="l-l"></div>
                            <div class="liftarm" id="l-q"></div>
                            <div class="liftarm" id="l-w"></div>
                            <div class="liftarm inactive"></div>

                            <div class="liftarm" id="l-b"></div>
                            <div class="liftarm" id="l-h"></div>
                            <div class="liftarm" id="l-m"></div>
                            <div class="liftarm" id="l-r"></div>
                            <div class="liftarm" id="l-v"></div>
                            <div class="liftarm inactive"></div>

                            <div class="liftarm" id="l-c"></div>
                            <div class="liftarm" id="l-i"></div>
                            <div class="liftarm" id="l-n"></div>
                            <div class="liftarm" id="l-s"></div>
                            <div class="liftarm" id="l-y"></div>
                            <div class="liftarm inactive"></div>

                            <div class="liftarm" id="l-d"></div>
                            <div class="liftarm" id="l-j"></div>
                            <div class="liftarm" id="l-o"></div>
                            <div class="liftarm" id="l-t"></div>
                            <div class="liftarm inactive"></div>
                            <div class="liftarm inactive"></div>

                            <div class="liftarm" id="l-e"></div>
                            <div class="liftarm inactive"></div>
                            <div class="liftarm inactive"></div>
                            <div class="liftarm inactive"></div>
                            <div class="liftarm inactive"></div>
                            <div class="liftarm inactive"></div>
                          </div>
                          <div id="c-bricks">
                            <div class="brick top"></div>
                            <div class="brick top"></div>
                            <div class="brick top"></div>
                            <div class="brick top"></div>
                            <div class="brick top"></div>
                            <div class="brick top"></div>

                            <div class="brick input"></div>
                            <div class="brick" id="b-f"></div>
                            <div class="brick" id="b-k"></div>
                            <div class="brick" id="b-o"></div>
                            <div class="brick" id="b-t"></div>
                            <div class="brick" id="b-v"></div>

                            <div class="brick" id="b-a"></div>
                            <div class="brick" id="b-g"></div>
                            <div class="brick" id="b-l"></div>
                            <div class="brick" id="b-p"></div>
                            <div class="brick" id="b-u"></div>
                            <div class="brick inactive"></div>

                            <div class="brick" id="b-b"></div>
                            <div class="brick" id="b-h"></div>
                            <div class="brick" id="b-m"></div>
                            <div class="brick" id="b-r"></div>
                            <div class="brick" id="b-w"></div>
                            <div class="brick inactive"></div>

                            <div class="brick" id="b-c"></div>
                            <div class="brick" id="b-i"></div>
                            <div class="brick" id="b-n"></div>
                            <div class="brick" id="b-s"></div>
                            <div class="brick inactive"></div>
                            <div class="brick inactive"></div>

                            <div class="brick" id="b-d"></div>
                            <div class="brick inactive"></div>
                            <div class="brick inactive"></div>
                            <div class="brick inactive"></div>
                            <div class="brick inactive"></div>
                            <div class="brick inactive"></div>
                          </div>
                        </div>

                        <div id="c-output" class="my-3 text-center"></div>
                        <div id="c-combinations"></div>
                      </div>
                      <div class="col">
                      </div>
                    </div>

                      </div>
                      <!-- Gear coupler end -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </main>

  <footer class="bg-light text-center text-lg-start shadow">
  <!-- Copyright -->
  <div class="text-center p-3">
  <img src="http://tools.sariel.pl/common/hamstur.gif" width="48" height="48">
  Powered by hamsters | Developed by <a href="http://sariel.pl">Sariel</a> |
  Uses <a href="https://designrevision.com/downloads/shards/">Bootstrap Shards</a>
  </div>
  <!-- Copyright -->
  </footer>
  <?php
  require_once('../common/php/footerScripts.php');
  ?>
  <script src="script.js"></script>

  </body>
  </html>
