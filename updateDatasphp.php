
<?php
//update entry of the Table "Computers"
include ('./Dbconnectphp.php');
if(isset(filter_input(INPUT_GET, 'id')))
{
    $id=filter_input(INPUT_GET, 'id');
    
}
if(isset(filter_input(INPUT_GET, 'submit')))
{
    $query = "UPDATE Computers SET Abteilung='".$abt."', Hersteller='".$her."', IP0='".$ip0."', IP1='".$ip1."', IP2='".$ip2."', IP3='".$ip3."', MAC0='".$mac0."', MAC1='".$mac1."', MAC2='".$mac2."', MAC3='".$mac3."', MAC4='".$mac4."', MAC5='".$mac5."', Sub0='".$sub0."', Sub1='".$sub1."', Sub2='".$sub2."', Sub3='".$sub3."', Os='".$os."where ID='".$id."'" ;
    
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
