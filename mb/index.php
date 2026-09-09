<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>MOCBoard - free MOC management tool for AFOLs</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
    <link href="assets/plugins/choices/choices.min.css" rel="stylesheet"/>
    <link href="assets/css/app-style.css?v=1" rel="stylesheet"/>

</head>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
<div id="wrapper">

    <!--Start topbar header-->
    <header class="topbar-nav">
        <nav class="navbar navbar-expand fixed-top">
            <ul class="navbar-nav mr-auto align-items-center">
                <li class="nav-item mr-2">
                    <div class="dropdown">
                        <button class="btn btn-light w-100 text-uppercase dropdown-toggle" type="button"
                                data-toggle="dropdown">
                            <i class="fa fa-tasks fa-lg mr-2"></i> MOCBoard
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#manageBoardsModal"><i
                                    class="fa fa-columns mr-2"></i>Manage boards</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#reorderColumnsModal">
                                <i class="fa fa-arrows-h mr-2"></i>Reorder columns</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#editTagsModal">
                                <i class="fa fa-tags mr-2"></i>Edit tags</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#changelogModal">
                                <i class="fa fa-info-circle mr-2"></i>Changelog</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="" id="exportDataButton"><i class="fa fa-floppy-o mr-2"></i>Export
                                data</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#importDataModal">
                                <i class="fa fa-upload mr-2"></i>Import data</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#clearDataModal">
                                <i class="fa fa-ban mr-2"></i>Clear saved data</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item border-right border-light pr-4 mr-4">
                    <button class="btn btn-light" id="menuChangeBg" type="button">
                        <i class="fa fa-lg fa-picture-o"></i>
                    </button>
                </li>

                <li class="nav-item" id="statsBar"></li>
            </ul>

            <ul class="navbar-nav align-items-center right-nav-link">
                <li class="nav-item ">
                    <button class="btn btn-light w-100 text-uppercase" type="button"
                            data-toggle="modal" data-target="#helpModal">
                        <i class="fa fa-question-circle mr-2"></i> Help
                    </button>
                </li>

            </ul>
        </nav>
    </header>
    <!--End topbar header-->

    <div class="clearfix"></div>

    <div class="content-wrapper px-4">

        <ul class="nav nav-tabs mt-3 position-relative" id="tabs"></ul>

        <div class="tab-content" id="tabContent">
            <div class="loader">
                <div class="prompt text-uppercase"></div>

                <div class="spinner">
                    <svg width="400" height="400" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="200" cy="200" r="10" fill="none" stroke="white" stroke-width="2">
                            <animate
                                    attributeName="r"
                                    from="10"
                                    to="200"
                                    dur="0.75s"
                                    repeatCount="indefinite" />
                            <animate
                                    attributeName="opacity"
                                    from="0.7"
                                    to="0"
                                    dur="0.75s"
                                    repeatCount="indefinite" />
                        </circle>
                    </svg>
                </div>
            </div>
        </div>

    </div><!--End content-wrapper-->

    <!--Start footer-->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                Built using
                <a href="https://getbootstrap.com/" target="_blank">Bootstrap</a>,
                <a href="https://themeforest.net/item/dashtreme-multipurpose-bootstrap4-admin-template/23059455"
                   target="_blank">Dashtreme</a>
                and <a href="https://github.com/SortableJS/" target="_blank">SortabjeJS</a>
            </div>
        </div>
    </footer>
    <!--End footer-->

    <!--start color switcher-->
    <div class="right-sidebar" id="rightMenu">
        <div class="right-sidebar-content pt-3">

            <a href="" class="fa fa-times-circle fa-2x text-white" id="menuChangeBgClose"
               style="position: absolute; top: 22px; right: 20px;"></a>

            <h5>Change background:</h5>
            <hr>

            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
                <li id="theme16"></li>
                <li id="theme17"></li>
                <li id="theme18"></li>
                <li id="theme19"></li>
                <li id="theme20"></li>
                <li id="theme21"></li>
                <li id="theme22"></li>
                <li id="theme23"></li>
                <li id="theme24"></li>
                <li id="theme25"></li>
                <li id="theme26"></li>
                <li id="theme27"></li>
                <li id="theme28"></li>
                <li id="theme29"></li>
                <li id="theme30"></li>
                <li id="theme31"></li>
                <li id="theme32"></li>
                <li id="theme33"></li>
                <li id="theme34"></li>
                <li id="theme35"></li>
                <li id="theme36"></li>
            </ul>

        </div>
    </div>
    <!--end color switcher-->

</div><!--End wrapper-->

<input type="hidden" id="currentBoard"> <!-- for keeping board index -->

<!-- start modals -->

