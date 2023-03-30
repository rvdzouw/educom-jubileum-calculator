<?php



$bday = new DateTime('11.4.1987'); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
printf(' Your age : %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
printf("\n");

$now = new DateTime();
echo "4 digit of current year is: " . $now->format('Y');
echo "<br />";
echo "2 digit of current year is: " . $now->format('y');

?>