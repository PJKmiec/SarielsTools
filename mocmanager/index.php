<?php
  define("TOOL", "mocmanager");
  define("TITLE", "LEGO MOC Manager");
  require_once('../common/php/header.php');
 ?>
 <link rel="stylesheet" href="css/style.css?ver=1">
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-9 text-center text-sm-left mb-0">
                <h3 class="page-title text-info">
                  <span class="material-icons align-middle" style="font-size: 3rem">list_alt</span> MOC Manager
                </h3>
              </div>
              <div class="col-3 text-right mb-0">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#settingsModal">
                  <span class="material-icons align-middle mr-2 pb-1">
                    settings
                  </span>
                  TABLE SETTINGS
                </button>

              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">

        <div class="card w-100 shadow my-3">
        <div class="card-body">

          <div class="table-responsive table-hover table-striped">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Completion</th>
                  <th scope="col">Name</th>
                  <th scope="col">Started</th>
                  <th scope="col">Power supply</th>
                  <th scope="col">Remote control</th>
                  <th scope="col">Lights</th>
                  <th scope="col">Stickers</th>
                  <th scope="col">Status</th>
                  <th scope="col">Parts</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody id="sortable"></tbody>
              <tfoot>
                <tr>
                  <th scope="col">Completion</th>
                  <th scope="col">Name</th>
                  <th scope="col">Started</th>
                  <th scope="col">Power supply</th>
                  <th scope="col">Remote control</th>
                  <th scope="col">Lights</th>
                  <th scope="col">Stickers</th>
                  <th scope="col">Status</th>
                  <th scope="col">Parts</th>
                  <th scope="col">Actions</th>
                </tr>
              </tfoot>
            </table>

          </div>
        </div>
        <div class="card-footer border-top">
          <div class="row">
            <div class="col-7 text-muted align-self-center">
              Drag the items up or down to sort the list. The list is saved in your web browser automatically on sorting, deleting and saving a MOC.
            </div>
            <div class="col-5 text-right">
              <button type="button" class="btn btn-success" id="addNewMoc">
                <span class="material-icons align-middle mr-2 pb-1">
                  add_circle
                </span>
                ADD NEW MOC
              </button>
              <button type="button" class="btn btn-primary" id="saveData">
                <span class="material-icons align-middle mr-2 pb-1">
                  file_upload
                </span>
                EXPORT SAVE
              </button>
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#loadModal">
                <span class="material-icons align-middle mr-2 pb-1">
                  file_download
                </span>
                LOAD SAVE
              </button>
            </div>
          </div>
      </div>

        </div>
  <!-- /.container -->

  <!-- modals -->
  <div class="modal fade" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
        <button type="button" class="btn btn-danger" id="deleteButton" data-id="">DELETE</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="loadModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Load save</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <label class="form-label" for="saveFile">Select the save file from your device. <B>Caution:</b> loading the saved file will overwrite current data.</label>
      <input type="file" class="form-control" id="saveFile" accept=".txt" />
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
      <button type="button" class="btn btn-primary" id="loadButton" data-id="">LOAD</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="settingsModal">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Table settings</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      Check these optional columns to include them in the table:

      <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" value="" id="columnStarted" checked>
        <label class="form-check-label" for="columnStarted">
          Started
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="columnPowerSupply" checked>
        <label class="form-check-label" for="columnPowerSupply">
          Power supply
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="columnRemoteControl" checked>
        <label class="form-check-label" for="columnRemoteControl">
          Remote control
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="columnLights" checked>
        <label class="form-check-label" for="columnLights">
          Lights
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="columnStickers" checked>
        <label class="form-check-label" for="columnStickers">
          Stickers
        </label>
      </div>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
      <button type="button" class="btn btn-primary" id="settingsButton">SAVE</button>
    </div>
  </div>
</div>
</div>
<!-- /.modals -->

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
<script src="custom.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</div>

</body>
</html>
