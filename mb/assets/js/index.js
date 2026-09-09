!(function ($) {

    // data handling
    const initialData = {
        "boards": [
            {
                "name": "MOCs",
                "id": "mocs",
                "columns": [
                    {
                        "name": "To do",
                        "color": "light",
                        "mocs": [
                            {
                                "name": "Your sample MOC",
                                "started": new Date().getFullYear(),
                                "completion": 50,
                                "image": "",
                                "powerSupply": "",
                                "remoteControl": "",
                                "lights": "",
                                "stickers": "",
                                "partsList": "",
                                "attachments": []
                            }
                        ]
                    }
                ]
            },
            {
                "name": "LEGO Ideas Projects",
                "id": "ideas",
                "columns": [
                    {
                        "name": "To do",
                        "color": "light",
                        "mocs": [
                            {
                                "name": "Your sample MOC",
                                "started": new Date().getFullYear(),
                                "completion": 50,
                                "image": "",
                                "powerSupply": "",
                                "remoteControl": "",
                                "lights": "",
                                "stickers": "",
                                "partsList": "",
                                "attachments": []
                            }
                        ]
                    }
                ]
            }
        ]
    }

    var data = initialData;

    console.log(data.boards[0].columns[0].mocs[0].started);

    function renderBoards(data) {
        $('#wrapper').html('x');

        console.log($('#tabs').html())

    }

})(jQuery);
