<html>
    <head></head>
    <body>
        NIM: 255150407111006<br>
        Nama: Bernadette Aster Masdah Ngati Sinaga <p>

        <form method="POST">
        <input type="number" name="Number1">
        <p>
        <input type="number" name="Number2">
        <p>
        <input type="radio" name="Operation" value="tambah">+<br>
        <input type="radio" name="Operation" value="kurang">-<br>
        <input type="radio" name="Operation" value="perkalian">x<br>
        <input type="radio" name="Operation" value="pembagian">:<br>
        <input type="submit" value="hasil">
        </form>
        
    </body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $num1 = $_POST['Number1'];
    $num2 = $_POST['Number2'];
    $op = $_POST['Operation'];

    if ($op == "tambah"){
        $hasil = $num1 + $num2;
    } else if($op == "kurang"){
        $hasil = $num1 - $num2;
    } else if($op == "perkalian"){
        $hasil = $num1 * $num2;
    } else if($op == "pembagian"){
        $hasil = $num1 / $num2;
    } 

    echo "$hasil";
    }
?>