$(document).ready(function() {

  const hexes = {
  "White": "FFFFFF",
  "Very Light Gray": "E8E8E8",
  "Very Light Bluish Gray": "E4E8E8",
  "Light Bluish Gray": "AFB5C7",
  "Light Gray": "9C9C9C",
  "Dark Gray": "6B5A5A",
  "Dark Bluish Gray": "595D60",
  "Black": "212121",
  "Dark Red": "6A0E15",
  "Red": "B30006",
  "Reddish Orange": "FF5500",
  "Dark Salmon": "FF6326",
  "Salmon": "FF7D5D",
  "Coral": "FF8172",
  "Light Salmon": "FCC7B7",
  "Sand Red": "C58D80",
  "Dark Brown": "50372F",
  "Umber": "735442",
  "Brown": "6B3F22",
  "Reddish Brown": "82422A",
  "Light Brown": "99663E",
  "Medium Brown": "A16C42",
  "Fabuland Brown": "B3694E",
  "Dark Tan": "B89869",
  "Tan": "EED9A4",
  "Light Nougat": "FECCB0",
  "Medium Tan": "FBC685",
  "Nougat": "FFAF7D",
  "Medium Nougat": "E3A05B",
  "Dark Nougat": "CE7942",
  "Sienna": "EA8339",
  "Fabuland Orange": "EF9121",
  "Earth Orange": "E6881D",
  "Dark Orange": "B35408",
  "Rust": "B24817",
  "Neon Orange": "FA5947",
  "Orange": "FF7E14",
  "Medium Orange": "FFA531",
  "Light Orange": "FFBC36",
  "Bright Light Orange": "FFC700",
  "Very Light Orange": "FFDCA4",
  "Dark Yellow": "DD982E",
  "Yellow": "FFE001",
  "Light Yellow": "FEE89F",
  "Bright Light Yellow": "FFF08C",
  "Neon Yellow": "FFFC00",
  "Neon Green": "DBF355",
  "Light Lime": "ECEEBD",
  "Yellowish Green": "E7F2A7",
  "Medium Lime": "DFE000",
  "Lime": "C4E000",
  "Fabuland Lime": "ADD237",
  "Olive Green": "ABA953",
  "Dark Olive Green": "76753F",
  "Dark Green": "2E5543",
  "Green": "00923D",
  "Bright Green": "10CB31",
  "Medium Green": "91DF8C",
  "Light Green": "D7EED1",
  "Sand Green": "A2BFA3",
  "Dark Turquoise": "00A29F",
  "Light Turquoise": "00C5BC",
  "Aqua": "BCE5DC",
  "Light Aqua": "CFEFEA",
  "Dark Blue": "243757",
  "Blue": "0057A6",
  "Dark Azure": "009FE0",
  "Little Robots Blue": "5DBFE4",
  "Maersk Blue": "7DC1D8",
  "Medium Azure": "6ACEE0",
  "Sky Blue": "8AD4E1",
  "Medium Blue": "82ADD8",
  "Bright Light Blue": "BCD1ED",
  "Light Blue": "C8D9E1",
  "Sand Blue": "8899AB",
  "Dark Blue-Violet": "2032B0",
  "Violet": "3448A4",
  "Blue-Violet": "506CEF",
  "Lilac": "7862CE",
  "Medium Violet": "9391E4",
  "Light Lilac": "CDCCEE",
  "Light Violet": "C9CAE2",
  "Dark Purple": "5F2683",
  "Purple": "7A238D",
  "Light Purple": "AF3195",
  "Medium Lavender": "C689D9",
  "Lavender": "D3BDE3",
  "Clikits Lavender": "E0AAD9",
  "Sand Purple": "B57DA5",
  "Magenta": "B72276",
  "Dark Pink": "EF5BB3",
  "Medium Dark Pink": "F785B1",
  "Bright Pink": "F7BCDA",
  "Pink": "F5CDD6",
  "Light Pink": "F2D3D1",
  "Trans-Clear": "EEEEEE",
  "Trans-Brown (Old Trans-Black)": "939484",
  "Trans-Black (2023)": "777777",
  "Trans-Red": "9C0010",
  "Trans-Neon Orange": "FF4231",
  "Trans-Orange": "E96F01",
  "Trans-Light Orange": "E99A3A",
  "Trans-Neon Yellow": "FFD700",
  "Trans-Yellow": "EBF72D",
  "Trans-Neon Green": "C0F500",
  "Trans-Bright Green": "10Cb31",
  "Trans-Light Green": "94E5AB",
  "Trans-Light Bright Green": "71EB54",
  "Trans-Green": "217625",
  "Trans-Dark Blue": "00296B",
  "Trans-Medium Blue": "76A3C8",
  "Trans-Light Blue": "68BCC5",
  "Trans-Aqua": "B7C8BF",
  "Trans-Light Purple": "B97AB1",
  "Trans-Medium Purple": "9C41B6",
  "Trans-Purple": "5525B7",
  "Trans-Dark Pink": "CE1d9b",
  "Trans-Pink": "FF8298",
  "Chrome Gold": "f1f2e1",
  "Chrome Silver": "DCDCDC",
  "Chrome Antique Brass": "645a4c",
  "Chrome Black": "544E4F",
  "Chrome Blue": "5C66A4",
  "Chrome Green": "3CB371",
  "Chrome Pink": "aa4d8e",
  "Pearl White": "FFFFFF",
  "Pearl Very Light Gray": "D4D2CD",
  "Pearl Light Gray": "ACB7C0",
  "Flat Silver": "8D949C",
  "Bionicle Silver": "A59287",
  "Pearl Dark Gray": "666660",
  "Pearl Black": "282725",
  "Pearl Light Gold": "E7AE5A",
  "Pearl Gold": "E79E1D",
  "Reddish Gold": "E7891B",
  "Bionicle Gold": "B9752F",
  "Flat Dark Gold": "AD7118",
  "Reddish Copper": "D06926",
  "Copper": "AC6D52",
  "Bionicle Copper": "985750",
  "Pearl Brown": "815542",
  "Pearl Red": "E54952",
  "Pearl Green": "13A452",
  "Pearl Blue": "3977C7",
  "Pearl Sand Blue": "868FAA",
  "Pearl Sand Purple": "B5A1BA",
  "Satin Trans-Clear": "FFFFFF",
  "Satin Trans-Brown": "939484",
  "Satin Trans-Yellow": "EBF72D",
  "Satin Trans-Bright Green": "7fe15b",
  "Satin Trans-Light Blue": "68BCC5",
  "Satin Trans-Dark Blue": "1552e2",
  "Satin Trans-Purple": "8320B7",
  "Satin Trans-Dark Pink": "CE1d9b",
  "Metallic Silver": "C0C0C0",
  "Metallic Green": "bdb573",
  "Metallic Gold": "B8860B",
  "Metallic Copper": "C58259",
  "Milky White": "d4d3dd",
  "Glow In Dark White": "d9d9d9",
  "Glow In Dark Opaque": "d4d5c9",
  "Glow In Dark Trans": "bdc6ad",
  "Glitter Trans-Clear": "b2adaa",
  "Glitter Trans-Orange": "D04010",
  "Glitter Trans-Neon Green": "C0F500",
  "Glitter Trans-Light Blue": "68BCC5",
  "Glitter Trans-Purple": "3A2B82",
  "Glitter Trans-Dark Pink": "CE1d9b",
  "Speckle Black-Silver": "7C7E7C",
  "Speckle Black-Gold": "AB9421",
  "Speckle Black-Copper": "5F4E47",
  "Speckle DBGray-Silver": "4A6363",
  "Mx White": "FFFFFF",
  "Mx Light Bluish Gray": "AfB5C7",
  "Mx Light Gray": "9C9C9C",
  "Mx Charcoal Gray": "595D60",
  "Mx Tile Gray": "6B5A5A",
  "Mx Black": "000000",
  "Mx Tile Brown": "330000",
  "Mx Terracotta": "5C5030",
  "Mx Brown": "907450",
  "Mx Buff": "DEC69C",
  "Mx Red": "B52C20",
  "Mx Pink Red": "F45C40",
  "Mx Orange": "F47B30",
  "Mx Light Orange": "F7AD63",
  "Mx Light Yellow": "FFE371",
  "Mx Ochre Yellow": "FED557",
  "Mx Lemon": "BDC618",
  "Mx Pastel Green": "7DB538",
  "Mx Olive Green": "7C9051",
  "Mx Aqua Green": "27867E",
  "Mx Teal Blue": "467083",
  "Mx Tile Blue": "0057A6",
  "Mx Medium Blue": "61AFFF",
  "Mx Pastel Blue": "68AECE",
  "Mx Violet": "BD7D85",
  "Mx Pink": "F785B1",
  "Mx Clear": "FFFFFF",
  "Mx Foil Dark Gray": "595D60",
  "Mx Foil Light Gray": "9C9C9C",
  "Mx Foil Dark Green": "006400",
  "Mx Foil Light Green": "7DB538",
  "Mx Foil Dark Blue": "0057A6",
  "Mx Foil Light Blue": "68AECE",
  "Mx Foil Violet": "4B0082",
  "Mx Foil Red": "8B0000",
  "Mx Foil Yellow": "FED557",
  "Mx Foil Orange": "F7AD63"
};



var htmlString = `<div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                    HEX
                                    <div class="mr-3">CLR</div>
                                    <div class="text-right">QNT</div>
                                </div>`;

var htmlString2 = `<div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                                                    HEX
                                                                    <div class="mr-3">CLR</div>
                                                                </div>`;

var commonColors = new Map();

    //Function to ajax fire
    async function lookupItem(index, itemId){

        // get data
        return await $.get('api_get_colors.php', {item: itemId},
          function(response){
            $("#card" + index).text("Checking...");

            if (response["count"] == "0") {
              $("#card" + index).html("Part with that ID wasn't found using Rebrickable API. Please make sure the ID is correct.");
              return;
            }

              var commonColorsNext = new Map();
              var data = response["results"];
              data = data.sort(function compare(a, b) {
                if ( a.num_sets > b.num_sets ){
                  return -1;
                }
                if ( a.num_sets < b.num_sets ){
                  return 1;
                }
                return 0;
              });

              $("#img" + index).html('<img src="' + data[0]["part_img_url"] + '" style="width: 100px; height: 100px;" class="d-block mx-auto mt-2">');
              var outputString = 'Available colors:<div class="list-group list-group-flush mt-3">';

              data.forEach((item, i) => {
                let qntString = (item["num_sets"] > 1) ? item["num_sets"] + " sets" : item["num_sets"] + " set";

                var output = htmlString
                  .replace('HEX', '<div style="background-color: #' + hexes[item["color_name"]] + '; width: 20px; height: 20px; border-radius: 10px;"></div>')
                  .replace('CLR', item["color_name"])
                  .replace('QNT', qntString);

                outputString += output;

                if (index == 1) {
                  commonColors.set(item["color_name"], item["num_sets"]);
                } else {
                  commonColorsNext.set(item["color_name"], item["num_sets"]);
                }
              });

              if (index > 1) {
                commonColors.forEach((value, key) => {
                  if (!commonColorsNext.has(key)) {
                    commonColors.delete(key);
                  } else {
                    if (commonColorsNext.get(key) < value) {
                      commonColors.set(key, commonColorsNext.get(key));
                    }
                  }
                });
              }

              $("#card" + index).html(outputString + "</div>");

              var resultString = "";

              commonColors.forEach((value, key) => {
                var output = htmlString2
                  .replace('HEX', '<div style="background-color: #' + hexes[key] + '; width: 20px; height: 20px; border-radius: 10px;"></div>')
                  .replace('CLR', key);

                resultString += output;
              });

              if (resultString == "") {
                resultString = "No common colors found";
              }

              $("#result").html('Common colors:<div class="list-group list-group-flush mt-3">' + resultString + "</div>");
          });
  }

  async function run() {
    for (var i = 1; i <= 6; i++) {
      if ($("#itemId" + i).val().length > 0) {
        $("#card" + i).text("Queued...");
        await lookupItem(i, $("#itemId" + i).val());
      }
    }
    $("#getColors").text("Go").prop("disabled", false);
  }

  // check them colors!
$("#getColors").click(async function(){
    $(this).text("Checking...").prop("disabled", true);
    $(".resultCard").html("");
    $(".resultImg").html("");
    $("#result").html("");
    run();
});

});
