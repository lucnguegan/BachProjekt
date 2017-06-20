
<?php
require ('Dbconnectphp.php');
include './datenPruefen.php';


//update entry of the Table "Computers"

if(isset(filter_input(INPUT_GET, 'id')))
{
    $id=filter_input(INPUT_GET, 'id');
}
if(isset(filter_input(INPUT_GET, 'submit')))
{
    $query = "UPDATE Computers SET Abteilung='".$abt."', Hersteller='".$her."', IP='".$ip."', MAC='".$mac."', Sub='".$sub."', Os='".$os."'";
    
    $update = updateComputer($query);
    
    if($update != 0)
    {
        echo 'Aktualisierung erfolgreich';
    } else {
        echo 'FEHLER !!!';
    }
}

function updateComputer($query)
{
    $pdo=getConnection();
    $stmt=$pdo->prepare($query);
    return $stmt;
}
