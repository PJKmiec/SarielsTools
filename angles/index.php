<?php
  define("TOOL", "angles");
  define("TITLE", "LEGO Angles Chart");
  require_once('../common/php/header.php');
 ?>

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info"><span class="material-icons align-middle" style="font-size: 3rem">signal_cellular_null</span> LEGO Angles Chart</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <div class="form-check form-check-inline">
                      <h6 class="m-0">Show in the list:</h6>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showPlatesBox" checked>plates</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showSlopesBox" checked>slopes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showTechnicBox" checked>Technic pieces</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showMiscBox" checked>misc.</label>
                    </div>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 table-hover">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Angle</th>
                          <th scope="col" class="border-0">Part image</th>
                          <th scope="col" class="border-0">Part number(s)</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                          drawRow('plate', 5, 'angle5', array('14181', '2413'));
                          drawRow('plate', 6, 'angle6', array('3585', '3586'));
                          drawRow('slope', 9, 'angle9', array('4515'));
                          drawRow('plate', 10, 'angle10-2', array('78443', '78444'));
                          drawRow('plate', 10, 'angle10-1', array('47397', '47398'));
                          drawRow('plate', 14, 'angle14-1', array('41769', '41770'));
                          drawRow('plate', 14, 'angle14-2', array('93541', '54093'));
                          drawRow('slope', 15, 'angle15', array('3688'));
                          drawRow('plate', 16, 'angle16', array('3474'));
                          drawRow('slope', 17, 'angle17-1', array('61409'));
                          drawRow('slope', 17, 'angle17-2', array('4460', '4460a', '4460b'));
                          drawRow('slope', 17, 'angle17-3', array('2449'));
                          drawRow('plate', 19, 'angle19-1', array('43722', '43723'));
                          drawRow('slope', 19, 'angle19-2', array('60477'));
                          drawRow('connector', 22.5, 'angle23', array('32016'));
                          drawRow('slope', 25, 'angle25', array('60481'));
                          drawRow('slope', 26, 'angle26', array('49618'));
                          drawRow('plate', 27, 'angle27-1', array('93541', '54093'));
                          drawRow('plate', 27, 'angle27-2', array('65426', '65429'));
                          drawRow('plate', 27, 'angle27-3', array('24299', '24307'));
                          drawRow('plate', 27, 'angle27-4', array('3585', '3586'));
                          drawRow('slope', 27, 'angle27-5', array('3300'));
                          drawRow('slope', 27, 'angle27-6', array('4286', '4286b'));
                          drawRow('slope', 27, 'angle27-7', array('4287'));
                          drawRow('plate', 29, 'angle29', array('3474'));
                          drawRow('slope', 30, 'angle30', array('67440'));
                          drawRow('slope', 31, 'angle31', array('54200'));
                          drawRow('slope', 35, 'angle35', array('30249'));
                          drawRow('connector', 36.5, 'angle36-1', array('6629'));
                          drawRow('connector', 36.5, 'angle36-2', array('64451'));
                          drawRow('slope', 40, 'angle40', array('35464'));
                          drawRow('connector', 44.5, 'angle45-1', array('32192'));
                          drawRow('plate', 45, 'angle45-2', array('15706'));
                          drawRow('slope', 45, 'angle45-3', array('3040', '3040a'));
                          drawRow('slope', 45, 'angle45-9', array('3040', '3040a'));
                          drawRow('slope', 45, 'angle45-4', array('3665'));
                          drawRow('slope', 45, 'angle45-11', array('3665'));
                          drawRow('slope', 45, 'angle45-5', array('28192'));
                          drawRow('slope', 45, 'angle45-13', array('28192'));
                          drawRow('slope', 45, 'angle45-7', array('3044', '3044a', '3044b', '3044c'));
                          drawRow('slope', 45, 'angle45-14', array('92946'));
                          drawRow('slope', 45, 'angle45-15', array('92946'));
                          drawRow('plate', 45, 'angle45-6', array('30503'));
                          drawRow('connector', 45, 'angle45-16', array('85940'));
                          drawRow('connector', 45, 'angle45-17', array('85940'));
                          drawRow('misc', 45, 'angle45-18', array('65578'));
                          drawRow('misc', 45, 'angle45-19', array('65578'));
                          drawRow('connector', 53.5, 'angle53-1', array('6629'));
                          drawRow('connector', 53.5, 'angle53-2', array('64451'));
                          drawRow('slope', 55, 'angle55', array('30249'));
                          drawRow('slope', 59, 'angle59', array('54200'));
                          drawRow('slope', 60, 'angle60-1', array('35464'));
                          drawRow('slope', 60, 'angle60-2', array('67440'));
                          drawRow('plate', 63, 'angle63-1', array('93541', '54093'));
                          drawRow('plate', 63, 'angle63-2', array('65426', '65429'));
                          drawRow('plate', 63, 'angle63-3', array('65426', '65429'));
                          drawRow('slope', 63, 'angle63-4', array('3300'));
                          drawRow('slope', 63, 'angle63-5', array('4286', '4286b'));
                          drawRow('slope', 63, 'angle63-6', array('4287'));
                          drawRow('slope', 64, 'angle64', array('49618'));
                          drawRow('slope', 65, 'angle65', array('60481'));
                          drawRow('connector', 67.5, 'angle68', array('32015'));
                          drawRow('plate', 71, 'angle71-1', array('43722', '43723'));
                          drawRow('slope', 71, 'angle71-2', array('60477'));
                          drawRow('slope', 73, 'angle73-1', array('61409'));
                          drawRow('slope', 73, 'angle73-2', array('4460', '4460a', '4460b'));
                          drawRow('slope', 73, 'angle73-3', array('2449'));
                          drawRow('slope', 75, 'angle75', array('3688'));
                          drawRow('plate', 76, 'angle76-1', array('41769', '41770'));
                          drawRow('plate', 76, 'angle76-2', array('93541', '54093'));
                          drawRow('plate', 80, 'angle80-2', array('78443', '78444'));
                          drawRow('plate', 80, 'angle80-1', array('47397', '47398'));
                          drawRow('slope', 81, 'angle81', array('4515'));
                          drawRow('plate', 84, 'angle84', array('3585', '3586'));
                          drawRow('plate', 85, 'angle85', array('14181', '2413'));
                          drawRow('connector', 90, 'angle90', array('32014'));
                          drawRow('connector', 120, 'angle120', array('57585'));

                        ?>


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->

          </div>
        </main>

        <footer class="bg-light text-center text-lg-start shadow">
          <!-- Copyright -->
          <div class="text-center p-3">
            <img src="http://tools.sariel.pl/common/hamstur.gif" width="48" height="48">
            Powered by hamsters | Developed by <a href="http://sariel.pl">Sariel</a> |
            Uses <a href="https://designrevision.com/downloads/shards/">Bootstrap Shards</a> & <a href="https://fslightbox.com/">FSLightbox</a>
          </div>
          <!-- Copyright -->
        </footer>
        <?php
          require_once('../common/php/footerScripts.php');
         ?>
         <script src="../common/scripts/fslightbox.js"></script>
         <script src="script.js"></script>
    </div>

  </body>
</html>

<?php
  function drawRow($type, $angle, $image, $parts) {
    echo '<tr class="'.$type.'">
            <td class="align-middle"><h3>'.$angle.'°</h3></td>
            <td>
              <a data-fslightbox="gallery" href="images/'.$image.'.jpg" data-toggle="lightbox">
                <img src="images/'.$image.'.png" class="img-fluid" width="150" height="150">
              </a>
            </td>
            <td class="align-middle">';

    $i = 0;
    $size = count($parts);
    foreach ($parts as &$part) {
      echo '<a target="_blank" href="https://www.bricklink.com/v2/catalog/catalogitem.page?P='.$part.'#T=C">'.$part.'</a>';
      if ($i < $size - 1) {echo "<br/>";}
      $i++;
    }


      echo '</td>
          </tr>';
  }
?>
