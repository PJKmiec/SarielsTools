<?php
  define("TOOL", "studs");
  define("TITLE", "LEGO Unit Converter");
  require_once('../common/php/header.php');
 ?>

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info"><span class="material-icons align-middle" style="font-size: 3rem">flip</span> Unit Converter</h3>
              </div>
            </div>
            <!-- End Page Header -->

            <!-- Android app info -->
            <div class="alert alert-info alert-dismissible fade show  text-center" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span></button> Now available as free Android app:
              <a href='https://play.google.com/store/apps/details?id=pl.sariel.legounitconverter&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'
              target='_blank'><img alt='Get it on Google Play' src='http://tools.sariel.pl/common/en_badge_web_generic.png' width="168" height="50" class="ml-3" /></a>
            </div>

            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-body">

                    <!-- headers -->
                    <div class="row pb-3 border-bottom">
                      <div class="col text-right text-info h4">
                        Type in any field:
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <span class="text-info h4">Scaled result:</span>
                        <div class="form-inline small">Select your scale: 1: <input type="number" step="0.1" min="1" class="form-control ml-2" id="scale" value="1" size="3"></div>
                      </div>
                    </div>

                    <!-- studs -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Studs: <input type="number" step="0.1" class="form-control ml-2" id="s"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="ss">studs</div>
                      </div>
                    </div>

                    <!-- milimeters -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Milimeters: <input type="number" step="0.1" class="form-control ml-2" id="n"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sn"> milimeters</div>
                      </div>
                    </div>

                    <!-- centimeters -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Centimeters: <input type="number" step="0.1" class="form-control ml-2" id="c"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sc"> centimeters</div>
                      </div>
                    </div>

                    <!-- meters -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Meters: <input type="number" step="0.1" class="form-control ml-2" id="m"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sm"> meters</div>
                      </div>
                    </div>

                    <!-- inches -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Inches: <input type="number" step="0.1" class="form-control ml-2" id="i"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="si"> inches</div>
                      </div>
                    </div>

                    <!-- feet -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Feet: <input type="number" step="0.1" class="form-control ml-2" id="f"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sf"> feet</div>
                      </div>
                    </div>

                    <!-- LDraw units -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">LDraw units: <input type="number" step="0.1" class="form-control ml-2" id="l"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sl"> LDraw units</div>
                      </div>
                    </div>

                    <!-- stacked bricks -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Stacked bricks: <input type="number" step="0.1" class="form-control ml-2" id="sb"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="ssb"> stacked bricks</div>
                      </div>
                    </div>

                    <!-- stacked plates -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Stacked plates: <input type="number" step="0.1" class="form-control ml-2" id="sp"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="ssp"> stacked plates</div>
                      </div>
                    </div>

                    <!-- stacked minifigs -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Stacked minifigs: <input type="number" step="0.1" class="form-control ml-2" id="mi"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="smi"> stacked minifigs</div>
                      </div>
                    </div>

                    <!-- small track links -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Small track links: <input type="number" step="0.1" class="form-control ml-2" id="stl"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sstl"> small track links</div>
                      </div>
                    </div>

                    <!-- large track links -->
                    <div class="row mt-3 pb-3 border-bottom">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">Large track links: <input type="number" step="0.1" class="form-control ml-2" id="ltl"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sltl"> large track links</div>
                      </div>
                    </div>

                    <!-- 32 x 32 baseplates -->
                    <div class="row mt-3 pb-3">
                      <div class="col text-right d-flex flex-row-reverse">
                        <div class="form-inline">32 x 32 baseplates: <input type="number" step="0.1" class="form-control ml-2" id="bpl32"></div>
                      </div>
                      <div class="col-1"></div>
                      <div class="col">
                        <div class="form-inline"><input type="number" step="0.1" class="form-control mr-2" id="sbpl32"> 32 x 32 baseplates</div>
                      </div>
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

  <script src="script.js?v=1"></script>

</body>
</html>
