<?php
  define("TOOL", "town");
  define("TITLE", "LEGO Town Plot Planner");
  require_once('../common/php/header.php');
 ?>
 <link rel="stylesheet" href="style.css?ver=1">

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">view_quilt</span> Town Plot Planner
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


	<div id="main">

		<div class="smallbox">
			<div class="header">
				Settings:
			</div>
			<div class="content">
				<form id="wrappersize" action="">
				Grid size: <input type="text" size="2" value="25" id="wrapper-w"> x <input type="text" size="2" value="25" id="wrapper-h"> <input type="submit" value="Change &raquo;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
				</form>
				<br />

				<div id="railroad">Add railroad:
					<img src="images/railroad1.png" alt="">
					<img src="images/railroad2.png" alt="">
					<img src="images/railroad3.png" alt="">
					<img src="images/railroad4.png" alt="">
					<img src="images/railroad5.png" alt="">
					<img src="images/railroad6.png" alt=""><br /><br />
					Add road:
					<img src="images/road1.png" alt="">
					<img src="images/road2.png" alt="">
					<img src="images/road3.png" alt="">
					<img src="images/road4.png" alt="">
					<img src="images/road5.png" alt="">
					<img src="images/road6.png" alt="">
				</div><br />
				<button id="addnew">&raquo; Add new plot</button>

			<div id="droppable">Trash area - drag items here to delete them</div>
			</div>
		</div>

		<div class="smallbox" style="width: 665px;">
			<div class="header">
				How to use:
			</div>
			<div class="content">
				Below you see a gray grid with a white rectangle on it. The grid represents a town and the rectangle represents a plot of land in that town.
				The goal of this tool is to plan your town filling it with plots, roads and railroads. Each plot can be moved, resized, named and colored.<br/><br/>

				Simply drag & release any object to move it. To resize a plot, drag its bottom right corner or its right edge or its bottom edge.
				You can resize roads and railroads in the same way.
				Move your cursor over a plot to see two icons:<br/><br/>

				<span class="icons">
					<div class="ui-state-default ui-corner-all" title="Change color" alt="Change color"><span class="ui-icon ui-icon-pencil"></span></div>&nbsp;- change the plot's color<br /><br />
					<div class="ui-state-default ui-corner-all" title="Edit description" alt="Edit description"><span class="ui-icon ui-icon-document"></span></div>&nbsp;- edit the plot's description<br /><br />
				</span>

				<br/><br/>

			</div>
		</div>


		<div class="clear"></div>
		<br />

		<div id="wrapper">

		<div class="resizable ui-widget-content" id="d1">
			<div class="toolbar">
					<div class="ui-state-default ui-corner-all" title="Change color" alt="Change color"><span class="ui-icon ui-icon-pencil"></span>
						<span class="colorpicker">
							<span class="cyan"></span>
							<span class="yellow"></span>
							<span class="green"></span>
							<span class="blue"></span>
							<span class="red"></span>
							<span class="pink"></span>
							<span class="brown"></span>
							<span class="violet"></span>
							<span class="orange"></span>
							<span class="white"></span>
						</span>
					</div>
					<div class="ui-state-default ui-corner-all" title="Edytuj opis" title="Edytuj opis"><span class="ui-icon ui-icon-document"></span></div>
			</div>
			<div class="text">Plot description</div>
			<div class="edit"><input type="text" value="Plot description">
				<div class="ui-state-default ui-corner-all" title="Save"><span class="ui-icon ui-icon-arrowthick-1-e"></span></div>
			</div>


		</div>
	</div>
</div>

		<input type="hidden" id="incrementer" value="2">



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