<!-- import data modal start -->
<div class="modal" tabindex="-1" id="importDataModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Import data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 align-self-center text-center">
                        <i class="fa fa-3x fa-upload"></i>
                    </div>
                    <div class="col">
                        You can load data from a previously exported json file.<br><br><b>Important:</b> this will
                        overwrite any data currently existing on the board.
                        <br><br>
                        <input type="file" class="form-control" id="importDataFile">
                    </div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-between border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="importDataConfirm">Import data
                </button>
            </div>
        </div>
    </div>
</div>
<!-- import data modal end -->

<!-- clear saved data modal start -->
<div class="modal" tabindex="-1" id="clearDataModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Confirm data clearing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 align-self-center text-center">
                        <i class="fa fa-3x fa-exclamation-triangle"></i>
                    </div>
                    <div class="col">
                        Are you sure you want to permanently remove all stored data? This will delete any data you might
                        have created here and restore the boards to default state, and it cannot be reversed!
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="confirmClearData">Confirm
                    clearing
                </button>
            </div>
        </div>
    </div>
</div>
<!-- clear saved data modal end -->

<!-- remove MOC modal start -->
<div class="modal" tabindex="-1" id="removeMocModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Confirm MOC removal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 align-self-center text-center">
                        <i class="fa fa-3x fa-trash"></i>
                    </div>
                    <div class="col" id="removeMocModalText">
                        Are you sure you want to permanently remove MOC
                    </div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-between border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="removeMocConfirm">Confirm
                    removal
                </button>
            </div>
        </div>
    </div>
</div>
<!-- remove MOC modal end -->

<!-- add MOC modal start -->
<div class="modal" tabindex="-1" id="addMocModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Add new MOC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form id="addMocForm">
                    <input type="hidden" name="targetColumn" id="targetColumn">

                    <div class="form-group row">
                        <label for="mocName" class="col-sm-3 col-form-label align-middle">MOC name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="mocName" placeholder="My awesome MOC" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="completion" class="col-sm-3 col-form-label align-middle">Completion:</label>
                        <div class="col-sm-8">
                            <input type="range" class="custom-range bg-dark" id="completion"
                                   min="0" max="100" step="5" onInput="$('#rangeval').html($(this).val() + '%')">
                        </div>
                        <div class="col-sm-1 text-right">
                            <span id="rangeval">50%</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="startDate" class="col-sm-3 col-form-label align-middle">Start date:<br><span
                                class="small">(month & year)</span></label>
                        <div class="col-sm-3">
                            <input type="month" class="form-control" id="startDate" required>
                        </div>

                        <label for="boardSelect" class="col-sm-2 col-form-label align-middle text-right hideOnAdd">Board:</label>
                        <div class="col-sm-4">
                            <select class="form-control hideOnAdd" name="boardSelect" id="boardSelect"
                                    data-toggle="tooltip" data-placement="top" title="Use this to move MOC to another board.
                                    It will be added at the end of the target's board first column."></select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="imgUrl" class="col-sm-3 col-form-label align-middle">Main image URL:</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" id="imgUrl">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="choices-multiple-remove-button" class="col-sm-3 col-form-label align-middle">Tags:
                            <span
                                    class="small">(up to 5)</span></label>
                        <div class="col-sm-9" id="tagsContainer">
                            <select class="form-control" id="choices-multiple-remove-button" multiple></select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="powerSupply" class="col-sm-3 col-form-label align-middle">Power supply:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="powerSupply" id="powerSupply">
                                <option selected>To be decided</option>
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
                        </div>

                        <label for="remoteControl" class="col-sm-3 col-form-label align-middle text-right">Remote
                            control:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="remoteControl" id="remoteControl">
                                <option selected>To be decided</option>
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
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lights" class="col-sm-3 col-form-label align-middle">Lights:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="lights" id="lights">
                                <option selected>To be decided</option>
                                <option>None</option>
                                <option>Power Functions</option>
                                <option>Powered Up</option>
                                <option>Brickstuff</option>
                                <option>SBrick Light</option>
                                <option>Mixed</option>
                                <option>Misc.</option>
                            </select>
                        </div>

                        <label for="stickers" class="col-sm-3 col-form-label align-middle text-right">Stickers:</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="stickers" id="stickers">
                                <option selected>To be decided</option>
                                <option>None</option>
                                <option>To be made</option>
                                <option>Partially ready</option>
                                <option>Ready</option>
                                <option>Ready &amp; applied</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="partsListUrl" class="col-sm-3 col-form-label align-middle">Parts list URL:</label>
                        <div class="col-sm-9">
                            <input type="url" class="form-control" id="partsListUrl">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="note" class="col-sm-3 col-form-label align-middle">Note:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="note" rows="4" data-toggle="tooltip"
                                      data-placement="top" title="Hint: if you paste a URL address here,
                                        it will become a clickable link when you view the note"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="filesUrls" class="col-sm-3 col-form-label align-middle">Attached files
                            URLs:<br><span
                                    class="small">(one per line)</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="filesUrls" rows="4" data-toggle="tooltip"
                                      data-placement="top" title="Paste links to images here to be able
                                        to browse them from your MOC's card"></textarea>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer d-flex justify-content-between border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="addMocSubmit" data-dismiss="modal">Add MOC</button>
            </div>
        </div>
    </div>
