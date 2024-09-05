<?php
  define("TOOL", "colorchecker");
  define("TITLE", "LEGO Colors Checker");
  require_once('../common/php/header.php');
 ?>

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info"><span class="material-icons align-middle" style="font-size: 3rem">invert_colors</span> LEGO Colors Checker</h3>
              </div>
            </div>
            <!-- End Page Header -->

            <div class="alert alert-info alert-dismissible fade show mb-3 mx-4" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <i class="fa fa-check mx-2"></i>
                        Enter Rebrickable IDs of up to 6 LEGO pieces to see if they have any common colors between them.
            </div>

            <!-- Default Light Table -->
            <form action="checkColors" method="post" id="colorCheckerForm">
            <div class="row px-4">

              <?php
                for ($i = 1; $i <= 6; $i++) {
                  echo '<div class="col">
                    <div class="card card-small mb-4">
                      <div class="card-header border-bottom">
                          <span>Item #'.$i.'</span>
                      </div>
                      <div class="card-body">

                        <input type="text" id="itemId'.$i.'" class="form-control itemId" placeholder="Item Rebrickable ID">

                        <div id="img'.$i.'" class="resultImg"></div>

                        <div id="card'.$i.'" class="text-center mt-3 resultCard"></div>
                      </div>
                    </div>
                  </div>';
                }
               ?>

              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                      <span>Check colors</span>
                  </div>
                  <div class="card-body">

                    <button id="getColors" class="btn btn-info w-100 text-uppercase">go</button>
                    <div id="result" class="mt-3"></div>

                  </div>
                </div>
              </div>

            </div>
          </form>
            <!-- End Default Light Table -->

          </div>
        </main>

        <footer class="bg-light text-center text-lg-start shadow">
          <!-- Copyright -->
          <div class="text-center p-3">
            <img src="http://tools.sariel.pl/common/hamstur.gif" width="48" height="48">
            Powered by hamsters | Developed by <a href="http://sariel.pl">Sariel</a> |
            Uses <a href="https://rebrickable.com/api/">Rebrickable API</a> & <a href="https://designrevision.com/downloads/shards/">Bootstrap Shards</a>
          </div>
          <!-- Copyright -->
        </footer>
        <?php
          require_once('../common/php/footerScripts.php');
         ?>
         <script src="https://tools.sariel.pl/common/scripts/fslightbox.js"></script>
         <script src="script.js"></script>
    </div>

  </body>
</html>
