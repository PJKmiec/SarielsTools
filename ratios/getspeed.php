<?PHP
extract($_GET);
$speeds = array('m2838' => '1000/2000',
								'm43362' => '140/219',
								'm71427' => '160/250',
								'm47154' => '210/315',
								'mmicromotor' => '10/16',
								'mrc1' => '670/920',
								'mrc2' => '906/1245',
								'mnxt' => '82/117',
								'mev3m' => '203/272',
								'mev3l' => '78/105',
								'mpfm' => '185/275',
								'mpfl' => '208/272',
								'mpfxl' => '100/146',
								'mpfe' => '300/420',
								'mtrain' => '1071/1250'
								);

$torques = array('m2838' => '0.45',
								'm43362' => '2.25',
								'm71427' => '2.25',
								'm47154' => '2.25',
								'mmicromotor' => '1.28',
								'mrc1' => '2.48',
								'mrc2' => '1.83',
								'mnxt' => '16.7',
								'mev3m' => '6.64',
								'mev3l' => '17.3',
								'mpfm' => '3.63',
								'mpfl' => '6.48',
								'mpfxl' => '14.5',
								'mpfe' => '1.32',
								'mtrain' => '0.9'
								);

if ($speeds[$m])
{
	$speed = explode('/', $speeds[$m]);
	if ($d == $f)
	{
		$o7 = $speed[0];
		$o9 = $speed[1];
		$t = $torques[$m];
	}
	else if ($f > $d)
	{
		$o7 = $speed[0] / round(($f / $d), 3);
		$o9 = $speed[1] / round(($f / $d), 3);
		$t = $torques[$m] * round(($f / $d), 3);
	}
	else
	{
		$o7 = $speed[0] * round(($d / $f), 3);
		$o9 = $speed[1] * round(($d / $f), 3);
		$t = $torques[$m] / round(($d / $f), 3);
	}
echo "The theoretical output speed will be <b>".round($o7, 1)."</b> RPM at 7V and <b>".round($o9, 1)."</b> RPM at 9V.
			<br />The theoretical output torque will be <b>".round($t, 2)."</b> N.cm.";
}
?>