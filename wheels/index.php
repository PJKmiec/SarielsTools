<?php
  define("TOOL", "wheels");
  define("TITLE", "LEGO Wheels Chart");
  require_once('../common/php/header.php');
 ?>
 <link rel="stylesheet" href="style.css?ver=1">

          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <h3 class="page-title text-info"><span class="material-icons align-middle" style="font-size: 3rem">album</span> Wheels Chart</h3>
              </div>
            </div>
            <!-- End Page Header -->

            <!-- Android app info -->
            <div class="alert alert-info alert-dismissible fade show  text-center" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span></button> Now available as free Android app:
              <a href='https://play.google.com/store/apps/details?id=pl.sariel.legowheelstable&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'
              target='_blank'><img alt='Get it on Google Play' src='http://tools.sariel.pl/common/en_badge_web_generic.png' width="168" height="50" class="ml-3" /></a>
            </div>

            <!-- Default Light Table -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <div class="form-check form-check-inline">
                      <h6 class="m-0">Show in the list:</h6>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showRoadBox" checked>road tires</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showOffroadBox" checked>off-road tires</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showBikeBox" checked>bike tires</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label><input class="form-check-input" type="checkbox" id="showSinglePieceBox" checked>single-piece wheels</label>
                    </div>
                  </div>
                  <div class="card-body">

                    <span class="text-muted">Move your cursor over any item to see subparts: rim and tire (does not apply to single-piece wheels). When subparts are shown, move your cursor over a rim to see the tires it fits, or over a tire to see the rims it fits. Click any image to open respective Bricklink's catalog page in a new tab in your browser
                    <br /><br />You can sort the chart by clicking fields from 'Total diameter' to 'Weight'. Click a field again to toggle between ascending and descending sorting.</span>

                    <table class="table mt-3 table-hover">
                      <thead class="bg-secondary text-white">
                        <tr>
                          <th scope="col" class="border-0 text-center">Wheel:</th>
                					<th data-sort="float" scope="col" class="border-0 text-center sortable">Total diameter:<span class="material-icons align-bottom">arrow_drop_up</span></th>
                					<th data-sort="float" scope="col" class="border-0 text-center sortable">Tire width:<span class="material-icons align-bottom"></span></th>
                					<th data-sort="float" scope="col" class="border-0 text-center sortable">Rim diameter:<span class="material-icons align-bottom"></span></th>
                					<th data-sort="float" scope="col" class="border-0 text-center sortable">Rim width:<span class="material-icons align-bottom"></span></th>
                					<th data-sort="float" scope="col" class="border-0 text-center sortable">Weight:<span class="material-icons align-bottom"></span></th>
                          <th scope="col" class="border-0 text-center">Rarity:</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php

                        $wheels = array(
                          '42610c02' => array(
                            'type' => 'road',
                            'id' => '42610c02',
                            'img' => 'w42610c02',
                            'rim' => '42610',
                            'rim_alternatives' => array('50945', '42611', '51011u', '92409'),
                            'tire' => '50945',
                            'tire_alternatives' => array('50944', '50944pb02', '50944pb01', '30838', '30838pb01', '93593', '93595', '93595pb03', '93595pb01', '93595pb02', '93594', '42610'),
                            'diameter' => 14,
                            'tire_width' => 6,
                            'rim_diameter' => 11,
                            'rim_width' => 8,
                            'weight' => 0.75,
                            'rarity' => 'common'
                          ),
                          '4265cc01' => array(
                            'type' => 'road',
                            'id' => '4265cc01',
                            'img' => 'w42117',
                            'rim' => '4265c',
                            'tire' => '59895',
                            'diameter' => 14,
                            'tire_width' => 7,
                            'rim_diameter' => 7,
                            'rim_width' => 4,
                            'weight' => 0.5,
                            'rarity' => 'uncommon'
                          ),
                          '42610c03' => array(
                            'type' => 'road',
                            'id' => '42610c03',
                            'img' => 'w42610c03',
                            'rim' => '42610',
                            'rim_alternatives' => array('50945', '42611', '51011u', '92409'),
                            'tire' => '92409',
                            'tire_alternatives' => array('50944', '50944pb02', '50944pb01', '30838', '30838pb01', '93593', '93595', '93595pb03', '93595pb01', '93595pb02', '93594', '42610'),
                            'diameter' => 17,
                            'tire_width' => 6,
                            'rim_diameter' => 11,
                            'rim_width' => 8,
                            'weight' => 1.1,
                            'rarity' => 'common'
                          ),
                          '4288' => array(
                            'type' => 'single',
                            'id' => '4288',
                            'img' => 'w4288',
                            'diameter' => 20,
                            'rim_diameter' => 20,
                            'weight' => 3,
                            'rarity' => 'common'
                          ),
                          '6118' => array(
                            'type' => 'single',
                            'id' => '6118',
                            'img' => 'w6118',
                            'diameter' => 23,
                            'rim_diameter' => 23,
                            'rim_width' => 23,
                            'weight' => 4,
                            'rarity' => 'common'
                          ),
                          '55981c06' => array(
                            'type' => 'road',
                            'id' => '55981c06',
                            'img' => 'w55981c06',
                            'rim' => '55981',
                            'rim_alternatives' => array('18977', '30648', '89201', '30391', '92402', '58090', '35578', '56891', 'x939', 'bb0661'),
                            'tire' => '89201',
                            'tire_alternatives' => array('18976', '66727', '30285', '51377', '55982', '55981'),
                            'diameter' => 24,
                            'tire_width' => 13.5,
                            'rim_diameter' => 17.5,
                            'rim_width' => 16,
                            'weight' => 3,
                            'rarity' => 'common'
                          ),
                          '3482c01' => array(
                            'type' => 'road',
                            'id' => '3482c01',
                            'img' => 'w3482c01',
                            'rim' => '3482',
                            'rim_alternatives' => array('3634', '3483', '2346', '132old', '132hollow', '132teeth', 'x486', 'x486a'),
                            'tire' => '3483',
                            'tire_alternatives' => array('4180c02', 'carbasemia', '2574', '4259', '6248', '30155', 'bb0019', '7039', '7039c', '7039b', '7039d', '3482', 'bb0046'),
                            'diameter' => 24,
                            'tire_width' => 7,
                            'rim_diameter' => 17,
                            'rim_width' => 7,
                            'weight' => 3,
                            'rarity' => 'common'
                          ),
                          '4185c01' => array(
                            'type' => 'bike',
                            'id' => '4185c01',
                            'img' => 'w4185c01',
                            'rim' => '4185',
                            'rim_alternatives' => array('2815'),
                            'tire' => '2815',
                            'tire_alternatives' => array('4185'),
                            'diameter' => 30,
                            'tire_width' => 3,
                            'rim_diameter' => 24,
                            'rim_width' => 3,
                            'weight' => 2,
                            'rarity' => 'common'
                          ),
                          '3482c02' => array(
                            'type' => 'road',
                            'id' => '3482c02',
                            'img' => 'w3482c02',
                            'rim' => '3482',
                            'rim_alternatives' => array('3634', '3483', '2346', '132old', '132hollow', '132teeth', 'x486', 'x486a'),
                            'tire' => '2346',
                            'tire_alternatives' => array('4180c02', 'carbasemia', '2574', '4259', '6248', '30155', 'bb0019', '7039', '7039c', '7039b', '7039d', '3482', 'bb0046'),
                            'diameter' => 30,
                            'tire_width' => 10,
                            'rim_diameter' => 17,
                            'rim_width' => 7,
                            'weight' => 6,
                            'rarity' => 'common'
                          ),
                          '55982c03' => array(
                            'type' => 'road',
                            'id' => '55982c03',
                            'img' => 'w55982c03',
                            'rim' => '55982',
                            'rim_alternatives' => array('18977', '30648', '89201', '30391', '92402', '58090', '35578', '56891', 'x939', 'bb0661'),
                            'tire' => '58090',
                            'tire_alternatives' => array('18976', '66727', '30285', '51377', '55982', '55981'),
                            'diameter' => 30,
                            'tire_width' => 14,
                            'rim_diameter' => 17.5,
                            'rim_width' => 16,
                            'weight' => 9,
                            'rarity' => 'common'
                          ),
                          '55981c03' => array(
                            'type' => 'road',
                            'id' => '55981c03',
                            'img' => 'w55981c03',
                            'rim' => '55981',
                            'rim_alternatives' => array('18977', '30648', '89201', '30391', '92402', '58090', '35578', '56891', 'x939', 'bb0661'),
                            'tire' => '58090',
                            'tire_alternatives' => array('18976', '66727', '30285', '51377', '55982', '55981'),
                            'diameter' => 30,
                            'tire_width' => 14,
                            'rim_diameter' => 17.5,
                            'rim_width' => 16,
                            'weight' => 9,
                            'rarity' => 'common'
                          ),
                          '55981c05' => array(
                            'type' => 'offroad',
                            'id' => '55981c05',
                            'img' => 'w55981c05',
                            'rim' => '55981',
                            'rim_alternatives' => array('18977', '30648', '89201', '30391', '92402', '58090', '35578', '56891', 'x939', 'bb0661'),
                            'tire' => '92402',
                            'tire_alternatives' => array('18976', '66727', '30285', '51377', '55982', '55981'),
                            'diameter' => 30.4,
                            'tire_width' => 14,
                            'rim_diameter' => 17.5,
                            'rim_width' => 16,
                            'weight' => 8,
                            'rarity' => 'common'
                          ),
                          '2994c01' => array(
                            'type' => 'road',
                            'id' => '2994c01',
                            'img' => 'w2994c01',
                            'rim' => '2994',
                            'rim_alternatives' => array('6578'),
                            'tire' => '6578',
                            'tire_alternatives' => array('2994'),
                            'diameter' => 30.5,
                            'tire_width' => 14,
                            'rim_diameter' => 24,
                            'rim_width' => 14,
                            'weight' => 6,
                            'rarity' => 'common'
                          ),
                          '56145c03' => array(
                            'type' => 'road',
                            'id' => '56145c03',
                            'img' => 'w56145c03',
                            'rim' => '56145',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', 'x1681'),
                            'tire' => '55978',
                            'tire_alternatives' => array('44292', '54087', '56145'),
                            'diameter' => 37,
                            'tire_width' => 21,
                            'rim_diameter' => 30,
                            'rim_width' => 20,
                            'weight' => 10,
                            'rarity' => 'common'
                          ),
                          '2695c01' => array(
                            'type' => 'road',
                            'id' => '2695c01',
                            'img' => 'w2695c01',
                            'rim' => '2695',
                            'rim_alternatives' => array('2696'),
                            'tire' => '2696',
                            'tire_alternatives' => array('2695'),
                            'diameter' => 42,
                            'tire_width' => 13,
                            'rim_diameter' => 30,
                            'rim_width' => 13,
                            'weight' => 14,
                            'rarity' => 'common'
                          ),
                          '30324' => array(
                            'type' => 'single',
                            'id' => '30324',
                            'img' => 'w30324',
                            'diameter' => 42.5,
                            'rim_diameter' => 42.5,
                            'rim_width' => 27.5,
                            'weight' => 12,
                            'rarity' => 'uncommon'
                          ),
                          '56145c04' => array(
                            'type' => 'offroad',
                            'id' => '56145c04',
                            'img' => 'w56145c04',
                            'rim' => '56145',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', 'x1681'),
                            'tire' => '61481',
                            'tire_alternatives' => array('44292', '54087', '56145'),
                            'diameter' => 43,
                            'tire_width' => 26,
                            'rim_diameter' => 30,
                            'rim_width' => 20,
                            'weight' => 13,
                            'rarity' => 'common'
                          ),
                          '6580c01' => array(
                            'type' => 'offroad',
                            'id' => '6580c01',
                            'img' => 'w2996c01',
                            'rim' => '6580',
                            'rim_alternatives' => array('6579'),
                            'tire' => '6579',
                            'tire_alternatives' => array('6580', '6580a'),
                            'diameter' => 43,
                            'tire_width' => 28,
                            'rim_diameter' => 30,
                            'rim_width' => 22.5,
                            'weight' => 18,
                            'rarity' => 'common'
                          ),
                          '56904c02' => array(
                            'type' => 'road',
                            'id' => '56904c02',
                            'img' => '56904c02',
                            'rim' => '56904',
                            'rim_alternatives' => array('56898', '30699'),
                            'tire' => '30699',
                            'tire_alternatives' => array('56904'),
                            'diameter' => 43.2,
                            'tire_width' => 14,
                            'rim_diameter' => 30,
                            'rim_width' => 14,
                            'weight' => 13,
                            'rarity' => 'uncommon'
                          ),
                          '56145c01' => array(
                            'type' => 'road',
                            'id' => '56145c01',
                            'img' => 'w56145c01',
                            'rim' => '56145',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', 'x1681'),
                            'tire' => '44309',
                            'tire_alternatives' => array('44292', '54087', '56145'),
                            'diameter' => 43.2,
                            'tire_width' => 21,
                            'rim_diameter' => 30,
                            'rim_width' => 20,
                            'weight' => 15,
                            'rarity' => 'common'
                          ),
                          '56904c01' => array(
                            'type' => 'road',
                            'id' => '56904c01',
                            'img' => 'w56904c01',
                            'rim' => '56904',
                            'rim_alternatives' => array('56898', '30699'),
                            'tire' => '56898',
                            'tire_alternatives' => array('56904'),
                            'diameter' => 43.2,
                            'tire_width' => 13,
                            'rim_diameter' => 30.5,
                            'rim_width' => 14,
                            'weight' => 18,
                            'rarity' => 'common'
                          ),
                          '44292c01' => array(
                            'type' => 'offroad',
                            'id' => '44292c01',
                            'img' => 'w44292c01',
                            'rim' => '44292',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', '70695', 'x1681'),
                            'tire' => '44308',
                            'tire_alternatives' => array('44292', '66155', '54087', '42716', '56145'),
                            'diameter' => 43.2,
                            'tire_width' => 22,
                            'rim_diameter' => 30.4,
                            'rim_width' => 20,
                            'weight' => 17.5,
                            'rarity' => 'uncommon'
                          ),
                          '4266c01' => array(
                            'type' => 'offroad',
                            'id' => '4266c01',
                            'img' => 'w4266c01',
                            'rim' => '4266',
                            'rim_alternatives' => array('2857', '4267'),
                            'tire' => '2857',
                            'tire_alternatives' => array('4266'),
                            'diameter' => 49,
                            'tire_width' => 19,
                            'rim_diameter' => 30.5,
                            'rim_width' => 19,
                            'weight' => 17,
                            'rarity' => 'uncommon'
                          ),
                          '56145c05' => array(
                            'type' => 'road',
                            'id' => '56145c05',
                            'img' => 'w56145c05',
                            'rim' => '56145',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', 'x1681'),
                            'tire' => '15413',
                            'tire_alternatives' => array('44292', '54087', '42716', '56145'),
                            'diameter' => 49.5,
                            'tire_width' => 20,
                            'rim_diameter' => 30,
                            'rim_width' => 20,
                            'weight' => 17,
                            'rarity' => 'common'
                          ),
                          '42716' => array(
                            'type' => 'road',
                            'id' => '42716',
                            'img' => 'mustang',
                            'rim' => '42716',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', 'x1681'),
                            'tire' => '15413',
                            'tire_alternatives' => array('44292', '54087', '42716', '56145'),
                            'diameter' => 49.5,
                            'tire_width' => 20,
                            'rim_diameter' => 30.4,
                            'rim_width' => 20,
                            'weight' => 16,
                            'rarity' => 'rare'
                          ),
                          '56145c02' => array(
                            'type' => 'offroad',
                            'id' => '56145c02',
                            'img' => 'w56145c02',
                            'rim' => '56145',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', 'x1681'),
                            'tire' => '55976',
                            'tire_alternatives' => array('44292', '54087', '42716', '56145'),
                            'diameter' => 56,
                            'tire_width' => 24,
                            'rim_diameter' => 30,
                            'rim_width' => 20,
                            'weight' => 18,
                            'rarity' => 'common'
                          ),
                          '41896c04' => array(
                            'type' => 'road',
                            'id' => '41896c04',
                            'img' => 'w41896c04',
                            'rim' => '41896',
                            'rim_alternatives' => array('41897', '61480', '41893', '45982', '18450'),
                            'tire' => '41897',
                            'tire_alternatives' => array('41896', '56908'),
                            'diameter' => 56,
                            'tire_width' => 28,
                            'rim_diameter' => 43,
                            'rim_width' => 26,
                            'weight' => 23,
                            'rarity' => 'uncommon'
                          ),
                          '56145c06' => array(
                            'type' => 'offroad',
                            'id' => '56145c06',
                            'img' => 'w70695',
                            'rim' => '56145',
                            'rim_alternatives' => array('55978', '44308', '44309', '61481', '15413', '55976', '70695', 'x1681'),
                            'tire' => '70695',
                            'tire_alternatives' => array('44292', '66155', '54087', '42716', '56145'),
                            'diameter' => 56,
                            'tire_width' => 26,
                            'rim_diameter' => 30.4,
                            'rim_width' => 20,
                            'weight' => 18,
                            'rarity' => 'rare'
                          ),
                          '86652c01' => array(
                            'type' => 'road',
                            'id' => '86652c01',
                            'img' => 'w86652c01',
                            'rim' => '86652',
                            'rim_alternatives' => array('32019'),
                            'tire' => '32019',
                            'tire_alternatives' => array('32020', '86652'),
                            'diameter' => 62.4,
                            'tire_width' => 20,
                            'rim_diameter' => 43,
                            'rim_width' => 17.5,
                            'weight' => 46,
                            'rarity' => 'uncommon'
                          ),
                          '4266c02' => array(
                            'type' => 'offroad',
                            'id' => '4266c02',
                            'img' => 'w4266c02',
                            'rim' => '4266',
                            'rim_alternatives' => array('2857', '4267'),
                            'tire' => '4267',
                            'tire_alternatives' => array('4266'),
                            'diameter' => 63,
                            'tire_width' => 19,
                            'rim_diameter' => 30,
                            'rim_width' => 19,
                            'weight' => 27,
                            'rarity' => 'uncommon'
                          ),
                          '32057c01' => array(
                            'type' => 'bike',
                            'id' => '32057c01',
                            'img' => 'w32057c01',
                            'rim' => '32057',
                            'rim_alternatives' => array('32076'),
                            'tire' => '32076',
                            'tire_alternatives' => array('32057'),
                            'diameter' => 67,
                            'tire_width' => 14,
                            'rim_diameter' => 58.5,
                            'rim_width' => 14,
                            'weight' => 25,
                            'rarity' => 'rare'
                          ),
                          '32077c01' => array(
                            'type' => 'bike',
                            'id' => '32077c01',
                            'img' => 'w32077c01',
                            'rim' => '32077',
                            'rim_alternatives' => array('32078'),
                            'tire' => '32078',
                            'tire_alternatives' => array('32077'),
                            'diameter' => 67,
                            'tire_width' => 27.5,
                            'rim_diameter' => 58.5,
                            'rim_width' => 27.5,
                            'weight' => 33,
                            'rarity' => 'uncommon'
                          ),
                          '52985' => array(
                            'type' => 'road',
                            'id' => '52985',
                            'img' => 'w52985',
                            'rim' => '56908',
                            'rim_alternatives' => array('41897', '61480', '41893', '45982', '18450'),
                            'tire' => '52985',
                            'tire_alternatives' => array('41896', '56908'),
                            'diameter' => 68.7,
                            'tire_width' => 27,
                            'rim_diameter' => 43.2,
                            'rim_width' => 26,
                            'weight' => 31,
                            'rarity' => 'rare'
                          ),
                          '41896c03' => array(
                            'type' => 'offroad',
                            'id' => '41896c03',
                            'img' => 'w41896c03',
                            'rim' => '41896',
                            'rim_alternatives' => array('41897', '61480', '41893', '45982', '18450'),
                            'tire' => '61480',
                            'tire_alternatives' => array('41896', '56908'),
                            'diameter' => 68.7,
                            'tire_width' => 33,
                            'rim_diameter' => 43,
                            'rim_width' => 26,
                            'weight' => 30,
                            'rarity' => 'uncommon'
                          ),
                          '44777' => array(
                            'type' => 'single',
                            'id' => '44777',
                            'img' => 'w44777',
                            'diameter' => 68.8,
                            'rim_diameter' => 68.8,
                            'rim_width' => 35,
                            'weight' => 18,
                            'rarity' => 'rare'
                          ),
                          '44772c01' => array(
                            'type' => 'road',
                            'id' => '44772c01',
                            'img' => 'w44772c04',
                            'rim' => '15038',
                            'rim_alternatives' => array('44771', '2997', 'x1825', '92912', '54120'),
                            'tire' => '44771',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '2998'),
                            'diameter' => 68.8,
                            'tire_width' => 36,
                            'rim_diameter' => 56,
                            'rim_width' => 34,
                            'weight' => 39,
                            'rarity' => 'common'
                          ),
                          '41896c02' => array(
                            'type' => 'offroad',
                            'id' => '41896c02',
                            'img' => 'w41896c02',
                            'rim' => '41896',
                            'rim_alternatives' => array('41897', '61480', '41893', '45982', '18450'),
                            'tire' => '41893',
                            'tire_alternatives' => array('41896', '56908'),
                            'diameter' => 68.8,
                            'tire_width' => 36,
                            'rim_diameter' => 43,
                            'rim_width' => 34,
                            'weight' => 35,
                            'rarity' => 'uncommon'
                          ),
                          '2996c01' => array(
                            'type' => 'offroad',
                            'id' => '2996c01',
                            'img' => 'w2996c01',
                            'rim' => '2996',
                            'rim_alternatives' => array('2995'),
                            'tire' => '2995',
                            'tire_alternatives' => array('2996'),
                            'diameter' => 68.8,
                            'tire_width' => 39,
                            'rim_diameter' => 43,
                            'rim_width' => 30,
                            'weight' => 59,
                            'rarity' => 'uncommon'
                          ),
                          '49294' => array(
                            'type' => 'road',
                            'id' => '49294',
                            'img' => 'w42125',
                            'rim' => '49294',
                            'rim_alternatives' => array('23798', '44771', '2997', 'x1825', '92912', '54120'),
                            'tire' => '44771',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '15038pb02', '49294', '2998'),
                            'diameter' => 68.8,
                            'tire_width' => 36,
                            'rim_diameter' => 56,
                            'rim_width' => 34,
                            'weight' => 39,
                            'rarity' => 'rare'
                          ),
                          '2573' => array(
                            'type' => 'single',
                            'id' => '2573',
                            'img' => 'w2573',
                            'diameter' => 71,
                            'rim_diameter' => 71,
                            'rim_width' => 46,
                            'weight' => 37,
                            'rarity' => 'rare'
                          ),
                          '69909' => array(
                            'type' => 'offroad',
                            'id' => '69909',
                            'img' => 'w69909',
                            'rim' => '56908',
                            'rim_alternatives' => array('41897', '52985', '61480', '41893', '69909', '45982', '18450'),
                            'tire' => '69909',
                            'tire_alternatives' => array('41896', '56908'),
                            'diameter' => 75.1,
                            'tire_width' => 28,
                            'rim_diameter' => 43.2,
                            'rim_width' => 26,
                            'weight' => 28,
                            'rarity' => 'rare'
                          ),
                          '2903c02' => array(
                            'type' => 'bike',
                            'id' => '2903c02',
                            'img' => 'w2903c02',
                            'rim' => '2903',
                            'rim_alternatives' => array('6596', '2902'),
                            'tire' => '6596',
                            'tire_alternatives' => array('2903'),
                            'diameter' => 81.6,
                            'tire_width' => 13.6,
                            'rim_diameter' => 61.6,
                            'rim_width' => 13.6,
                            'weight' => 32,
                            'rarity' => 'rare'
                          ),
                          '2903c01' => array(
                            'type' => 'bike',
                            'id' => '2903c01',
                            'img' => 'w2903c01',
                            'rim' => '2903',
                            'rim_alternatives' => array('6596', '2902'),
                            'tire' => '2902',
                            'tire_alternatives' => array('2903'),
                            'diameter' => 81.6,
                            'tire_width' => 13.6,
                            'rim_diameter' => 61.6,
                            'rim_width' => 13.6,
                            'weight' => 30,
                            'rarity' => 'common'
                          ),
                          '23800c01' => array(
                            'type' => 'road',
                            'id' => '23800c01',
                            'img' => 'w23800c01',
                            'rim' => '23800',
                            'rim_alternatives' => array('23799'),
                            'tire' => '23799',
                            'tire_alternatives' => array('23800', '68577', '35187pb01'),
                            'diameter' => 81.6,
                            'tire_width' => 44,
                            'rim_diameter' => 61.6,
                            'rim_width' => 42,
                            'weight' => 58,
                            'rarity' => 'rare'
                          ),
                          '37383pb01c01' => array(
                            'type' => 'road',
                            'id' => '37383pb01c01',
                            'img' => '37383pb01c01',
                            'rim' => '35187pb01',
                            'rim_alternatives' => array('23799'),
                            'tire' => '23799',
                            'tire_alternatives' => array('23800', '68577', '35187pb01'),
                            'diameter' => 81.6,
                            'tire_width' => 44,
                            'rim_diameter' => 62.3,
                            'rim_width' => 42,
                            'weight' => 57,
                            'rarity' => 'rare'
                          ),
                          '56908c03' => array(
                            'type' => 'road',
                            'id' => '56908c03',
                            'img' => 'w56908c03',
                            'rim' => '41896',
                            'rim_alternatives' => array('41897', '61480', '41893', '45982', '18450'),
                            'tire' => '18450',
                            'tire_alternatives' => array('41896', '56908'),
                            'diameter' => 81.6,
                            'tire_width' => 42,
                            'rim_diameter' => 56,
                            'rim_width' => 26,
                            'weight' => 47,
                            'rarity' => 'uncommon'
                          ),
                          '41896c01' => array(
                            'type' => 'offroad',
                            'id' => '41896c01',
                            'img' => 'w41896c01',
                            'rim' => '41896',
                            'rim_alternatives' => array('41897', '61480', '41893', '45982', '18450'),
                            'tire' => '45982',
                            'tire_alternatives' => array('41896', '56908'),
                            'diameter' => 81.6,
                            'tire_width' => 37,
                            'rim_diameter' => 43,
                            'rim_width' => 26,
                            'weight' => 41,
                            'rarity' => 'uncommon'
                          ),
                          '44772c04' => array(
                            'type' => 'road',
                            'id' => '44772c04',
                            'img' => 'w44772c04',
                            'rim' => '44772',
                            'rim_alternatives' => array('41897', '61480', '41893', '45982', '18450'),
                            'tire' => 'x1825',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '2998'),
                            'diameter' => 81.6,
                            'tire_width' => 36,
                            'rim_diameter' => 56,
                            'rim_width' => 34,
                            'weight' => 51,
                            'rarity' => 'rare'
                          ),
                          '32197c01' => array(
                            'type' => 'road',
                            'id' => '32197c01',
                            'img' => 'w32197c01',
                            'rim' => '32197',
                            'rim_alternatives' => array('32196'),
                            'tire' => '32196',
                            'tire_alternatives' => array('32197'),
                            'diameter' => 81.6,
                            'tire_width' => 33,
                            'rim_diameter' => 68,
                            'rim_width' => 29.5,
                            'weight' => 55,
                            'rarity' => 'rare'
                          ),
                          '22969c05' => array(
                            'type' => 'road',
                            'id' => '22969c05',
                            'img' => 'w22969c05',
                            'rim' => '22969',
                            'rim_alternatives' => array('32298', '32298pb01', '32296', '32296pb02', '32296pb01'),
                            'tire' => '32296',
                            'tire_alternatives' => array('22969'),
                            'diameter' => 81.6,
                            'tire_width' => 49,
                            'rim_diameter' => 62,
                            'rim_width' => 45,
                            'weight' => 88,
                            'rarity' => 'rare'
                          ),
                          'x1825' => array(
                            'type' => 'road',
                            'id' => 'x1825',
                            'img' => 'w42110',
                            'rim' => '49294',
                            'rim_alternatives' => array('23798', '44771', '2997', 'x1825', '92912', '54120'),
                            'tire' => 'x1825',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '15038pb02', '49294', '2998'),
                            'diameter' => 81.6,
                            'tire_width' => 36,
                            'rim_diameter' => 56,
                            'rim_width' => 34,
                            'weight' => 51,
                            'rarity' => 'rare'
                          ),
                          '68577' => array(
                            'type' => 'road',
                            'id' => '68577',
                            'img' => 'wlambo',
                            'rim' => '68577',
                            'rim_alternatives' => array('23799'),
                            'tire' => '23799',
                            'tire_alternatives' => array('23800', '68577', '35187pb01'),
                            'diameter' => 81.6,
                            'tire_width' => 44,
                            'rim_diameter' => 62.3,
                            'rim_width' => 42,
                            'weight' => 57,
                            'rarity' => 'rare'
                          ),
                          '3739c01' => array(
                            'type' => 'offroad',
                            'id' => '3739c01',
                            'img' => 'w3739c01',
                            'rim' => '3739',
                            'rim_alternatives' => array('3740'),
                            'tire' => '3740',
                            'tire_alternatives' => array('3739'),
                            'diameter' => 82,
                            'tire_width' => 23,
                            'rim_diameter' => 43,
                            'rim_width' => 23,
                            'weight' => 53,
                            'rarity' => 'uncommon'
                          ),
                          '2998c01' => array(
                            'type' => 'road',
                            'id' => '2998c01',
                            'img' => 'w2998c01',
                            'rim' => '2998',
                            'rim_alternatives' => array('44771', '2997', 'x1825', '92912', '54120'),
                            'tire' => '2997',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '2998'),
                            'diameter' => 82,
                            'tire_width' => 33,
                            'rim_diameter' => 62,
                            'rim_width' => 31,
                            'weight' => 69,
                            'rarity' => 'rare'
                          ),
                          '51378c01' => array(
                            'type' => 'bike',
                            'id' => '51378c01',
                            'img' => 'w51378c01',
                            'rim' => '51378',
                            'rim_alternatives' => array('51380', '51379'),
                            'tire' => '51380',
                            'tire_alternatives' => array('51378'),
                            'diameter' => 92,
                            'tire_width' => 20,
                            'rim_diameter' => 74.5,
                            'rim_width' => 20,
                            'weight' => 54,
                            'rarity' => 'rare'
                          ),
                          '51378c02' => array(
                            'type' => 'bike',
                            'id' => '51378c02',
                            'img' => 'w51378c02',
                            'rim' => '51378',
                            'rim_alternatives' => array('51380', '51379'),
                            'tire' => '51379',
                            'tire_alternatives' => array('51378'),
                            'diameter' => 92,
                            'tire_width' => 27,
                            'rim_diameter' => 74.5,
                            'rim_width' => 20,
                            'weight' => 63,
                            'rarity' => 'rare'
                          ),
                          '88517c01' => array(
                            'type' => 'bike',
                            'id' => '88517c01',
                            'img' => 'w88517c01',
                            'rim' => '88517',
                            'rim_alternatives' => array('11957', '88516', '67140', '46335'),
                            'tire' => '88516',
                            'tire_alternatives' => array('46334', '88517'),
                            'diameter' => 94.2,
                            'tire_width' => 20,
                            'rim_diameter' => 75,
                            'rim_width' => 17,
                            'weight' => 36,
                            'rarity' => 'uncommon'
                          ),
                          '46334c01' => array(
                            'type' => 'bike',
                            'id' => '46334c01',
                            'img' => '46334c01',
                            'rim' => '46334',
                            'rim_alternatives' => array('11957', '88516', '67140', '46335'),
                            'tire' => '88516',
                            'tire_alternatives' => array('46334', '88517'),
                            'diameter' => 94.2,
                            'tire_width' => 22,
                            'rim_diameter' => 75,
                            'rim_width' => 15.8,
                            'weight' => 35,
                            'rarity' => 'rare'
                          ),
                          '46335' => array(
                            'type' => 'bike',
                            'id' => '46335',
                            'img' => 'harley',
                            'rim' => '46334',
                            'rim_alternatives' => array('11957', '88516', '67140', '46335'),
                            'tire' => '46335',
                            'tire_alternatives' => array('46334', '88517'),
                            'diameter' => 94.3,
                            'tire_width' => 38,
                            'rim_diameter' => 75,
                            'rim_width' => 31.6,
                            'weight' => 59,
                            'rarity' => 'rare'
                          ),
                          '44772c03' => array(
                            'type' => 'road',
                            'id' => '44772c03',
                            'img' => 'w44772c03',
                            'rim' => '44772',
                            'rim_alternatives' => array('44771', '2997', 'x1825', '92912', '54120'),
                            'tire' => '92912',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '2998'),
                            'diameter' => 94.3,
                            'tire_width' => 37,
                            'rim_diameter' => 56,
                            'rim_width' => 34,
                            'weight' => 67,
                            'rarity' => 'uncommon'
                          ),
                          '44772c02' => array(
                            'type' => 'offroad',
                            'id' => '44772c02',
                            'img' => 'w44772c02',
                            'rim' => '44772',
                            'rim_alternatives' => array('44771', '2997', 'x1825', '92912', '54120'),
                            'tire' => '54120',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '2998'),
                            'diameter' => 94.8,
                            'tire_width' => 42,
                            'rim_diameter' => 56,
                            'rim_width' => 34,
                            'weight' => 58,
                            'rarity' => 'uncommon'
                          ),
                          '88517c02' => array(
                            'type' => 'bike',
                            'id' => '88517c02',
                            'img' => 'w88517c02',
                            'rim' => '88517',
                            'rim_alternatives' => array('11957', '88516', '67140', '46335'),
                            'tire' => '11957',
                            'tire_alternatives' => array('46334', '88517'),
                            'diameter' => 100.6,
                            'tire_width' => 18,
                            'rim_diameter' => 75,
                            'rim_width' => 17,
                            'weight' => 40,
                            'rarity' => 'uncommon'
                          ),
                          '22969c01' => array(
                            'type' => 'offroad',
                            'id' => '22969c01',
                            'img' => 'w22969c01',
                            'rim' => '22969',
                            'rim_alternatives' => array('32298', '32298pb01', '32296', '32296pb02', '32296pb01'),
                            'tire' => '32298',
                            'tire_alternatives' => array('22969'),
                            'diameter' => 105,
                            'tire_width' => 60,
                            'rim_diameter' => 62,
                            'rim_width' => 45,
                            'weight' => 188,
                            'rarity' => 'rare'
                          ),
                          '15038c05' => array(
                            'type' => 'offroad',
                            'id' => '15038c05',
                            'img' => 'w15038c05',
                            'rim' => '44772',
                            'rim_alternatives' => array('44771', '2997', 'x1825', '92912', '54120'),
                            'tire' => '23798',
                            'tire_alternatives' => array('44772', '44772pb01', '15038', '15038pb01', '15038pb02', '49294', '2998'),
                            'diameter' => 107,
                            'tire_width' => 44,
                            'rim_diameter' => 56,
                            'rim_width' => 34,
                            'weight' => 81,
                            'rarity' => 'uncommon'
                          ),
                          '59521' => array(
                            'type' => 'single',
                            'id' => '59521',
                            'img' => 'w59521',
                            'diameter' => 156,
                            'rim_diameter' => 156,
                            'rim_width' => 27,
                            'weight' => 55,
                            'rarity' => 'rare'
                          ),
                          '44556' => array(
                            'type' => 'single',
                            'id' => '44556',
                            'img' => 'wx784',
                            'diameter' => 212,
                            'rim_diameter' => 212,
                            'rim_width' => 21,
                            'weight' => 84,
                            'rarity' => 'rare'
                          )
                        );

                        foreach ($wheels as &$wheel) {
                          echo '<tr class="'.$wheel['type'].'">
                                <td><a href="http://www.bricklink.com/catalogItem.asp?P='.$wheel['id'].'" target="_blank"><img src="img/'.$wheel['img'].'.png" /></a>';

                          if (isset($wheel['rim'])) {
                            echo '<span><a href="http://www.bricklink.com/catalogItem.asp?P='.$wheel['rim'].'" target="_blank"><img src="img/subs/'.$wheel['rim'].'.png" /></a>';

                            if (isset($wheel['rim_alternatives'])) {
                              echo '<p>';

                              foreach ($wheel['rim_alternatives'] as &$alternative) {
                                echo '<a href="https://www.bricklink.com/v2/catalog/catalogitem.page?P='.$alternative.'" target="_blank"><img src="img/subs/'.$alternative.'.png" /></a>';
                              }

                              echo '</p>';
                            }
                            echo '</span>';

                            if (isset($wheel['tire'])) {
                              echo '<span><a href="http://www.bricklink.com/catalogItem.asp?P='.$wheel['tire'].'" target="_blank"><img src="img/subs/'.$wheel['tire'].'.png" /></a>';

                              if (isset($wheel['tire_alternatives'])) {
                                echo '<p>';

                                foreach ($wheel['tire_alternatives'] as &$alternative) {
                                  echo '<a href="https://www.bricklink.com/v2/catalog/catalogitem.page?P='.$alternative.'" target="_blank"><img src="img/subs/'.$alternative.'.png" /></a>';
                                }

                                echo '</p>';
                              }
                              echo '</span>';
                            }
                        }
                        echo '</td>
                            <td class="align-middle">'.$wheel['diameter'].' mm</td>';

                            if (isset($wheel['tire_width']))
                              echo '<td class="align-middle">'.$wheel['tire_width'].' mm</td>';
                            else
                              echo '<td class="align-middle">no tire</td>';

                            echo '<td class="align-middle">'.$wheel['rim_diameter'].' mm</td>';

                            if (isset($wheel['rim_width']))
                              echo '<td class="align-middle">'.$wheel['rim_width'].' mm</td>';
                            else
                              echo '<td class="align-middle">?</td>';

                            $rarity_color = 'style="color: #109700"';
                            if ($wheel['rarity'] == 'uncommon')
                              $rarity_color = 'style="color: #ffae00"';
                            else if ($wheel['rarity'] == 'rare')
                              $rarity_color = 'style="color: red"';

                              echo '<td class="align-middle">'.$wheel['weight'].'g</td>
                                    <td  class="align-middle" '.$rarity_color.'>'.$wheel['rarity'].'</td>
                          </tr>';
                        }


                         ?>

                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>
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

  <script src="stupidtable.min.js"></script>
  <script src="script.js"></script>

</body>
</html>
