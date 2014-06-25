<?php
$today = getdate();
    $date = $today['year']."-".$today['mon']."-".$today['mday'];
    $time = $today['hours'].":".$today['minutes'].":".$today['seconds'];
    echo $date;
    echo $time;
    echo "<br />\n";
    
    $coorinates="(12.34,56.35)";
    $input3=(string)$coorinates;
           
    $input1 = (string)explode( ')', $input3 );
    $input2 = (string)explode( '(', $input1 );
    $input3 = explode( '(', $input2 );
    
var_dump($input3);

echo "<br />\n";
var_dump( explode( ',', $input2 ) );
echo "<br />\n";

      $a=  strtok( $input3,")","(" ) ;
        print_r($a);
echo "<br />\n";
    echo "foo";
echo "<br />\n";
echo "bar";

$today = getdate();
//$date = $today['year']."-".$today['mon']."-".$today['mday'];

$currentDate = $today['mday'];

$currentMonth = $today['mon'];
$week[]=null;

if($currentDate >=7){  
    //$week[0]=$today['year']."-".$today['mon']."-".$today['mday'];
    for($i=0;$i<7;$i++){
        $week[$i]=$today['year']."-".$today['mon']."-".$currentDate--;
    }
}
elseif ($currentMonth==3) {
if($today['year']%4==0){
    for($i=0;$i<7;$i++){
        if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth=2;
         $currentDate=29;
        }
    }
}
else{
    for($i=0;$i<7;$i++){
        if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth=2;
         $currentDate=28;
        }
    }
}
}
elseif ($currentMonth==1) {
    $currentYear = $today['year'];
    if($currentDate>0){
        $week[$i]=$currentYear."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentYear--;
         $currentMonth=12;
         $currentDate=31;
        }
}
elseif ($currentMonth<=8) {
if($currentMonth%2==0){
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=31;
        }
}
else{
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=30;
        }
}
}
 else {//month >7
    if($currentMonth%2==0){
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=30;
        }
}
else{
    if($currentDate>0){
        $week[$i]=$today['year']."-".$currentMonth."-".$currentDate--;
        }
        else{
         $currentMonth--;
         $currentDate=31;
        }
}
}
print_r($week);
?>	