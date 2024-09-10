
<?php
define("TOOL", "motors");
define("TITLE", "LEGO Motors Stats");
require_once('../common/php/header.php');
?>

<div class="main-content-container container-fluid px-4">
  <!-- Page Header -->
  <div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <h3 class="page-title text-info"><span class="material-icons align-middle" style="font-size: 3rem">speed</span> LEGO Motors Stats</h3>
    </div>
  </div>
  <!-- End Page Header -->

  <!-- Default Light Table -->
  <div class="row px-4">

    <!-- left column start -->
    <div class="col-2">
      <div class="card card-small mb-4 sticky-top" style="top: 80px;">
        <div class="card-header border-bottom">
          <span>Filter & sort</span>
        </div>
        <div class="card-body">

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filterAll" checked>
            <label class="custom-control-label" for="filterAll">All motors</label>
          </div>

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filterPU">
            <label class="custom-control-label" for="filterPU">Powered Up Motors</label>
          </div>

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filterPF">
            <label class="custom-control-label" for="filterPF">Power Functions Motors</label>
          </div>

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filter9V">
            <label class="custom-control-label" for="filter9V">9V Motors</label>
          </div>

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filterMNS">
            <label class="custom-control-label" for="filterMNS">Mindstorms Motors</label>
          </div>

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filterSpike">
            <label class="custom-control-label" for="filterSpike">Spike Motors</label>
          </div>

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filterBoost">
            <label class="custom-control-label" for="filterBoost">Boost Motors</label>
          </div>

          <div class="custom-control custom-checkbox mb-1">
            <input type="checkbox" class="custom-control-input" id="filterTrains">
            <label class="custom-control-label" for="filterTrains">Trains Motors</label>
          </div>

        </div>
        <div class="card-footer border-top">
          <select id="sortSelect" class="form-control">
            <option value="torque_d">Strongest first</option>
            <option value="speed_d">Fastest first</option>
            <option value="mechanical_power_d">Highest mechanical power first</option>
            <option value="efficiency_d">Most efficient first</option>
            <option value="volume_d">Biggest first</option>
            <option value="weight_d">Heaviest first</option>
            <option value="noise_d">Loudest first</option>
            <option value="start_d">Newest first</option>
            <option value="sets_d">In most sets first</option>
            <option value="torque_a">Weakest first</option>
            <option value="speed_a">Slowest first</option>
            <option value="mechanical_power_a">Lowest mechanical power first</option>
            <option value="efficiency_a">Least efficient first</option>
            <option value="volume_a">Smallest first</option>
            <option value="weight_a">Lightest first</option>
            <option value="noise_a">Quietest first</option>
            <option value="start_a">Oldest first</option>
            <option value="sets_a">In least sets first</option>
          </select>
        </div>
      </div>

      <span class="text-muted small">
        Core performance data measured by Philo<br>and taken from <a href="https://www.philohome.com/motors/motorcomp.htm">his website</a><br><br>
        Additional speed data represented in charts measured by Sariel
      </span>

    </div>
    <!-- left column end -->

    <!-- right column start -->
    <div class="col-10">

      <div class="card card-small mb-4">
        <div class="card-header border-bottom">
          <span>Motors</span>
        </div>
        <div class="card-body">

          <table class="table table-hover">
                                <thead class="bg-light">
                                  <tr>
                                    <th scope="col" class="border-0">Motor</th>
                                    <th scope="col" class="border-0">Name</th>
                                    <th scope="col" class="border-0">System</th>
                                    <th scope="col" class="border-0">Torque</th>
                                    <th scope="col" class="border-0">Speed</th>
                                    <th scope="col" class="border-0">Mechanical power</th>
                                    <th scope="col" class="border-0">Efficiency</th>
                                    <th scope="col" class="border-0">In production</th>
                                    <th scope="col" class="border-0">Details</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>

        </div>
      </div>

    </div>
    <!-- right column end -->

  </div>
  <!-- End Default Light Table -->

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
<script src="chart.js/Chart.min.js"></script>
<script src="chart.js/deferred.js"></script>
<script src="script.js"></script>
</div>

</body>
</html>
