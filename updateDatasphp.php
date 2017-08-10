<?php
include './Dbconnectphp.php';
$objetPdo = new PDO("mysql:host=localhost; dbname=Bissonabisso", "root", "");

$pdoStat = $objetPdo->prepare('UPDATE `Computers` SET `Abteilung`=:Abteilung,`Hersteller`=:Hersteller,`IP0`=:IP0,`IP1`=:IP1,`IP2`=:IP2,`IP3`=:IP3,`MAC0`=:MAC0,`MAC1`=:MAC1,`MAC2`=:MAC2,`MAC3`=:MAC3,`MAC4`=:MAC4,`MAC5`=:MAC5,`Sub0`=:Sub0,`Sub1`=:Sub1,`Sub2`=:Sub2,`Sub3`=:Sub3,`Os`=:Os WHERE `id`=:id');

$pdoStat->bindValue(':id', filter_input(INPUT_POST, 'id'), PDO::PARAM_INT);
$pdoStat->bindValue(':Abteilung', filter_input(INPUT_POST, 'Abteilung'), PDO::PARAM_STR);
$pdoStat->bindValue(':Hersteller', filter_input(INPUT_POST, 'Hersteller'), PDO::PARAM_STR);
$pdoStat->bindValue(':IP0', filter_input(INPUT_POST, 'IP0'), PDO::PARAM_INT);
$pdoStat->bindValue(':IP1', filter_input(INPUT_POST, 'IP1'), PDO::PARAM_INT);
$pdoStat->bindValue(':IP2', filter_input(INPUT_POST, 'IP2'), PDO::PARAM_INT);
$pdoStat->bindValue(':IP3', filter_input(INPUT_POST, 'IP3'), PDO::PARAM_INT);
$pdoStat->bindValue(':MAC0', filter_input(INPUT_POST, 'MAC0'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC1', filter_input(INPUT_POST, 'MAC1'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC2', filter_input(INPUT_POST, 'MAC2'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC3', filter_input(INPUT_POST, 'MAC3'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC4', filter_input(INPUT_POST, 'MAC4'), PDO::PARAM_STR);
$pdoStat->bindValue(':MAC5', filter_input(INPUT_POST, 'MAC5'), PDO::PARAM_STR);
$pdoStat->bindValue(':Sub0', filter_input(INPUT_POST, 'Sub0'), PDO::PARAM_INT);
$pdoStat->bindValue(':Sub1', filter_input(INPUT_POST, 'Sub1'), PDO::PARAM_INT);
$pdoStat->bindValue(':Sub2', filter_input(INPUT_POST, 'Sub2'), PDO::PARAM_INT);
$pdoStat->bindValue(':Sub3', filter_input(INPUT_POST, 'Sub3'), PDO::PARAM_INT);
$pdoStat->bindValue(':Os', filter_input(INPUT_POST, 'Os'), PDO::PARAM_STR);

$executeIsOk = $pdoStat->execute();


if($executeIsOk)
{
    $message = 'Computer richtig aktualisiert!';
} else {
    $message = '!!!!  Fehler bei der aktualisierung !!!!';
}
?>

<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Computer update</title>
    </head>
    <body>
        <p><?= $message ?></p>
    </body>
    <form action="index.php">
    <input type="submit" Value ="Zurück zur Startseite" >
</form>
</html>
