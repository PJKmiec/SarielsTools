<?php
  define("TOOL", "bs");
  define("TITLE", "Bricksafe Thumbnail Helper");
  require_once('../common/php/header.php');
 ?>

 <div class="main-content-container container-fluid px-4">
   <!-- Page Header -->
   <div class="page-header row no-gutters py-4">
     <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
       <h3 class="page-title text-info"><span class="material-icons align-middle" style="font-size: 3rem">crop_original</span> Bricksafe Thumbnail Helper</h3>
     </div>
   </div>
   <!-- End Page Header -->
   <!-- Default Light Table -->
   <div class="row">
     <div class="col">
       <div class="card card-small mb-4">
         <div class="card-header border-bottom text-center">
            <h6 class="m-0">Your gallery's URL address:</h6>
         </div>
         <div class="card-body p-3 text-center">


           <form id="g_num_form" name="g_num_form" action="generator.php" method="post" class="form-inline justify-content-center">
              <input type="text" id="g_num" name="gallery" class="form-control mr-4 w-50" placeholder="Paste your gallery's complete URL address, e.g. http://bricksafe.com/pages/sariel/tatra-dakar-truck">

              Thumbnail size:
              <select name="thumbnailsize" class="form-control ml-3 mr-4">
                <option value="128" selected>128 x 72px</option>
                <option value="320">320 x 180px</option>
                <option value="640">640 x 360px</option>
              </select>
              Zoomed image size:
              <select name="imagesize" class="form-control mx-3">
                <option value="full" selected>original full size</option>
                <option value="1920">1920 x 1080px</option>
                <option value="1280">1280 x 720px</option>
                <option value="800">800 x 450px</option>
              </select>
              <button type="submit" class="btn btn-primary text-uppercase mr-2">Process &raquo;</button>
              <button type="reset" class="btn btn-danger text-uppercase">Clear</button>
           </form>

                </div>
              </div>
            </div>
          </div>

          <div class="row d-none" id="output">
            <div class="col">
              <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                  <div class="text-center">
                    <h6 class="m-0">Results</h6>
                  </div>
                </div>
                <div class="card-body p-3 text-center">
                  Loading...
                 </div>
               </div>
             </div>
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
