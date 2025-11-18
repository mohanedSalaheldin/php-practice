<html>

<body>
    <form action="" method="post">
        num: <input type="text" name="num">
        <input type="submit" value="submit">
    </form>

</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD']== 'POST') {
    $num = $_POST['num'];
    if (is_numeric($num)) {
        printPattern($num);
    }
    
}

function printPattern($num)
{
    for ($i = $num; $i > 0; $i--) {
        for ($j=0; $j < $i; $j++) { 
            echo "*";
        }
        echo "<br>";
    }
}
?>