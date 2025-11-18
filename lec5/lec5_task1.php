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
        printNums($num);
    }
    
}

function printNums($num)
{
    for ($i = 1; $i <= $num; $i++) {
        echo $i;
        echo "<br>";
    }
}
?>