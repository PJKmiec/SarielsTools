<?PHP
extract($_GET);

function extract_numbers($string)
{
	$string = preg_replace("/[^0-9]/", '', $string);
	return $string;
}

function render ($driver, $follower)
{
	echo '<div class="wrapper">
					<div class="driver '.$driver.'" id="d-x"></div>
					<div class="follower '.$follower.'" id="f-x"></div>
					<div class="output" id="o-x">';
					// $d = extract_numbers($driver);
					// $f = extract_numbers($follower);
	echo '</div>';
}

if ($c == 'liftarm')
	$combinations = array('a' => 'g8:g8',
												'b' => 'g8:g24 g8:g24c g8:g24wc g12db:g20db g16:g16 g16:g16wc g16wc:g16 g16wc:g16wc g20db:g12db g24:g8 g24c:g8 g24wc:g8',
												'c' => 'g8:g40 g12db:g36 g24:g24 g24:g24c g24:g24wc g24c:g24wc g24c:g24c g24wc:g24wc g24wc:g24c g36:g12db g40:g8',
												'd' => 'g24:g40 g24c:g40 g24wc:g40 g40:g24wc g40:g24c g40:g24',
												'e' => 'g40:g40',
												'f' => 'g8:g8',
												'g' => '',
												'h' => 'g12db:g24 g12db:g24c g12db:g24wc g16:g20db g16wc:g20db g20db:g16 g20db:g16wc g24:g12db g24c:g12db g24wc:g12db',
												'i' => 'g12db:g40 g40:g12db',
												'j' => 'g24:g40 g24c:g40 g24wc:g40 g40:g24wc g40:g24c g40:g24',
												'k' => 'g8:g24 g8:g24c g8:g24wc g12db:g20db g16:g16 g16:g16wc g16wc:g16 g16wc:g16wc g20db:g12db g24:g8 g24c:g8 g24wc:g8',
												'l' => 'g12db:g24 g12db:g24c g12db:g24wc g16:g20db g16wc:g20db g20db:g16 g20db:g16wc g24:g12db g24c:g12db g24wc:g12db',
												'm' => 'g8:g36 g20db:g24 g20db:g24c g20db:g24wc g24wc:g20db g24c:g20db g24:g20db g36:g8',
												'n' => 'g16:g40 g16wc:g40 g20db:g36 g36:g20db g40:g16wc g40:g16',
												'o' => 'g36:g36',
												'p' => 'g8:g40 g12db:g36 g24:g24 g24:g24c g24:g24wc g24c:g24wc g24c:g24c g24wc:g24wc g24wc:g24c g36:g12db g40:g8',
												'q' => 'g12db:g40 g40:g12db',
												'r' => 'g16:g40 g16wc:g40 g20db:g36 g36:g20db g40:g16wc g40:g16',
												's' => '',
												't' => 'g40:g40',
												'u' => 'g24:g40 g24c:g40 g24wc:g40 g40:g24wc g40:g24c g40:g24',
												'w' => 'g24:g40 g24c:g40 g24wc:g40 g40:g24wc g40:g24c g40:g24',
												'v' => 'g36:g36',
												'y' => 'g40:g40',
												'x' => 'g40:g40'
											 );
else
	$combinations = array('a' => 'g8:g12db g12db:g8',
											  'b' => '',
												'c' => 'g16:g40 g16wc:g40 g20db:g36 g36:g20db g40:g16wc g40:g16',
												'd' => 'g36:g40 g40:g36',
												'f' => 'g8:g8',
												'g' => 'g8:g16 g8:g16wc g16wc:g8 g16:g8',
												'h' => 'g16:g24 g16wc:g24 g20db:g20db g24:g16wc g24:g16',
												'i' => 'g20db:g40 g24:g36 g24c:g36 g24wc:g36 g36:g24wc g36:g24c g36:g24 g40:g20db',
												'k' => 'g8:g24 g8:g24c g8:g24wc g12db:g20db g16:g16 g16:g16wc g16wc:g16 g16wc:g16wc g20db:g12db g24:g8 g24c:g8 g24wc:g8',
											  'l' => 'g12db:g24 g12db:g24c g12db:g24wc g24wc:g12db g24c:g12db g24:g12db',
												'm' => 'g8:g40 g16:g36 g16wc:g36 g24:g24 g24:g24c g24:g24wc g24c:g24wc g24c:g24c g24wc:g24wc g24wc:g24c g36:g16 g36:g16wc g40:g8',
											  'n' => 'g24:g40 g24c:g40 g24wc:g40 g40:g24wc g40:g24c g40:g24',
												'o' => 'g8:g40 g12db:g36 g24:g24 g24:g24c g24:g24wc g24c:g24wc g24c:g24c g24wc:g24wc g24wc:g24c g36:g12db g40:g8',
												'p' => 'g12db:g40 g16:g36 g16wc:g36 g36:g16wc g36:g16 g40:g12db',
												'r' => 'g20db:g40 g24:g36 g24c:g36 g24wc:g36 g36:g24wc g36:g24c g36:g24 g40:g20db',
												's' => 'g36:g40 g40:g36',
												't' => 'g24:g40 g24c:g40 g24wc:g40 g40:g24wc g40:g24c g40:g24',
												'u' => '',
												'w' => 'g36:g40 g40:g36',
												'v' => 'g40:g40'
											 );

	$combinations = explode(" ", $combinations[$v]);
	if (strlen($combinations[0]) > 0)
	{
		if (count($combinations) == 1)
			echo "<b>".count($combinations)." gear combination is available for these positions:</b><br />";
		else
			echo "<b>".count($combinations)." gear combinations are available for these positions:</b><br />";

		for ($i = 0; $i < count($combinations); $i++)
		{
			$combination = explode(":", $combinations[$i]);
			render($combination[0], $combination[1]);
		}
	}
	else
		echo "<b>There are no gear combinations available for these positions.</b>";
?>
