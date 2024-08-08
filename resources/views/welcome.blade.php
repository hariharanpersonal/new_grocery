<?php

use function PHPSTORM_META\type;

print_r(" 1. Sort an String Array Alphabetically");

$array = ["banana", "apple", "cherry", "date"];
$sort = asort($array);
$check = sort($array);
echo "<br><br>";

print_r($array);
echo "<br><br>";
echo "----------------------------------------------------------------------";
echo "<br><br>";

print_r("2. Reverse a number");
function reverseNumber(){
    $number = 12345;

    $str = (string)$number;
    $rev = strrev($str);
    echo "<br><br>Given Number =  ". $number;
    echo "<br><br>Reverse Number =  ";
    print_r($rev);
}

reverseNumber();
echo "<br><br>";
echo "----------------------------------------------------------------------";
echo "<br><br>";
print_r(" 3.Check if a Number or String if palindrome");

$word = "car";
$rev = strrev($word);

if($word != $rev){
    echo "word = ". $word;
    echo "<br><br> it is not a Palindrome " . $word;
    echo "<br><br>";
    echo "----------------------------------------------------------------------";
    echo "<br><br>";
}else{
    echo "word = ". $word;
    echo "<br><br> it is a Palindrome " . $word;
    echo "<br><br>";
    echo "----------------------------------------------------------------------";
    echo "<br><br>";
}

$number = 12121;
$str = (string)$number;
$rev = strrev($str);

if($number != $rev){
    echo " number = ". $number;
    echo "<br><br> it is not a Palindrome " . $number;
    echo "<br><br>";
    echo "----------------------------------------------------------------------";
    echo "<br><br>";
}else{
    echo "number = ". $number;
    echo "<br><br> it is a Palindrome " . $number;
    echo "<br><br>";
    echo "----------------------------------------------------------------------";
    echo "<br><br>";
}


print_r(" 4.Check duplicates in an Array");
$arr = [1, 2, 2, 3, 4, 4, 5];

$check = [];

for($i=0;$i < count($arr);$i++){
   if(!in_array($arr[$i],$check)){
    $check[] = $arr[$i];
   }
}
print_r($check);

?>