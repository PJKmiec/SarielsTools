$(document).ready(function() {
  $("#sortable").sortable();
  $("#sortable").disableSelection();
  $("#sortable").find("input").enableSelection();
  $('[data-toggle="tooltip"]').tooltip();

  $("#sortable").sortable({
    stop: function() {saveTable();}
  });

  var storedTable = localStorage.getItem("mocmanager");

  if (storedTable != null && storedTable != "") {
    $('tbody').html(storedTable);
    $('[data-toggle="tooltip"]').tooltip();
  }

  var columnSettings = localStorage.getItem("mocmanagersettings");
  if (columnSettings != null && columnSettings != "") {
    updateColumnSettings();
  }

  function download(filename, text) {
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
    element.setAttribute('download', filename);
    element.style.display = 'none';
    document.body.appendChild(element);
    element.click();
    document.body.removeChild(element);
}

  $('#saveData').click(function(e) {
    download("mocmanager.txt", localStorage.getItem("mocmanager"));
  });

  $('#settingsButton').click(function(e) {
    let columns = {
      columnStarted: $('#columnStarted').is(":checked"),
      columnPowerSupply: $('#columnPowerSupply').is(":checked"),
      columnRemoteControl: $('#columnRemoteControl').is(":checked"),
      columnLights: $('#columnLights').is(":checked"),
      columnStickers: $('#columnStickers').is(":checked")
    };
    localStorage.setItem("mocmanagersettings", JSON.stringify(columns));
    columnSettings = JSON.stringify(columns);
    updateColumnSettings();
    $('#settingsModal').modal('toggle');
  });

  function updateColumnSettings() {
    if (JSON.parse(columnSettings)) {
      columnSettings = JSON.parse(columnSettings);

      $(".table tr").each(function() {
        $(".table thead tr").find('th:eq(2)').toggle(columnSettings.columnStarted);
        $(".table tfoot tr").find('th:eq(2)').toggle(columnSettings.columnStarted);
        $(this).find('td:eq(1)').toggle(columnSettings.columnStarted);
        $(".table thead tr").find('th:eq(3)').toggle(columnSettings.columnPowerSupply);
        $(".table tfoot tr").find('th:eq(3)').toggle(columnSettings.columnPowerSupply);
        $(this).find('td:eq(2)').toggle(columnSettings.columnPowerSupply);
        $(".table thead tr").find('th:eq(4)').toggle(columnSettings.columnRemoteControl);
        $(".table tfoot tr").find('th:eq(4)').toggle(columnSettings.columnRemoteControl);
        $(this).find('td:eq(3)').toggle(columnSettings.columnRemoteControl);
        $(".table thead tr").find('th:eq(5)').toggle(columnSettings.columnLights);
        $(".table tfoot tr").find('th:eq(5)').toggle(columnSettings.columnLights);
        $(this).find('td:eq(4)').toggle(columnSettings.columnLights);
        $(".table thead tr").find('th:eq(6)').toggle(columnSettings.columnStickers);
        $(".table tfoot tr").find('th:eq(6)').toggle(columnSettings.columnStickers);
        $(this).find('td:eq(5)').toggle(columnSettings.columnStickers);
      });
    }
  }

  $("#settingsModal").on('show.bs.modal', function(){
    if (columnSettings!= null) {
      $("#columnStarted").prop("checked", columnSettings.columnStarted);
      $("#columnPowerSupply").prop("checked", columnSettings.columnPowerSupply);
      $("#columnRemoteControl").prop("checked", columnSettings.columnRemoteControl);
      $("#columnLights").prop("checked", columnSettings.columnLights);
      $("#columnStickers").prop("checked", columnSettings.columnStickers);
    }
});

  $('#loadButton').click(function(e) {
    var file = $("#saveFile").get(0).files[0];
    if (file) {
      var reader = new FileReader();

      reader.onload = function(){
        $('tbody').html(reader.result);
        updateColumnSettings();
        $('[data-toggle="tooltip"]').tooltip();
        saveTable();
      }

      reader.readAsText(file, 'UTF-8');
    }

    $('#loadModal').modal('toggle');
  });

  const selects = `<td class="align-middle">
              <select class="form-control" name="powerSupply">
                <option>To be decided</option>
                <optgroup label="Motorized">
                  <option>Power Functions</option>
                  <option>Control+</option>
                  <option>Powered Up</option>
                  <option>9V</option>
                </optgroup>
                <optgroup label="Non-motorized">
                  <option>Pneumatics</option>
                  <option>Wind-up</option>
                  <option>Pull-back</option>
                  <option>Manual</option>
                </optgroup>
                <optgroup label="Programmable">
                  <option>Mindstorms</option>
                  <option>Spike</option>
                  <option>Control Center</option>
                </optgroup>
                <optgroup label="Third-party">
                  <option>BuWizz</option>
                  <option>Circuit Cubes</option>
                </optgroup>
                <option>Misc.</option>
              </select>
            </td>
            <td class="align-middle">
              <select class="form-control" name="remoteControl">
              <option>To be decided</option>
              <optgroup label="Motorized">
                <option>Power Functions</option>
                <option>Control+</option>
                <option>Powered Up</option>
                <option>9V</option>
              </optgroup>
              <optgroup label="Non-motorized">
                <option>Pneumatics</option>
                <option>Wind-up</option>
                <option>Pull-back</option>
                <option>Manual</option>
              </optgroup>
              <optgroup label="Programmable">
                <option>Mindstorms</option>
                <option>Spike</option>
                <option>Control Center</option>
              </optgroup>
              <optgroup label="Third-party">
                <option>SBrick</option>
                <option>BuWizz</option>
                <option>Circuit Cubes</option>
              </optgroup>
              <option>Misc.</option>
              </select>
            </td>
            <td class="align-middle">
              <select class="form-control" name="lights">
                <option>To be decided</option>
                <option>None</option>
                <option>Power Functions</option>
                <option>Powered Up</option>
                <option>Brickstuff</option>
                <option>SBrick Light</option>
                <option>Mixed</option>
                <option>Misc.</option>
              </select>
            </td>
            <td class="align-middle">
              <select class="form-control" name="stickers">
                <option>To be decided</option>
                <option>None</option>
                <option>To be made</option>
                <option>Partially ready</option>
                <option>Ready</option>
                <option>Ready & applied</option>
              </select>
            </td>
            <td class="align-middle">
              <select class="form-control" name="status">
                <option>Select...</option>
                <option class="text-warning">Planning</option>
                <option class="text-success">In progress</option>
                <option class="text-warning">Components ready</option>
                <option class="text-danger">Waiting for parts</option>
                <option class="text-primary">Waiting</option>
                <option class="text-danger">Blocked by other</option>
                <option class="text-success">Completed</option>
                <option class="text-info">On display</option>
                <option class="text-secondary">Stored</option>
                <option class="text-secondary">Waiting for disassembly</option>
              </select>
            </td>`;

  $('#addNewMoc').click(function(e) {
    var tr = `<tr class="tr" id="` + makeid(7) + `">
    <td class="align-middle">
      <div id="progress-slider">
        <input type="hidden" class='custom-slider-input' name="completion">
      </div>
      </td>
      <th class="align-middle" scope="row"><input class="form-control" type="text" name="name" placeholder="MOC name">
        <input class="form-control mt-1" type="text" name="notes" placeholder="MOC notes"></th>
      <td class="align-middle"><input class="form-control" type="number" name="started" min="1900" value="` + new Date().getFullYear() + `"></td>
      ` + selects + `
      <td class="align-middle">
        <span class="small">URL address of your Bricklink wanted parts list:</span>
        <input class="form-control" type="text" name="parts" placeholder="URL address...">
      </td>
      <td class="align-middle">
        <div class="btn-group">
          <button type="button" class="btn btn-sm btn-primary btn-save">
            <span class="material-icons align-middle" data-toggle="tooltip" data-placement="top" title="Save">
              check
            </span>
          </button>
          <button type="button" class="btn btn-sm btn-danger btn-cancel">
            <span class="material-icons align-middle" data-toggle="tooltip" data-placement="top" title="Cancel">
              cancel
            </span>
          </button>
        </div>
      </td>
      </tr>`;
  $('tbody').append(tr);
  $('[data-toggle="tooltip"]').tooltip();

  $('#progress-slider').customSlider({
      start: 0,
      tooltips: true,
      connect: true,
      step: 5,
      range: {
        'min': 0,
        'max': 100
      },
      pips: {
        mode: 'positions',
        values: [0, 25, 50, 75, 100],
        density: 5
        }
    });
  });

  $(document).on("click", ".btn-save", function() {
    var form = $(this).closest(".tr");
    var completion = $(form).find('[name="completion"]').val();
    completion = number_format(completion, 0);

    if (completion > 100) {
      completion = 100;
    } else if (completion < 0) {
      completion = 0;
    }

    var progressColor = "";
    switch (true) {
      case (completion < 25):
        progressColor = "warning";
        break;
      case (completion < 50):
        progressColor = "info";
        break;
      case (completion < 75):
        progressColor = "primary";
        break;
      default:
        progressColor = "success";
        break;
      }

      var badgeColor = "";
      switch ($(form).find('[name="status"]').find(":selected").text()) {
        case "Planning":
        case "Components ready":
          badgeColor = "warning";
          break;
        case "In progress":
        case "Completed":
          badgeColor = "success";
          break;
        case "Waiting for disassembly":
        case "Stored":
          badgeColor = "secondary";
          break;
        case "Waiting for parts":
        case "Blocked by other":
          badgeColor = "danger";
          break;
        case "On display":
          badgeColor = "info";
          break;
        default:
          badgeColor = "primary";
          break;
        }

    var notes = ($(form).find('[name="notes"]').val() == "") ? "" : `<br><span class="small">` + $(form).find('[name="notes"]').val() + `</span>`;
    var tr = `<td class="align-middle">
    <div class="progress border border-` + progressColor + `">
      <div class="progress-bar bg-` + progressColor + `" style="width: ` + completion + `%;">` + completion + `%</div>
      </div>
      </td>
      <th class="align-middle" scope="row">` + $(form).find('[name="name"]').val() + notes + `</th>
      <td class="align-middle">` + $(form).find('[name="started"]').val() + `</td>
      <td class="align-middle">` + $(form).find('[name="powerSupply"]').find(":selected").text() + `</td>
      <td class="align-middle">` + $(form).find('[name="remoteControl"]').find(":selected").text() + `</td>
      <td class="align-middle">` + $(form).find('[name="lights"]').find(":selected").text() + `</td>
      <td class="align-middle">` + $(form).find('[name="stickers"]').find(":selected").text() + `</td>
      <td class="align-middle"><span class="badge badge-` + badgeColor + ` w-100">` + $(form).find('[name="status"]').find(":selected").text() + `</span></td>
      <td>
        <a href=` + $(form).find('[name="parts"]').val() + ` target="_blank" type="button" class="btn btn-sm btn-info btn-partslist">
          Wanted list
        </a>
      </td>
      <td>
        <div class="btn-group">
          <button type="button" class="btn btn-sm btn-primary btn-edit">
            EDIT
          </button>
          <button type="button" class="btn btn-sm btn-danger btn-delete" data-toggle="modal" data-target="#deleteModal" data-id="` + $(form).attr("id") + `" data-moc="` + $(form).find('[name="name"]').val() + `">
            DELETE
          </button>
        </div>
      </td`;
    $(form).html(tr);
    $('[data-toggle="tooltip"]').tooltip();
    saveTable();
  });

  $(document).on("click", ".btn-edit", function() {
    var form = $(this).closest(".tr");
    var completion = parseInt($(form).find('td:eq(0)').text().slice(0, -1));
    var powerSupply = $(form).find('td:eq(2)').text();
    var remoteControl = $(form).find('td:eq(3)').text();
    var lights = $(form).find('td:eq(4)').text();
    var stickers = $(form).find('td:eq(5)').text();
    var status = $(form).find('td:eq(6)').text();
    var parts = $(form).find('td:eq(7)').find('a').attr('href');

    if (parts == 'target="_blank"') {
      parts = '';
    }

    var name = '';
    var notes = '';
    if ($(form).find('th:eq(0)').html().includes('<br><span class="small">')) {
      name = $(form).find('th:eq(0)').html().split('<br><span class="small">');
      notes = name[1].replace("</span>", "");
      name = name[0];
    } else {
      name = $(form).find('th:eq(0)').html();
    }

    var tr = `<td class="align-middle">
          <div id="progress-slider">
            <input type="hidden" class='custom-slider-input' name="completion">
          </div>
          </td>
          <th class="align-middle" scope="row"><input class="form-control" type="text" name="name" value="` + name + `">
            <input class="form-control" type="text" name="notes" value="` + notes + `"></th>
          <td class="align-middle"><input class="form-control" type="number" name="started" min="1900" value="` + $(form).find('td:eq(1)').text() + `"></td>
          ` + selects + `
          <td class="align-middle">
            <span class="small">URL address of your Bricklink wanted parts list:</span>
            <input class="form-control" type="text" name="parts" placeholder="URL address...">
          </td>
          <td class="align-middle">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-primary">
                <span class="material-icons align-middle btn-save" data-toggle="tooltip" data-placement="top" title="Save">
                  save
                </span>
              </button>
            </div>
          </td>`;
        $(form).html(tr);
        $(form).find('[name="powerSupply"]').val(powerSupply);
        $(form).find('[name="remoteControl"]').val(remoteControl);
        $(form).find('[name="lights"]').val(lights);
        $(form).find('[name="stickers"]').val(stickers);
        $(form).find('[name="status"]').val(status);
        $(form).find('[name="notes"]').val(notes);
        $(form).find('[name="parts"]').val(parts);
        $('#progress-slider').customSlider({
            start: completion,
            tooltips: true,
            connect: true,
            step: 5,
            range: {
              'min': 0,
              'max': 100
            },
            pips: {
              mode: 'positions',
              values: [0, 25, 50, 75, 100],
              density: 5
              }
          });
  });

    $(document).on("click", ".btn-delete", function() {
      if ($(this).data("moc") == "" || !$(this).data("moc")) {
        $(this).data("moc", "unnamed");
      }

      $("#deleteModal").find(".modal-body").text("Do you want to delete MOC " + $(this).data("moc") + "?");
      $("#deleteButton").data("id", $(this).data("id"));
    });

    $(document).on("click", ".btn-cancel", function() {
      $(this).parent().parent().parent().remove();
    });

    $('#deleteButton').click( function(e) {
      let id = $(this).data("id");
      $("#" + id).remove();
      saveTable();
      $('#deleteModal').modal('toggle');
    });

  function saveTable() {
    localStorage.setItem("mocmanager", $('tbody').html());
  }

  function makeid(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() *
 charactersLength));
   }
   return result;
}

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

});
