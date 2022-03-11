<?php
  define("TOOL", "stats");
  define("TITLE", "Brickshelf Stats");
  require_once('../common/php/header.php');
 ?>

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">trending_up</span> Brickshelf Stats
                </h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom text-center">
                    <span class="text-muted small">Please note that the speed of processing is strictly dependent on the Brickshelf's server response time.</span>
                  </div>
                  <div class="card-body p-0 pb-3 text-center pt-3">



	<div class="w-100 d-flex justify-content-center">

		<form name="stats" id="mainForm" action="" method="POST" class="form-inline">
			Brickshelf username (not case sensitive) or gallery number:
      <input type="text" id="m" name="m" maxlegth="32" class="form-control mx-3" onBlur="this.value=this.value.toLowerCase();">
			<input type="submit" class="btn btn-primary text-uppercase" name="sub" id="sub" value="SHOW STATS">
		</form>

	</div>
  <span class="text-muted small">For performance reasons the stats are limited to scanning up to 96 items per folder.</span>

	<div id="container" style="width: 780px; margin: 0 auto; margin-top: 40px;">

		<div id="headline" class="mb-2"></div>
		<div id="loader" style="float: left; width: 16px; height: 16px; padding-right: 4px;"></div><div id="headline1"></div>

    <?php
    for ($i = 1; $i <= 96; $i++) {
        echo '<div id="msg'.$i.'" class="msgbox"></div>';
    }
    ?>

		<div id="footer" style="margin-top: 10px;"></div>

	</div>



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
