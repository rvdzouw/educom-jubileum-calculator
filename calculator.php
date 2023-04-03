<?php


$bday = new DateTime('11.4.1987'); // Your date of birth
$today = new Datetime(date('m.d.y'));
$diff = $today->diff($bday);
printf(' Your age : %d', $diff->days);
printf("\n");

echo '<br>';

echo date_diff(date_create('1987-04-11'), date_create('today'))->y;

echo '<br>';

function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->d;
        return $age;
    }else{
        return 0;
    }
}
$dob = '1987-04-11';
echo ageCalculator($dob);

echo '<br>';

$c= date('d');
$y= date('d',strtotime('1987-04-11'));
echo $c-$y;

echo '<br>';

$dateOfBirth = "11-04-1987";
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
echo 'Age is '.$diff->format('%d');

echo '<br>';

$dob='1987-04-11';
$year = (date('d') - date('d',strtotime($dob)));
echo $year;

?>