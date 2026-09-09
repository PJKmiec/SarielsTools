$(function () {
    "use strict";

    // fancybox
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });

    // sortables
    new Sortable(boardsList, {
        animation: 150,

        onUpdate: function (e) {
            moveBoardToIndex(e.item.id, e.newIndex);
        }
    });

    new Sortable(columnsList, {
        animation: 150,

        onUpdate: function (e) {
            moveColumnById(e.item.id, e.newIndex);
        }
    });

    // scroll left
    $('#scrollLeft').click(function () {
        $('#tabContent').animate({ scrollLeft: '-=420' }, 300); // Adjust scroll value and duration as needed
    });

    // scroll right
    $('#scrollRight').click(function () {
        $('#tabContent').animate({ scrollLeft: '+=420' }, 300); // Adjust scroll value and duration as needed
    });


//sidebar menu js
    $.sidebarMenu($('.sidebar-menu'));

// === toggle-menu js
    $(".toggle-menu").on("click", function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

// === sidebar menu activation js
    $(function () {
        for (var i = window.location, o = $(".sidebar-menu a").filter(function () {
            return this.href == i;
        }).addClass("active").parent().addClass("active"); ;) {
            if (!o.is("li")) break;
            o = o.parent().addClass("in").parent().addClass("active");
        }
    }),


        /* Top Header */

        $(document).ready(function () {
            $(window).on("scroll", function () {
                if ($(this).scrollTop() > 60) {
                    $('.topbar-nav .navbar').addClass('bg-dark');
                } else {
                    $('.topbar-nav .navbar').removeClass('bg-dark');
                }
            });

        });


    /* Back To Top */

    $(document).ready(function () {
        $(window).on("scroll", function () {
            if ($(this).scrollTop() > 300) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        $('.back-to-top').on("click", function () {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    });


    $(function () {
        $('[data-toggle="popover"]').popover()
    })


    $('body').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    // theme setting
    $("#menuChangeBg").on("click", function (e) {
        e.preventDefault();
        $("#rightMenu").toggleClass("right-toggled");
    });

    $("#menuChangeBgClose").on("click", function (e) {
        e.preventDefault();
        $("#rightMenu").removeClass("right-toggled");
    });

    $('.switcher li').click(function () {
        swapTheme($(this).attr('id'))
    });

    function swapTheme(id) {
        $('body').attr('class', 'bg-theme bg-' + id);
        data.theme = "bg-" + id;
        localStorage.setItem("mocboard", JSON.stringify(data));
    }

    // tooltips
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    var tagColors = ["primary", "secondary", "success", "danger", "warning", "info", "blue", "purple", "yellow", "teal",
        "tan", "mint", "forestgreen", "seagreen", "darkseagreen", "lime", "darklime", "pink", "darkpink", "charcoal"];

    // data handling
    const initialData = {
        "theme": "bg-theme1",
        "active_board": 0,
        "tags": ["Vehicle", "Train", "Aircraft", "Watercraft", "Construction Equipment", "Car", "Truck", "Tank", "Building", "Figurine"],
        "boards": [
            {
                "name": "MOCs",
                "id": uuidv4(),
                "columns": [
                    {
                        "name": "To do",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": [
                            {
                                "name": "Your sample MOC",
                                "id": uuidv4(),
                                "started": new Date().getFullYear() + '-' + (new Date().getMonth() + 1),
                                "completion": 50,
                                "image": "assets/images/brick.jpg",
                                "powerSupply": "",
                                "remoteControl": "",
                                "lights": "",
                                "stickers": "",
                                "partsList": "",
                                "note": "",
                                "attachments": [],
                                "tags": []
                            }
                        ]
                    },
                    {
                        "name": "Waiting for parts",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                    {
                        "name": "In progress",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                    {
                        "name": "Done",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                ]
            },
            {
                "name": "LEGO Ideas Projects",
                "id": uuidv4(),
                "columns": [
                    {
                        "name": "To do",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                    {
                        "name": "In progress",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                    {
                        "name": "Done",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                ]
            },
            {
                "name": "Experiments",
                "id": uuidv4(),
                "columns": [
                    {
                        "name": "To do",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                    {
                        "name": "In progress",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                    {
                        "name": "Done",
                        "id": uuidv4(),
                        "color": "light",
                        "size": "xl",
                        "state": "expanded",
                        "mocs": []
                    },
                ]
            }
        ]
    };

    var data = localStorage.getItem("mocboard");

    if (data == null) {
        data = initialData;
    } else {
        data = JSON.parse(localStorage.getItem("mocboard"));
    }

    // initialize all
    const loadingPrompts = [
        "Feeding the hamsters...",
        "Sorting bricks...",
        "Pulling out pins...",
        "Looking for that one piece...",
        "Rounding studs...",
        "Tasting ABS...",
        "Pushing axles through...",
        "Looking at new set's prices...",
        "Dropping pieces...",
        "Stepping on bricks...",
        "Peeling off stickers...",
        "Osprey? What Osprey?",
        "Waiting for the hub to update...",
        "Checking out the leaks...",
        "A Møøse once bit my sister!",
        "Ignoring Duplo...",
        "Yellowing bricks...",
        "Regretting not buying that set...",
        "I'm not spinning, you're spinning",
        "Sorry, what was I loading?",
        "Drowning in brick separators...",
        "Yes, it will load eventually",
        "Finding bricks in unexpected places...",
        "Why does that brick smell funny?"
    ];

    const randomIndex = Math.floor(Math.random() * loadingPrompts.length);
    $(".prompt").text(loadingPrompts[randomIndex]);

    setTimeout(function(){
        renderAll(data);
    }, 750);

    function renderAll(data) {
        localStorage.setItem("mocboard", JSON.stringify(data));
        var bodyTheme = data.theme;

        if (bodyTheme != null) {
            $('body').removeClass().addClass('bg-theme ' + bodyTheme);
        }

        // clean up
        $('#tabs').html("");
        $('#tabContent').html("")

        if ($('#currentBoard').val() === "" || $('#currentBoard').val() == null) {
            $('#currentBoard').val("0")
        }

        data.boards.forEach(renderBoard);

        var tabLastHtml = `<li class="nav-item">
                <a class="nav-link addNewBoardButton" href=""><i class="fa fa-plus mr-2"></i> Add new board</a>
            </li>`;
        $('#tabs').append(tabLastHtml);

        $('#tabs a.nav-link').eq(data.active_board).addClass('active');
        $('#tabContent div.tab-pane').eq(data.active_board).addClass('show active');

        // calculate local storage used
        const used = Math.round((JSON.stringify(localStorage).length / 1024) * 2);

        // count total MOCs number and their average age
        let totalDays = 0;
        let mocCount = 0;
        data.boards.forEach(board => {
            board.columns.forEach(column => {
                column.mocs.forEach(moc => {
                    if (moc.started !== "" && moc.started != null) {
                        const daysAge = calculateDaysDifference(moc.started);
                        totalDays += daysAge;
                    }
                    mocCount++;
                });
            });
        });

        const averageDays = mocCount ? totalDays / mocCount : 0;
        const averageMonths = averageDays / 30.437;
        const averageMonthsDaysRemaining = averageDays % 30.437;
        const averageYears = averageDays / 365.25;
        const averageYearsMonthsRemaining = (averageDays % 365.25) % 12;

        let mocAge = 0;

        if (averageDays < 31) {
            mocAge = averageDays.toFixed() + 'd';
        } else if (averageDays < 366) {
            mocAge = averageMonths.toFixed() + 'm ' + averageMonthsDaysRemaining.toFixed() + 'd';
        } else if (averageDays > 0) {
            mocAge = averageYears.toFixed() + 'y ' + averageYearsMonthsRemaining.toFixed() + 'm';
        }

        let statsHtml = `<span class="text-muted"><i class="fa fa-info-circle mr-2"></i>Total MOCs: </span>` + mocCount + `
                            <span class="text-muted">| Average MOC age: </span>` + mocAge + `
                            <span class="text-muted">| Data we're storing in your browser: </span>` + used + ` kB 
        `;

        $('#statsBar').html(statsHtml);
    }

    function renderBoard(board) {
        var tabHtml = `<li class="nav-item">
                <a class="nav-link" href="" data-toggle="tab" data-target="#` + board.id + `">` + board.name + `</a>
            </li>`;
        $('#tabs').append(tabHtml);

        var tabPaneHtml = `<div class="tab-pane fade" id="` + board.id + `">
                <!--Start Dashboard Content-->
                <div class="container mt-3 px-0">
                    <div class="d-flex column-container"></div>
                </div>
                <!--End Dashboard Content-->
            </div>`;

        $('#tabContent').append(tabPaneHtml);

        for (let i = 0; i < board.columns.length; i++) {
            let column = board.columns[i];
            renderColumn(column, board.id);

            for (let j = 0; j < column.mocs.length; j++) {
                let moc = column.mocs[j];
                if (moc.image === "" || moc.image == null) {
                    moc.image = 'assets/images/brick.jpg';
                }

                const mocAgeDays = (moc.started !== "" && moc.started !== null) ? calculateDaysDifference(moc.started) : 0;
                const mocAgeMonths = mocAgeDays / 30.437;
                const mocAgeYears = mocAgeDays / 365.25;

                let mocAge = '?';

                if (mocAgeDays < 31) {
                    mocAge = mocAgeDays.toFixed() + 'd';
                } else if (mocAgeDays < 366) {
                    mocAge = mocAgeMonths.toFixed() + 'm';
                } else {
                    mocAge = mocAgeYears.toFixed() + 'y';
                }

                let partsListLink = (moc.partsList.length < 1) ? "none" : "<a href='" + moc.partsList + "' target='_blank'>Click to visit</a>";
                let noteLink = (moc.note.length < 1)
                    ? "none" : "<a href='' class='noteLink' data-toggle='modal' data-target='#noteModal' data-note='" + moc.note + "'>Click to see</a>";

                var attachmentHtml = ``;

                for (let a of moc.attachments) {
                    attachmentHtml = attachmentHtml + `<a href="` + a + `" style="background-image: url('` + a + `'); "
                        class="rounded-circle shadow image-circle m-1 fancybox" rel="` + moc.id + `"></a>`;
                }

                var tagsHtml = "";

                if (moc.tags != null && moc.tags.length > 0) {
                    for (let tag of moc.tags) {
                        let badgeColor = tagColors[tag];
                        tagsHtml = tagsHtml + `<span class="tag-badge badge badge-` + badgeColor + ` rounded-pill mt-3 mr-1">` + data.tags[tag] + `</span>`;
                    }
                }

                var cardHtml = ` <!-- MOC card start -->
                                <div class="moc-card card bg-` + column.color + ` border border-light" id="` + moc.id + `">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="mt-1">` + moc.name + `<span class="completion ml-2">(` + moc.completion + `%)</span></div>

                                        <div>
                                            <div class="dropdown mocDropdown mt-1">
                                                <a href="" class="dropdown-toggle dropdown-toggle-nocaret"
                                                data-toggle="dropdown"><i class="icon-options"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item editMocButton" href="" data-mocid = "` + moc.id + `"
                                                                data-toggle="modal" data-target="#addMocModal">Edit</a>
                                                    <a class="dropdown-item" href="" data-toggle="collapse" data-target="#collapseFiles">Files 
                                                                <span class="badge badge-light">` + moc.attachments.length + `</span></a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item removeMocButton" href="" data-mocname="` + moc.name + `"
                                                                data-mocid = "` + moc.id + `"
                                                                data-toggle="modal" data-target="#removeMocModal">Remove</a>
                                                </div>
                                            </div>
                                        
                                            <div class="bg-white rounded-circle text-dark text-center small mocAge"
                                                data-toggle="tooltip" data-placement="right"
                                                title="Your MOC's age"
                                                 style="height: 24px; width: 24px; line-height: 25px;">` + mocAge + `
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="card-body">

                                        <div class="subheader d-flex justify-content-between mb-2">
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width:` + moc.completion + `%"></div>
                                                </div>
                                                <span class="text-white-50">Completion:</span>` + moc.completion + `%
                                            </div>
                                            <div class="align-middle">
                                            <span class="text-white-50"><i
                                                    class="fa fa-calendar-o mr-1"></i>Started:</span> ` + moc.started + `
                                            </div>
                                        </div>

                                        <div class="imageContainer" style="background-image: url('` + moc.image + `');">
                                             
                                             <div class="imageFade">
                                                <div class="row h-100 mx-0 justify-content-center align-items-center">
                                                    <div class="col-5 p-0 text-white-50 text-right detailsLeft">
                                                        <i class="fa fa-bolt mr-2"></i><span>Power supply:</span><br>
                                                        <i class="fa fa-podcast mr-2"></i><span>Remote control:</span><br>
                                                        <i class="fa fa-lightbulb-o mr-2"></i><span>Lights:</span><br>
                                                        <i class="fa fa-sticky-note-o mr-2"></i><span>Stickers:</span><br>
                                                        <i class="fa fa-list-alt mr-2"></i><span>Parts list:</span><br>
                                                        <i class="fa fa-comment-o mr-2"></i><span>Note:</span>
                                                    </div>
                                                    <div class="col detailsRight">
                                                        ` + NAOnNull(moc.powerSupply) + `<br>
                                                        ` + NAOnNull(moc.remoteControl) + `<br>
                                                        ` + NAOnNull(moc.lights) + `<br>
                                                        ` + NAOnNull(moc.stickers) + `<br>
                                                        ` + partsListLink + `<br>
                                                        ` + noteLink + `
                                                    </div>
                                                    <div class="col-12 text-center mocControls">
                                                        <div class="btn-group btn-group-sm w-100">
                                                            <button class="btn btn-outline-white w-50 text-uppercase editMocButton"
                                                                data-mocid = "` + moc.id + `"
                                                                data-toggle="modal" data-target="#addMocModal">Edit
                                                            </button>
                                                            <button class="btn btn-outline-white w-50 text-uppercase" 
                                                            data-toggle="collapse" data-target="#collapseFiles">Files
                                                                <span class="badge badge-light">` + moc.attachments.length + `</span>
                                                            </button>
                                                            <button class="btn btn-outline-white w-50 text-uppercase removeMocButton"
                                                                data-mocname="` + moc.name + `"
                                                                data-mocid = "` + moc.id + `"
                                                                data-toggle="modal" data-target="#removeMocModal">Remove
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>  
                                        </div>
                                        
                                        <div class="collapse mt-4" id="collapseFiles">
                                            <div class="d-flex flex-wrap justify-content-between">
                                                ` + attachmentHtml + `
                                            </div>
                                            <button class="btn btn-sm btn-light mt-2 w-100" data-toggle="collapse" 
                                            data-target="#collapseFiles">Close files<i class="fa fa-chevron-up ml-2"></i></button>
                                        </div>
                                        
                                        <div>` + tagsHtml + `</div>

                                    </div>
                                </div>
                                <!-- MOC card end -->`;

                $('#' + column.id).append(cardHtml);
            }

            // https://github.com/SortableJS/Sortable?tab=readme-ov-file
            new Sortable($('#' + column.id)[0], {
                group: 'shared',
                filter: '.filtered',
                animation: 150,

                onAdd: function (e) {
                    moveMocById(e.item.id, e.from.id, e.to.id, e.newIndex);
                },

                onUpdate: function (e) {
                    moveMocById(e.item.id, e.from.id, e.to.id, e.newIndex);
                },
            });
        }

        var columnLastHtml = `<div class="col-3 align-self-center">
                            <button type="submit" class="btn btn-light w-100 addNewColumnButton"><i
                                    class="fa fa-plus mr-2"></i>ADD NEW COLUMN
                            </button>
                        </div>`;

        $('#' + board.id).find('.column-container').append(columnLastHtml);
    }

    function renderColumn(column, boardId) {
        let state = '';
        let collapserIcon = 'compress';

        if (column.state === 'collapsed') {
            state = 'state-collapsed';
            collapserIcon = 'expand'
        }

        let sizeXlActive = (column.size === 'xl') ? 'active' : '';
        let sizeMActive = (column.size === 'm') ? 'active' : '';
        let sizeSActive = (column.size === 's') ? 'active' : '';

        var columnHtml = `<!-- column start -->
                        <div class="col-3 border-right border-light mb-2 size-` + column.size + ` ` + state + `">
                            <div class="d-flex justify-content-between my-3">
                                <h4>` + column.name + `:</h4>
                                <div class="card-action mt-2 mr-1 d-flex align-content-end">
                                    <div class="mr-3" data-toggle="tooltip" data-placement="left"
                                         title="Change cards color for this column">
                                        <div style="width: 20px; height: 20px"
                                              id="colorpicker-` + column.id + `"
                                             class="bg-` + column.color + ` border border-light rounded-circle border-hover"
                                             data-toggle="collapse" data-target="#colors-` + column.id + `">
                                        </div>
                                    </div>
                                    
                                    <a href="" class="mr-3 columnCollapser" data-column="` + column.id + `"><i class="fa fa-` + collapserIcon + `"></i></a>
     
                                    <div class="dropdown">
                                        <a href="" class="dropdown-toggle dropdown-toggle-nocaret"
                                           data-toggle="dropdown"><i class="icon-options"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item resize-xl ` + sizeXlActive + `" href="" data-columnid="` + column.id + `">Card size: XL</a>
                                            <a class="dropdown-item resize-m ` + sizeMActive + `" href="" data-columnid="` + column.id + `">Card size: M</a>
                                            <a class="dropdown-item resize-s ` + sizeSActive + `" href="" data-columnid="` + column.id + `">Card size: S</a>
                                            <a class="dropdown-item renameColumnButton" href="" data-column="` + column.id + `">Rename column</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item removeColumnButton" href="" data-columnid="` + column.id + `"
                                            data-name="` + column.name + `"
                                            data-toggle="modal" data-target="#removeColumnModal">Delete column</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="colors-` + column.id + `" class="collapse mb-3">
                                <div class="d-flex justify-content-between" data-column="` + column.id + `">
                                    <div style="width: 20px; height: 20px" data-color="light"
                                         class="bg-light border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="dark-light1"
                                         class="bg-dark-light1 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="dark-light2"
                                         class="bg-dark-light2 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="primary-light1"
                                         class="bg-primary-light1 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="primary-light2"
                                         class="bg-primary-light2 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="secondary-light1"
                                         class="bg-secondary-light1 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="secondary-light2"
                                         class="bg-secondary-light2 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="info-light1"
                                         class="bg-info-light1 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="info-light2"
                                         class="bg-info-light2 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="success-light1"
                                         class="bg-success-light1 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="success-light2"
                                         class="bg-success-light2 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="warning-light1"
                                         class="bg-warning-light1 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="warning-light2"
                                         class="bg-warning-light2 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="danger-light1"
                                         class="bg-danger-light1 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                    <div style="width: 20px; height: 20px" data-color="danger-light2"
                                         class="bg-danger-light2 border border-light rounded-circle border-hover colorSelect">
                                    </div>
                                </div>
                            </div>
                            
                            <button class="btn btn-light w-100 mb-3 text-uppercase filtered addMocButton"
                                        data-toggle="modal" data-target="#addMocModal" data-column="` + column.id + `"><i
                                        class="fa fa-plus mr-2" ></i>Add new MOC</button>

                            <div id="` + column.id + `" class="h-100"></div>
                        </div>
                        <!-- column end -->`

        $('#' + boardId).find('.column-container').append(columnHtml);
    }

    // open remove MOC modal
    $(document).on("click", ".removeMocButton", function () {
        $('#removeMocModalText').text('Are you sure you want to permanently remove ' + $(this).attr('data-mocname') + '?');
        $('#removeMocConfirm').attr('data-moc', $(this).attr('data-mocid'));
    });

    // remove MOC
    $('#removeMocConfirm').click(function () {
        let mocId = $(this).attr('data-moc');
        removeMocById(mocId);
        renderAll(data);
    });

    // open add MOC modal
    $(document).on("click", ".addMocButton", function () {
        $('.hideOnAdd').addClass('d-none');
        $('#targetColumn').val($(this).attr('data-column'));
        $('#addMocModal').find('.modal-title').text('Add new MOC');
        $('#editMocSubmit').prop('id', 'addMocSubmit').text('Add MOC');

        // populate tags list
        $('#tagsContainer').html(`<select class="form-control" id="choices-multiple-remove-button" multiple></select>`);
        let tagsList = $('#choices-multiple-remove-button');

        for (const [index, tag] of data.tags.entries()) {
            tagsList.append(`<option value="` + index + `">` + tag + `</option>`);
        }

        // init tags
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:20,
            renderChoiceLimit:20
        });

        $('#mocName').focus();
    });

    // add MOC
    $(document).on("click", "#addMocSubmit", function () {
        var mocData = {
            "name": $('#mocName').val(),
            "id": uuidv4(),
            "started": $('#startDate').val(),
            "completion": $('#completion').val(),
            "image": $('#imgUrl').val(),
            "powerSupply": $('#powerSupply').val(),
            "remoteControl": $('#remoteControl').val(),
            "lights": $('#lights').val(),
            "stickers": $('#stickers').val(),
            "partsList": $('#partsListUrl').val(),
            "note": $('#note').val(),
            "attachments": multilineToArray($('#filesUrls').val()),
            "tags": $('#choices-multiple-remove-button').val()
        };

        let targetColumn = $('#targetColumn').val();

        const allColumns = data.boards.flatMap(board => board.columns);
        const column = allColumns.find(column => column.id === targetColumn);

        if (column) {
            column.mocs.push(mocData);
        } else {
            console.log("Error: column not found - " + column);
        }

        $('#addMocForm').trigger("reset");
        $('#rangeval').html("50%");
        renderAll(data);
    });

    // edit MOC open modal
    $(document).on("click", ".editMocButton", function () {
        $('.hideOnAdd').removeClass('d-none');
        var mocId = $(this).attr('data-mocid');
        $('#addMocModal').find('.modal-title').text('Edit MOC');
        var moc = findMocById(mocId);
        let imgUrl = (moc.image === 'assets/images/brick.jpg') ? "" : moc.image;

        // populate boards select list
        let boardsSelectList = $('#boardSelect');
        boardsSelectList.empty();
        var boardId = findBoardIdByMocId(mocId);

        for (const board of getBoardList()) {
            let selected = '';
            if (board.id === boardId) {
                selected = 'selected';
            }

            boardsSelectList.append(`<option value="` + board.id + `" ` + selected + `>` + board.name + `</option>`);
        }

        $('#mocName').val(moc.name);
        $('#startDate').val(moc.started);
        $('#completion').val(moc.completion);
        $('#rangeval').html(moc.completion + '%');
        $('#imgUrl').val(imgUrl);

        // populate tags list
        $('#tagsContainer').html(`<select class="form-control" id="choices-multiple-remove-button" multiple></select>`);
        let tagsList = $('#choices-multiple-remove-button');

        for (const [index, tag] of data.tags.entries()) {
            let selected = '';
            if (moc.tags != null && moc.tags.length > 0 && moc.tags.includes(String(index))) {
                selected = 'selected';
            }

            tagsList.append(`<option value="` + index + `" ` + selected + `>` +tag + `</option>`);
        }

        // init tags
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount:5,
            searchResultLimit:20,
            renderChoiceLimit:20
        });

        if (moc.powerSupply != null && moc.powerSupply !== "") {
            $('#powerSupply').val(moc.powerSupply);
        }

        if (moc.remoteControl != null && moc.remoteControl !== "") {
            $('#remoteControl').val(moc.remoteControl);
        }

        if (moc.lights != null && moc.lights !== "") {
            $('#lights').val(moc.lights);
        }

        if (moc.stickers != null && moc.stickers !== "") {
            $('#stickers').val(moc.stickers);
        }

        $('#partsListUrl').val(moc.partsList);
        $('#note').val(moc.note);
        $('#filesUrls').val(moc.attachments.join("\n"));
        $('#addMocModal').find('.btn-danger').prop('id', 'editMocSubmit').text('Save changes').attr('data-moc', mocId);
    });

    // edit MOC
    $(document).on("click", "#editMocSubmit", function () {
        var mocid = $(this).attr('data-moc');

        let imgUrl = ($('#imgUrl').val() === "" || $('#imgUrl').val() == null) ? "assets/images/brick.jpg" : $('#imgUrl').val();

        var mocData = {
            "name": $('#mocName').val(),
            "id": mocid,
            "started": $('#startDate').val(),
            "completion": $('#completion').val(),
            "image": imgUrl,
            "powerSupply": $('#powerSupply').val(),
            "remoteControl": $('#remoteControl').val(),
            "lights": $('#lights').val(),
            "stickers": $('#stickers').val(),
            "partsList": $('#partsListUrl').val(),
            "note": $('#note').val(),
            "attachments": multilineToArray($('#filesUrls').val()),
            "tags": $('#choices-multiple-remove-button').val()
        };

        if ($('#boardSelect').val() !== findBoardIdByMocId(mocid)) {
            moveMocToBoard(mocid, $('#boardSelect').val());
        }

        updateMocById(mocid, mocData);
        $('#addMocForm').trigger("reset");
        $('#rangeval').html("50%");
        renderAll(data);
    });

    // pick column color
    $(document).on("click", ".colorSelect", function () {
        let targetColumn = $(this).parent().attr('data-column');
        let color = $(this).attr('data-color');
        updateColumnColor(targetColumn, color);
        $('#colors-' + targetColumn).collapse();
        renderAll(data);
    });

    // clear saved data
    $('#confirmClearData').click(function () {
        localStorage.clear();
        data = initialData;
        renderAll(data);
        $('body').removeClass().addClass('bg-theme bg-theme1');
    });

    // add new column show form
    $(document).on("click", ".addNewColumnButton", function () {
        var inputHtml = `<div class="row">
                            <div class="col">
                                <input type="text" class="form-control mb-3 newColumnName" placeholder="Column name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-light w-100 cancelNewColumnButton">Cancel</button>
                            </div>
                            <div class="col">
                              <button type="button" class="btn btn-light w-100 submitNewColumnButton">Add</button>
                            </div>
                         </div>`;

        $(this).parent().html(inputHtml).find('.newColumnName').focus();
    });

    // cancel adding new column
    $(document).on("click", ".cancelNewColumnButton", function () {
        var originalNewColumnButtonHtml = `<button type="submit" class="btn btn-light w-100 addNewColumnButton"><i
                                    class="fa fa-plus mr-2"></i>ADD NEW COLUMN
                            </button>`;

        $(this).parent().parent().parent().html(originalNewColumnButtonHtml);
    });

    // add new column
    $(document).on("click", ".submitNewColumnButton", function () {
        let boardIndex = $("#currentBoard").val();
        let columnName = $(this).parent().parent().parent().find('.newColumnName').val();

        let columnData = {
            "name": columnName,
            "id": uuidv4(),
            "color": "light",
            "size": "xl",
            "state": "expanded",
            "mocs": []
        };

        data.boards[boardIndex].columns.push(columnData);
        renderAll(data);
    });

    // rename column show form
    $(document).on("click", ".renameColumnButton", function (e) {
        let parent = $(this).parent().parent().parent().parent();
        let title = parent.find("h4");
        title.hide();

        var inputHtml = `<div class="row">
                            <div class="col pr-0">
                                <input type="text" class="form-control w-100 renameColumnName" 
                                value="` + title.text().substring(0, title.text().length - 1) + `">
                            </div>
                            <div class="col-4">
                              <button type="button" class="btn btn-light w-100 submitRenameColumnButton" 
                              data-column="` + $(this).attr('data-column') + `">Rename</button>
                            </div>
                         </div>`;

        parent.prepend(inputHtml).find('.renameColumnName').focus();
        e.preventDefault();
    });

    // rename column
    $(document).on("click", ".submitRenameColumnButton", function () {
        let columnId = $(this).attr('data-column');
        let columnName = $(this).parent().parent().find('.renameColumnName').val();

        renameColumn(columnId, columnName);
        renderAll(data);
    });

    // open remove column modal
    $(document).on("click", ".removeColumnButton", function () {
        $('#removeColumnModalText').text('Are you sure you want to permanently remove column ' + $(this).attr('data-name')
            + '? This will also permanently remove all of its contents!');
        $('#removeColumnConfirm').attr('data-columnid', $(this).attr('data-columnid'));
    });

    // remove column
    $(document).on("click", "#removeColumnConfirm", function () {
        deleteColumnById($(this).attr('data-columnid'));
        renderAll(data);
    });

    // add new board show form
    $(document).on("click", ".addNewBoardButton", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).parent().hide();

        var inputHtml = `<div class="form-inline">
                            <input type="text" class="form-control form-control-sm mx-1 newBoardName" placeholder="Board name">
                            <button type="button" class="btn btn-light btn-sm mx-1 cancelNewBoardButton">Cancel</button>
                            <button type="button" class="btn btn-light btn-sm submitNewBoardButton">Add</button>
                         </div>`;

        $(this).parent().parent().append(inputHtml).find('.newBoardName').focus();
    });

    // cancel adding new board
    $(document).on("click", ".cancelNewBoardButton", function () {
        renderAll(data);
    });

    // add new board
    $(document).on("click", ".submitNewBoardButton", function () {
        let newName = $(this).parent().find('.newBoardName').val();

        if (newName == null || newName === "") {
            newName = 'New board';
        }

        addBoard(newName)
        renderAll(data);
    });

    // open remove board modal
    $(document).on("click", ".removeBoardButton", function () {
        $('#removeBoardModalText').text('Are you sure you want to permanently remove board ' + $(this).attr('data-name')
            + '? This will also permanently remove all of its contents!');
        $('#removeBoardConfirm').attr('data-board', $(this).attr('data-board'));
    });

    // remove board
    $(document).on("click", "#removeBoardConfirm", function () {
        removeBoard($(this).attr('data-board'));
        renderAll(data);
    });

    // rename board show form
    $(document).on("click", ".renameBoardButton", function (e) {
        var inputHtml = `<div class="form-inline w-100 d-flex align-content-end">
                            <input type="text" class="form-control form-control-sm mx-1 w-75 renameBoardName" value="` + $(this).attr('data-name') + `">
                            <button type="button" class="btn btn-light btn-sm submitRenameBoardButton"
                            data-board="` + $(this).attr('data-board') + `">Rename</button>
                         </div>`;

        $(this).parent().parent().html(inputHtml);
    });

    // rename board
    $(document).on("click", ".submitRenameBoardButton", function () {
        let boardId = $(this).attr('data-board');
        let boardName = $(this).parent().parent().find('.renameBoardName').val();

        renameBoard(boardId, boardName);
        $(this).parent().parent().html("Board renamed. Close this modal window to see changes.");
    });

    //export data
    $('#exportDataButton').click(function (e) {
        e.preventDefault();
        download("mocboard.json", localStorage.getItem("mocboard"));
    });

    // import data
    $('#importDataConfirm').click(function (e) {
        var file = $("#importDataFile").get(0).files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function () {
                data = JSON.parse(reader.result);
                renderAll(data);
            }

            reader.readAsText(file, 'UTF-8');
        }
    });

    // populate boards list on manage boards modal show
    $("#manageBoardsModal").on('show.bs.modal', function () {
        $('#boardsList').empty();

        for (const board of getBoardList()) {
            let listItemHtml = `<div class="list-group-item border-hover" data-board="` + board.id + `" id="` + board.id + `">
                                    <div class="d-flex justify-content-between">
                                        <div class="align-self-center">
                                            ` + board.name + `
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-light renameBoardButton" data-board="` + board.id + `"
                                                data-name="` + board.name + `">Rename</button>
                                            <button type="button" class="btn btn-danger removeBoardButton" data-board="` + board.id + `" 
                                                data-name="` + board.name + `" data-dismiss="modal" data-toggle="modal" 
                                                data-target="#removeBoardModal">Delete</button>
                                        </div>
                                    </div>
                                </div>`;

            $('#boardsList').append(listItemHtml);
        }
    });

    // re-render all on manage boards modal close
    $('#manageBoardsModal').on('hide.bs.modal', function () {
        renderAll(data);
    })

    // column cards resize
    $(document).on("click", ".resize-xl", function (e) {
        updateColumnSize($(this).attr('data-columnid'), 'xl');
        renderAll(data);
        e.preventDefault();
    });

    // column cards resize
    $(document).on("click", ".resize-m", function (e) {
        updateColumnSize($(this).attr('data-columnid'), 'm');
        renderAll(data);
        e.preventDefault();
    });

    // column cards resize
    $(document).on("click", ".resize-s", function (e) {
        updateColumnSize($(this).attr('data-columnid'), 's');
        renderAll(data);
        e.preventDefault();
    });

    // current tab update
    $(document).on("click", ".nav-tabs li", function () {
        let boardIndex = $(this).index();
        data.active_board = $(this).index();
        localStorage.setItem("mocboard", JSON.stringify(data));
        $("#currentBoard").val(boardIndex);
        $('#tabs a.nav-link').removeClass('active').eq(boardIndex).addClass('active');
        $('#tabContent div.tab-pane').removeClass('show active').eq(boardIndex).addClass('show active');
    });

    // note modal display
    $(document).on("click", ".noteLink", function () {
        $('#noteModal').find('.modal-body').html(linkify($(this).attr('data-note')));
    });

    // collapse / expand column
    $(document).on("click", ".columnCollapser", function (e) {
        e.preventDefault();
        let icon = $(this).find('i');

        if (icon.hasClass('fa-compress')) {
            collapseColumn($(this).attr('data-column'));
        } else {
            expandColumn($(this).attr('data-column'));
        }

        renderAll(data);
    });

    // populate columns list on reorder columns modal show
    $("#reorderColumnsModal").on('show.bs.modal', function () {
        $('#columnsList').empty();

        for (const column of getColumnsByBoardIndex($('#currentBoard').val())) {
            let mocCounter = (column.mocs.length === 1) ? column.mocs.length + " MOC" : column.mocs.length + " MOCs";
            let listItemHtml = `<div class="list-group-item border-hover" data-column="` + column.id + `" id="` + column.id + `">
                                    <div class="align-self-center">
                                        ` + column.name + ` <span class="badge badge-charcoal">` + mocCounter + `</span>
                                    </div>
                                </div>`;

            $('#columnsList').append(listItemHtml);
        }
    });

    // re-render all on reorder columns modal close
    $('#reorderColumnsModal').on('hide.bs.modal', function () {
        renderAll(data);
    })

    // populate tags list on edit tags modal show
    $("#editTagsModal").on('show.bs.modal', function () {
        $('#tagsInput').val(data.tags.join('\n'));
    });

    // save tags list
    $(document).on("click", "#editTagsConfirm", function () {
        data.tags = multilineToArray($('#tagsInput').val()).slice(0, 20);
        renderAll(data);
    });

    // add video on help modal show
    $("#helpModal").on('show.bs.modal', function () {
        $('#helpModal').find('.modal-body').append(`<iframe className="ml-3" width="720" height="405"
            src="https://www.youtube.com/embed/RNiHQizZpRI?si=JdNtFxvqpz7m1GTn"
            title="YouTube video player" frameBorder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerPolicy="strict-origin-when-cross-origin" allowFullScreen></iframe>`);
    });

    // remove video on help modal close
    $("#helpModal").on('hide.bs.modal', function () {
        $('#helpModal').find('.modal-body').html(`<ol>
                    <li>The website is optimized for computers, not so much for mobile devices</li>
                    <li>All changes are automatically saved in your web browser's memory</li>
                    <li>You can move the data between browsers and devices using export/import option in the main menu</li>
                    <li>If you encounter any issue, first try simply reloading the page</li>
                    <li>For a detailed walkthrough, watch the video below:</li>
                </ol>`);
    });

// -------------- utilities --------------

    function findMocById(mocId) {
        for (const board of data.boards) {
            for (const column of board.columns) {
                for (const moc of column.mocs) {
                    if (moc.id === mocId) {
                        return moc;
                    }
                }
            }
        }
        return null;
    }

    function removeMocById(mocId) {
        data.boards.forEach(board => {
            board.columns.forEach(column => {
                const mocIndex = column.mocs.findIndex(moc => moc.id === mocId);
                if (mocIndex !== -1) {
                    column.mocs.splice(mocIndex, 1);
                }
            });
        });
    }

    function updateMocById(mocId, updatedProperties) {
        data.boards.forEach(board => {
            board.columns.forEach(column => {
                const moc = column.mocs.find(moc => moc.id === mocId);
                if (moc) {
                    Object.assign(moc, updatedProperties);
                }
            });
        });
    }

    function moveMocById(mocId, sourceColumnId, targetColumnId, targetIndex = null) {
        let mocToMove = null;

        data.boards.forEach(board => {
            board.columns.forEach(column => {
                if (column.id === sourceColumnId) {
                    const mocIndex = column.mocs.findIndex(moc => moc.id === mocId);
                    if (mocIndex !== -1) {
                        mocToMove = column.mocs.splice(mocIndex, 1)[0]; // Remove and store the MOC
                    }
                }
            });
        });

        if (mocToMove) {
            data.boards.forEach(board => {
                board.columns.forEach(column => {
                    if (column.id === targetColumnId) {
                        if (targetIndex !== null && targetIndex >= 0 && targetIndex <= column.mocs.length) {
                            column.mocs.splice(targetIndex, 0, mocToMove);
                        } else {
                            column.mocs.push(mocToMove);
                        }
                    }
                });
            });
        } else {
            console.log(`MOC with id ${mocId} not found in column ${sourceColumnId}.`);
        }

        renderAll(data);
    }

    function renameColumn(columnId, newName) {
        data.boards.forEach(board => {
            board.columns.forEach(column => {
                if (column.id === columnId) {
                    column.name = newName;
                }
            });
        });

        renderAll(data);
    }

    function deleteColumnById(columnId) {
        for (const board of data.boards) {
            const columnIndex = board.columns.findIndex(column => column.id === columnId);

            if (columnIndex !== -1) {
                board.columns.splice(columnIndex, 1);
                return;
            }
        }
        console.log(`Column with id ${columnId} not found.`);
    }

    function NAOnNull(string) {
        string = (string === "") ? "To be decided" : string;
        return string;
    }

    function uuidv4() {
        return "10000000-1000-4000-8000-100000000000".replace(/[018]/g, c =>
            (+c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> +c / 4).toString(16)
        );
    }

    function calculateDaysDifference(startDate) {
        const [year, month] = startDate.split("-").map(Number);  // Extract month and year
        const start = new Date(year, month - 1);  // Month is zero-indexed in JavaScript Date
        const now = new Date();
        const diffTime = Math.abs(now - start);  // Difference in milliseconds
        return Math.ceil(diffTime / (1000 * 60 * 60 * 24));  // Convert milliseconds to days
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

    function getBoardList() {
        return data.boards.map(board => ({
            id: board.id,
            name: board.name
        }));
    }

    function updateColumnSize(columnId, newSize) {
        for (const board of data.boards) {
            const column = board.columns.find(column => column.id === columnId);

            if (column) {
                column.size = newSize;
            }
        }
    }

    function updateColumnColor(columnId, color) {
        for (const board of data.boards) {
            const column = board.columns.find(column => column.id === columnId);

            if (column) {
                column.color = color;
            }
        }
    }

    function addBoard(boardName) {
        const newBoard = {
            name: boardName,
            id: uuidv4(),
            columns: [
                {
                    "name": "To do",
                    "id": uuidv4(),
                    "color": "light",
                    "size": "xl",
                    "state": "expanded",
                    "mocs": []
                },
                {
                    "name": "In progress",
                    "id": uuidv4(),
                    "color": "light",
                    "state": "expanded",
                    "size": "xl",
                    "mocs": []
                },
                {
                    "name": "Done",
                    "id": uuidv4(),
                    "color": "light",
                    "size": "xl",
                    "state": "expanded",
                    "mocs": []
                }
            ]
        };

        data.boards.push(newBoard);
    }

    function removeBoard(boardId) {
        data.boards = data.boards.filter(board => board.id !== boardId);
    }

    function moveBoardToIndex(boardId, newIndex) {
        const currentIndex = data.boards.findIndex(board => board.id === boardId);

        if (currentIndex === -1) {
            console.error("Board not found.");
            return;
        }
        if (newIndex < 0 || newIndex >= data.boards.length) {
            console.error("New index is out of bounds.");
            return;
        }

        const [boardToMove] = data.boards.splice(currentIndex, 1);
        data.boards.splice(newIndex, 0, boardToMove);
    }

    function renameBoard(boardId, newName) {
        const board = data.boards.find(board => board.id === boardId);

        if (!board) {
            console.error("Board not found.");
        }

        board.name = newName;
    }

    function moveMocToBoard(mocId, targetBoardId) {
        let mocToMove = null;
        let found = false;

        data.boards.forEach((board) => {
            if (found) return;
            board.columns.forEach((column) => {
                if (found) return;

                const mocIndex = column.mocs.findIndex(moc => moc.id === mocId);

                if (mocIndex !== -1) {
                    mocToMove = column.mocs.splice(mocIndex, 1)[0];
                    found = true;
                }
            });
        });

        if (!mocToMove) {
            console.error('MOC not found.');
            return;
        }

        const targetBoard = data.boards.find(board => board.id === targetBoardId);

        if (!targetBoard) {
            console.error('Target board not found.');
            return;
        }

        targetBoard.columns[0].mocs.push(mocToMove);
    }

    function findBoardIdByMocId(mocId) {
        for (const board of data.boards) {
            for (const column of board.columns) {
                if (column.mocs.some(moc => moc.id === mocId)) {
                    return board.id;
                }
            }
        }
        return null;
    }

    function collapseColumn(columnId) {
        data.boards.forEach(board => {
            board.columns.forEach(column => {
                if (column.id === columnId) {
                    column.state = "collapsed";
                }
            });
        });
    }

    function expandColumn(columnId) {
        data.boards.forEach(board => {
            board.columns.forEach(column => {
                if (column.id === columnId) {
                    column.state = "expanded";
                }
            });
        });
    }

    function getColumnsByBoardIndex(boardIndex) {
        if (boardIndex >= 0 && boardIndex < data.boards.length) {
            return data.boards[boardIndex].columns;
        } else {
            return [];
        }
    }

    function moveColumnById(columnId, targetIndex) {
        const board = data.boards.find(b => b.columns.some(column => column.id === columnId));

        if (!board) {
            console.error("Column not found in any board.");
        }

        const columns = board.columns;
        const currentIndex = columns.findIndex(column => column.id === columnId);

        if (currentIndex === -1) {
            console.error("Column not found.");
        }

        const [column] = columns.splice(currentIndex, 1);
        const adjustedIndex = Math.min(Math.max(targetIndex, 0), columns.length);
        columns.splice(adjustedIndex, 0, column);
    }

    function linkify(inputText) {
        var replacedText, replacePattern1, replacePattern2;

        //URLs starting with http://, https://, or ftp://
        replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
        replacedText = inputText.replace(replacePattern1, '<a href="$1" class="text-info" target="_blank">$1</a>');

        //URLs starting with "www." (without // before it, or it'd re-link the ones done above).
        replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
        replacedText = replacedText.replace(replacePattern2, '$1<a href="http://$2" target="_blank">$2</a>');

        return replacedText;
    }

    function multilineToArray(input) {
        var lines = input.split(/\n/);
        var result = [];
        for (var i = 0; i < lines.length; i++) {
            if (/\S/.test(lines[i])) {
                result.push($.trim(lines[i]));
            }
        }
        return result;
    }
});

