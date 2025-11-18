<html>

<body>
    <form action="" method="post">
        num: <input type="text" name="num">
        <input type="submit" value="submit">
    </form>

</body>

</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num = $_POST['num'];
    if (is_numeric($num)) {
        printOddNums($num);
    }
}

function printOddNums($num)
{
    if ($num == 1) {
        echo -1;
        return;
    }
    for ($i = 2; $i <= $num; $i++) {
        if ($i % 2 == 0) {
            echo $i;
            echo "<br>";
        }
    }
}
?>