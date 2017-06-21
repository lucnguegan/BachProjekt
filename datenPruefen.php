<?php
//session_start();
require ('Dbconnectphp.php');


echo "Prüfen Sie bitte die Daten, die Sie eingetragen haben: <br><br>";
//Abteilung 
$abt = filter_input(INPUT_POST, 'abt');
echo "Abteilung: ".$abt."<br><br>";

//Hersteller
$her = filter_input(INPUT_POST, 'manufacturer');
echo "Hersteller: ".$her."<br><br>";
        
//IP-Adresse
$ip0 = filter_input(INPUT_POST, 'ipadr0');
$ip1 = filter_input(INPUT_POST, 'ipadr1');
$ip2 = filter_input(INPUT_POST, 'ipadr2');
$ip3 = filter_input(INPUT_POST, 'ipadr3');
$ip = $ip0.".".$ip1.".".$ip2.".".$ip3;
echo "IP-Adresse: ".$ip."<br><br>";

//MAC-Adresse
$mac0 = filter_input(INPUT_POST, 'mac0');
$mac1 = filter_input(INPUT_POST, 'mac1');
$mac2 = filter_input(INPUT_POST, 'mac2');
$mac3 = filter_input(INPUT_POST, 'mac3');
$mac4 = filter_input(INPUT_POST, 'mac4');
$mac5 = filter_input(INPUT_POST, 'mac5');
$mac = $mac0.":".$mac1.":".$mac2.":".$mac3.":".$mac4.":".$mac5;
echo "MAC-Adresse: ".$mac."<br><br>";

//Subnet Mask
$sub0 = filter_input(INPUT_POST, 'sub0');
$sub1 = filter_input(INPUT_POST, 'sub1');
$sub2 = filter_input(INPUT_POST, 'sub2');
$sub3 = filter_input(INPUT_POST, 'sub3');
$sub = $sub0.".".$sub1.".".$sub2.".".$sub3;
echo "Subnet Mask: ".$sub."<br><br>";

//Betriebssystem
$os = filter_input(INPUT_POST, 'os');
echo "Betriebssystem: ".$os."<br><br>";

//Edit the line
$edit = filter_input(INPUT_POST, 'edit');
echo "";

//insert datas of computer on Database named "Bissonabisso" and the table named "Computers"
$insert=$db->prepare("INSERT INTO Computers(Abteilung, Hersteller, IP, MAC, Sub, Os) VALUES(?,?,?,?,?,?)");
$insert->execute(array($abt, $her, $ip, $mac, $sub, $os));
header('Location:index.php');
?>

<form>
    <input type="submit" Value = "Zurück zum Formular" onClick="history.go(-1);return true;">
</form>
<form action =" ">
    <input type="submit" Value = "Weiter">
</form>