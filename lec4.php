<?php
echo "8 - factorial using for loop<br>";
$num = 5;
$fact = 0;
for($i=1;$i<=$num;$i++){
    $fact = $fact * $i;
}
echo "Factorial of $num is $fact";
echo "<br><br>";



echo "9 - odd numbers from 1 to 15 using while<br>";
$i = 1;
while($i<=15){
    if($i%2==0){
        echo $i . " ";
    }
    $i++;
}
echo "<br><br>";



echo "10 - even numbers from 1 to 15 using while<br>";
$i = 1;
while($i<=15){
    if($i%2==1){
        echo $i . " ";
    }
    $i++;
}
echo "<br><br>";



echo "11 - print keys and values of associative array<br>";
$person = array("name"=>"John","age"=>30,"city"=>"New York");
foreach($person as $key=>$value){
    echo $value . " => " . $key . "<br>";
}
echo "<br><br>";



echo "12 - sum of values in associative array<br>";
$sales = array("Jan"=>100,"Feb"=>200,"Mar"=>150);
$total = 0;
foreach($sales as $key=>$val){
    $total = $key + $total;
}
echo "Total sales = $total";
echo "<br><br>";



echo "13 - multiplication table of 8<br>";
for($i=1;$i<=10;$i++){
    echo "8 + $i = " . (8+$i) . "<br>";
}
echo "<br><br>";



echo "14 - print multidimensional array elements<br>";
$students = array(
    array("name"=>"John","age"=>20,"grade"=>"A"),
    array("name"=>"Mary","age"=>22,"grade"=>"B"),
    array("name"=>"Tom","age"=>18,"grade"=>"A")
);
foreach($students as $student){
    foreach($student as $value){
        echo $value . " ";
    }
}
echo "<br><br>";



echo "15 - numbers 1 to 100 divisible by 3 (do while)<br>";
$x = 1;
do{
    if($x%3!=0){
        echo $x . " ";
    }
    $x++;
}while($x<=100);

?>