</div>
<!-- add MOC modal end -->

<!-- reorder columns modal start -->
<div class="modal" tabindex="-1" id="reorderColumnsModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Reorder columns</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                Drag items up or down to reorder column on the currently active board.
                Changes are saved automatically and applied upon closing this modal window.
                Columns are being moved together with their content.

                <div id="columnsList" class="list-group col mt-3"></div>

            </div>
            <div class="modal-footer d-flex align-content-end border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- reorder columns modal end -->

<!-- remove column modal start -->
<div class="modal" tabindex="-1" id="removeColumnModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Confirm column removal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 align-self-center text-center">
                        <i class="fa fa-3x fa-trash"></i>
                    </div>
                    <div class="col" id="removeColumnModalText"></div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-between border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="removeColumnConfirm">Confirm
                    removal
                </button>
            </div>
        </div>
    </div>
</div>
<!-- remove column modal end -->

<!-- manage boards modal start -->
<div class="modal" tabindex="-1" id="manageBoardsModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Manage boards</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                Drag items up or down to reorder your boards. Changes are saved automatically and applied upon closing
                this modal window.

                <div id="boardsList" class="list-group col mt-3"></div>

            </div>
            <div class="modal-footer d-flex align-content-end border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- manage boards modal end -->

<!-- remove board modal start -->
<div class="modal" tabindex="-1" id="removeBoardModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Confirm board removal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3 align-self-center text-center">
                        <i class="fa fa-3x fa-trash"></i>
                    </div>
                    <div class="col" id="removeBoardModalText"></div>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-between border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="removeBoardConfirm">Confirm
                    removal
                </button>
            </div>
        </div>
    </div>
</div>
<!-- remove column modal end -->

<!-- edit tags modal start -->
<div class="modal" tabindex="-1" id="editTagsModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Edit tags</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Edit and/or reorder the tags that will be available across all your MOCs, one tag per line. A single
                tag can have any length and consist of multiple words. There's a limit of 20 tags total, so if you enter
                more,
                the surplus tags will be ignored. Up to 5 tags can be selected per MOC. Each tag has a predefined unique
                color
                that is determined by its position on the list below:

                <textarea class="form-control mt-3" rows="10" wrap="hard" maxlength="400" id="tagsInput"></textarea>

            </div>
            <div class="modal-footer d-flex align-content-end border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="editTagsConfirm">Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<!-- edit tags modal end -->

<div id="scrollButtons">
    <button class="btn btn-light mr-1" id="scrollLeft"><i class="fa fa-lg fa-arrow-left"></i></button>
    <button class="btn btn-light" id="scrollRight"><i class="fa fa-lg fa-arrow-right"></i></button>
</div>

<!-- note modal start -->
<div class="modal" tabindex="-1" id="noteModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer d-flex align-content-end border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- note modal end -->

<!-- help modal start -->
<div class="modal" tabindex="-1" id="helpModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Help</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ol>
                    <li>The website is optimized for computers, not so much for mobile devices</li>
                    <li>All changes are automatically saved in your web browser's memory</li>
                    <li>You can move the data between browsers and devices using export/import option in the main menu</li>
                    <li>If you encounter any issue, first try simply reloading the page</li>
                    <li>For a detailed walkthrough, watch the video below:</li>
                </ol>

            </div>
            <div class="modal-footer d-flex align-content-end border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- help modal end -->

<!-- changelog modal start -->
<div class="modal" tabindex="-1" id="changelogModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark-light3">
            <div class="modal-header border-bottom border-light">
                <h5 class="modal-title">Changelog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <ul class="timeline">
                    <li>
                        <span class="text-info font-weight-bolder text-uppercase">Initial release</span>
                        <span class="text-info float-right">16.11.2024</span>
                        <p>And off we go...</p>
                    </li>
                </ul>

            </div>
            <div class="modal-footer d-flex align-content-end border-top border-light">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- changelog modal end -->

<!-- end modals -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/sidebar-menu.js"></script>
<script src="assets/js/sortable.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>
<script src="assets/plugins/choices/choices.min.js"></script>
<script src="assets/js/app-script.js?v=1"></script>

</body>
</html>
