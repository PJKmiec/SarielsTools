<?php
  define("TOOL", "index");
  define("TITLE", "Sariel's Tools for AFOLs");
  require_once('common/php/header.php');
 ?>

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">construction</span> Sariel's Tools for AFOLs
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
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0 table-hover">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Tool</th>
                          <th scope="col" class="border-0">Description</th>
                          <th scope="col" class="border-0">Mobile app</th>
                          <th scope="col" class="border-0">Address</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://motors.sariel.pl"><span class="material-icons align-middle mr-2">speed</span> Motors Stats</a>
                          </td>
                          <td class="text-left align-middle">
                            Detailed statistics of LEGO motors in a sortable, filterable list + motors toplists in several categories.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://motors.sariel.pl">motors.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://gears.sariel.pl"><span class="material-icons align-middle mr-2">settings</span> Gear Ratio Calculator</a>
                          </td>
                          <td class="text-left align-middle">
                            Calculates final ratio of multiple pairs of gears, shows theoretical output for selected motor
                            and lists available gears combinations for a given spacing.
                          </td>
                          <td class="align-middle">
                            <a target="_blank" href='https://play.google.com/store/apps/details?id=pl.sariel.brickgearratiocalculator'><img alt='Get it on Google Play' src='https://lh3.googleusercontent.com/cjsqrWQKJQp9RFO7-hJ9AfpKzbUb_Y84vXfjlP0iRHBvladwAfXih984olktDhPnFqyZ0nu9A5jvFwOEQPXzv7hr3ce3QVsLN8kQ2Ao=s0'/></a>
                          </td>
                          <td class="align-middle">
                            <a href="https://gears.sariel.pl">gears.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://pulleys.sariel.pl"><span class="material-icons align-middle mr-2">hdr_weak</span> Pulley Ratio Calculator</a>
                          </td>
                          <td class="text-left align-middle">
                            Calculates final ratio of multiple pairs of pulleys.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://pulleys.sariel.pl">pulleys.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://scaler.sariel.pl"><span class="material-icons align-middle mr-2">aspect_ratio</span> Model Scaler</a>
                          </td>
                          <td class="text-left align-middle">
                            Allows to calculate dimensions of your model from a blueprint of the original object.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://scaler.sariel.pl">scaler.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                            <td class="text-left align-middle">
                                <a href="https://mb.sariel.pl"><span class="material-icons align-middle mr-2">developer_board</span> MOCBoard</a>
                            </td>
                            <td class="text-left align-middle">
                                Advanced Kanban board for your projects.
                            </td>
                            <td class="align-middle">
                                N/A
                            </td>
                            <td class="align-middle">
                                <a href="https://mb.sariel.pl">mb.sariel.pl</a>
                            </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://mocs.sariel.pl"><span class="material-icons align-middle mr-2">list_alt</span> MOC Manager</a>
                          </td>
                          <td class="text-left align-middle">
                            Allows creating and sorting a detailed list of your projects.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://mocs.sariel.pl">mocs.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://studs.sariel.pl"><span class="material-icons align-middle mr-2">flip</span> Unit Converter</a>
                          </td>
                          <td class="text-left align-middle">
                            Converts between multiple units, including studs, milimeters, inches, bricks, stacked plates and track links.
                          </td>
                          <td class="align-middle">
                            <a target="_blank" href='https://play.google.com/store/apps/details?id=pl.sariel.legounitconverter'><img alt='Get it on Google Play' src='https://lh3.googleusercontent.com/cjsqrWQKJQp9RFO7-hJ9AfpKzbUb_Y84vXfjlP0iRHBvladwAfXih984olktDhPnFqyZ0nu9A5jvFwOEQPXzv7hr3ce3QVsLN8kQ2Ao=s0'/></a>
                          </td>
                          <td class="align-middle">
                            <a href="https://studs.sariel.pl">studs.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://colors.sariel.pl"><span class="material-icons align-middle mr-2">invert_colors</span> Colors Checker</a>
                          </td>
                          <td class="text-left align-middle">
                            Check for shared common colors between up to 6 various LEGO pieces.
                          </td>
                          <td class="align-middle">
                            N/A                          </td>
                          <td class="align-middle">
                            <a href="https://colors.sariel.pl">colors.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://angles.sariel.pl"><span class="material-icons align-middle mr-2">signal_cellular_null</span> Angles Chart</a>
                          </td>
                          <td class="text-left align-middle">
                            Lists angles that can be achieved using single LEGO pieces, includes Bricklink links for the pieces.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://angles.sariel.pl">angles.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://wheels.sariel.pl"><span class="material-icons align-middle mr-2">album</span> Wheels Chart</a>
                          </td>
                          <td class="text-left align-middle">
                            Lists LEGO wheels with their dimensions, weights, subparts, available rim/tire combinations and Bricklink links.
                          </td>
                          <td class="align-middle">
                            <a target="_blank" href='https://play.google.com/store/apps/details?id=pl.sariel.legowheelstable'><img alt='Get it on Google Play' src='https://lh3.googleusercontent.com/cjsqrWQKJQp9RFO7-hJ9AfpKzbUb_Y84vXfjlP0iRHBvladwAfXih984olktDhPnFqyZ0nu9A5jvFwOEQPXzv7hr3ce3QVsLN8kQ2Ao=s0'/></a>
                          </td>
                          <td class="align-middle">
                            <a href="https://wheels.sariel.pl">wheels.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://monorail.sariel.pl"><span class="material-icons align-middle mr-2">directions_transit</span> Monorail Network Planner</a>
                          </td>
                          <td class="text-left align-middle">
                            Drag & drop tool for designing Monorail track layouts.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://monorail.sariel.pl">monorail.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://town.sariel.pl"><span class="material-icons align-middle mr-2">view_quilt</span> Town Parcel Planner</a>
                          </td>
                          <td class="text-left align-middle">
                            Drag & drop tool for designing town parcels layouts.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://town.sariel.pl">town.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://bs.sariel.pl"><span class="material-icons align-middle mr-2">crop_original</span> Bricksafe Thumbnail Helper</a>
                          </td>
                          <td class="text-left align-middle">
                            Generates easy-to-use BBCode to include in your post to create a thumbnail gallery from a selected Bricksafe page. You can choose from several thumbnail and image sizes.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://bs.sariel.pl">bs.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://thumbs.sariel.pl"><span class="material-icons align-middle mr-2">crop_original</span> Brickshelf Thumbnail Helper</a>
                          </td>
                          <td class="text-left align-middle">
                            Generates easy-to-use BBCode to include in your post to create a thumbnail gallery from a selected Brickshelf page.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://thumbs.sariel.pl">thumbs.sariel.pl</a>
                          </td>
                        </tr>

                        <tr>
                          <td class="text-left align-middle">
                            <a href="https://stats.sariel.pl"><span class="material-icons align-middle mr-2">trending_up</span> Brickshelf Stats</a>
                          </td>
                          <td class="text-left align-middle">
                            A statistics tool for your Brickshelf gallery.
                          </td>
                          <td class="align-middle">
                            N/A
                          </td>
                          <td class="align-middle">
                            <a href="https://stats.sariel.pl">stats.sariel.pl</a>
                          </td>
                        </tr>

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
          <div class="text-center p-2">
            <span class="material-icons align-middle mr-2" style="font-size: 1.4rem">pets</span>
            Powered by hamsters | Developed by <a href="https://sariel.pl">Sariel</a> |
            Uses <a href="https://designrevision.com/downloads/shards/">Bootstrap Shards</a>
          </div>
          <!-- Copyright -->
        </footer>
        <?php
          require_once('common/php/footerScripts.php');
         ?>
         <script src="common/scripts/fslightbox.js"></script>
    </div>

  </body>
</html>
