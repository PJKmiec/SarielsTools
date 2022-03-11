<?php
  define("TOOL", "monorail");
  define("TITLE", "LEGO Monorail Network Planner");
  require_once('../common/php/header.php');
 ?>
 <link rel="stylesheet" href="style.css?ver=1">

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">directions_transit</span> Monorail Network Planner
                </h3>
              </div>
            </div>
            <!-- End Page Header -->

            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">

                  </div>
                  <div class="card-body p-0 pb-3">

										<div class="row">
				              <div class="col-3">
											</div>
											<div class="col pt-4">

										<div id="menu">
											<span>
												Toolbox:
											</span>
											<div>
												Straight tracks
												<div class="submenu">
													<img src="images/straight-short-h.png" alt="" title="str_s"><br />
													<img src="images/straight-long-h.png" alt="" title="str_l"><br />
													<img src="images/straight-short-v.png" alt="" title="str_s"><br />
													<img src="images/straight-long-v.png" alt="" title="str_l">
												</div>
											</div>
											<div>
												Ramps
												<div class="submenu">
													<img src="images/ramp-h-up.png" alt="" title="r_u"><br />
													<img src="images/ramp-h-down.png" alt="" title="r_d"><br />
													<img src="images/ramp-v-up.png" alt="" title="r_u"><br />
													<img src="images/ramp-v-down.png" alt="" title="r_d">
												</div>
											</div>
											<div>
												Long curves
												<div class="submenu">
													<img src="images/long-curve-right.png" alt="" title="cur_l"><br />
													<img src="images/long-curve-rightdown.png" alt="" title="cur_l"><br />
													<img src="images/long-curve-left.png" alt="" title="cur_l"><br />
													<img src="images/long-curve-leftdown.png" alt="" title="cur_l">
												</div>
											</div>
											<div>
												Short curves left
												<div class="submenu">
													<img src="images/short-curve-left-h1.png" alt="" title="cur_sl"><br />
													<img src="images/short-curve-left-h2.png" alt="" title="cur_sl"><br />
													<img src="images/short-curve-left-v1.png" alt="" title="cur_sl"><br />
													<img src="images/short-curve-left-v2.png" alt="" title="cur_sl"><br />
												</div>
											</div>
											<div>
												Short curves right
												<div class="submenu">
													<img src="images/short-curve-right-h1.png" alt="" title="cur_sr"><br />
													<img src="images/short-curve-right-h2.png" alt="" title="cur_sr"><br />
													<img src="images/short-curve-right-v1.png" alt="" title="cur_sr"><br />
													<img src="images/short-curve-right-v2.png" alt="" title="cur_sr"><br />
												</div>
											</div>
											<div>
												Track points left
												<div class="submenu">
													<img src="images/trackpoint-left-h1.png" alt="" title="tp_l"><br />
													<img src="images/trackpoint-left-h2.png" alt="" title="tp_l"><br />
													<img src="images/trackpoint-left-v1.png" alt="" title="tp_l"><br />
													<img src="images/trackpoint-left-v2.png" alt="" title="tp_l">
												</div>
											</div>
											<div>
												Track points right
												<div class="submenu">
													<img src="images/trackpoint-right-h2.png" alt="" title="tp_r"><br />
													<img src="images/trackpoint-right-h1.png" alt="" title="tp_r"><br />
													<img src="images/trackpoint-right-v2.png" alt="" title="tp_r"><br />
													<img src="images/trackpoint-right-v1.png" alt="" title="tp_r">
												</div>
											</div>
											<div>
												Monoswitches
												<div class="submenu">
													<img src="images/monoswitch-h1.png" alt="" title="mon_l"><br />
													<img src="images/monoswitch-h2.png" alt="" title="mon_l"><br />
													<img src="images/monoswitch-v1.png" alt="" title="mon_l"><br />
													<img src="images/monoswitch-v2.png" alt="" title="mon_l"><br />
													<img src="images/monoswitch-short-h1.png" alt="" title="mon_s"><br />
													<img src="images/monoswitch-short-h2.png" alt="" title="mon_s"><br />
													<img src="images/monoswitch-short-v1.png" alt="" title="mon_s"><br />
													<img src="images/monoswitch-short-v2.png" alt="" title="mon_s"><br />
												</div>
											</div>
										</div>


		<div class="smallbox">
			<div class="header">
				Settings:
			</div>
			<div class="content">
				<form id="wrappersize" action="">
				Grid size: W <input type="text" size="2" value="200" id="wrapper-w"> / H <input type="text" size="2" value="100" id="wrapper-h"> studs &nbsp;&nbsp;<input type="submit" value="Change &raquo;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
				</form><br />
				<strong>Sections counter:</strong><br /><br />
				<ul>
					<li>Short straight tracks: <input type="text" id="str_s" value="0"></li>
					<li>Long straight tracks: <input type="text" id="str_l" value="0"></li>
					<li>Lower ramps: <input type="text" id="r_d" value="0"></li>
					<li>Upper ramps: <input type="text" id="r_u" value="0"></li>
					<li>Long curves: <input type="text" id="cur_l" value="0"></li>
					<li>Short curves left: <input type="text" id="cur_sl" value="0"></li>
					<li>Short curves right: <input type="text" id="cur_sr" value="0"></li>
					<li>Track points left: <input type="text" id="tp_l" value="0"></li>
					<li>Track points right: <input type="text" id="tp_r" value="0"></li>
					<li>Short monoswitches: <input type="text" id="mon_s" value="0"></li>
					<li>Long monoswitches: <input type="text" id="mon_l" value="0"></li>
				</ul>
			</div>
		</div>

		<div class="smallbox" style="width: 665px;">
			<div class="header">
				Help:
			</div>
			<div class="content">
				This tool was created to help you to design layouts of Monorail networks. Follow these simple steps to use it:
				<ol class="mt-3 text-left">
					<li>Hover the toolbox bar to see the available tracks of various types</li>
					<li>Click the desired section - it will appear in the upper left corner of the grid area</li>
					<li>Now you can simply drag the section around the grid area - it will snap to the grid</li>
					<li>If you want to delete any section, drag it over the trash area below and release it</li>
					<li>You can adjust the size of the grid area using the Settings box on the left</li>
				</ol>
			</div>
			<div id="droppable" class="text-center">Trash area - drag & drop items here to delete them</div>
		</div>

		<div class="clear"></div>

		<div id="wrapper" class="mt-3"></div>

		<input type="hidden" id="incrementer" value="2">

		<div class="col"></div>
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
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
	<link type="text/css" href="css/smoothness/jquery-ui-1.8.8.custom.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>
	<script src="js/script.js"></script>
	</div>

	</body>
	</html>
