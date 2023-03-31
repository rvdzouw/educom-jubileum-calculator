<?php



$bday = strtotime('1987-4-11'); // Your date of birth
$today = strtotime('now');
// $diff = $today->diff($bday);
// printf(' Your age : %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
// printf("\n");
$Now = new DateTime('now', new DateTimeZone('UTC'));

echo $bday . '<br>';
echo $today . '<br>';
echo $Now->format('Y-m-d');

?>