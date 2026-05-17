<html>
    <head></head>
    <body>
        nim: ....<br>
        nama: ...<p>

        <form method="POST">
            <input type="number" name="number1"> <p>
            <input type="number" name="number2"> <p>
            <input type="radio" name="operasi" value="tambah">+ <br>
            <input type="radio" name="operasi" value="kurang">- <br>
            <input type="submit" value="hasil"><p>
        </form>
    </body>
</html>

<?php
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];
    $op = $_POST['operasi'];

    if($op == "tambah"){
        $hasil = $num1 + $num2;
    } elseif($op == "kurang"){
        $hasil = $num1 - $numb2;
    }

    echo "$hasil";
?>