<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Buchhaltung-Abteilung</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="buttoncss.css" />
    </head>
    <body>
        <h1>Intranet Bisso Na Bisso</h1>
        <div id="horizontal_menu" >
        <ul class="level1">

        <li>
                <a href="index.php">Home</a>
        </li>
        
        <li>
                <a href="Teamphp.php">Team</a>
        </li>
        
        <li>                
            <a id="abteilungen">Abteilungen</a>               
            <ul class="level2">              
                <li><a href="Anmeldungphp.php" id="anmeldung">Anmeldung</a></li><br />
                <li><a href ="Buchhaltungphp.php" id="buchhaltung">Buchhaltung</a></li><br />
                <li><a href ="Mrtphp.php" id="mrt">MRT</a></li><br />
                <li><a href="Roentgenphp.php" id="roentgen">R&oumlntgen</a></li><br />
                <li><a href="Cthphp.php" id="ct">CT</a></li><br />
            </ul>
        </li>
        
        <li>
                <a href="Neuigkeitenphp.php">Infos</a>
        </li>
        
</ul>
        </div>

        <br /><br /><br /><br /><br /> <br /> 
        <table id="table" style="width: 50%">
            <caption id="caption">Liste der Computer an der Buchhaltung-Abteilung</caption>
                <tr>
                    <th>ID</th>
                    <th>Abteilung</th>
                    <th>Hersteller</th>
                    <th>IP-Adress</th>
                    <th>MAC-Adress</th>
                    <th>Subnet-Adress</th>
                    <th>Betriebssystem</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>
                
        <?php
            include("Dbconnectphp.php");
            $query = "SELECT * FROM Computers WHERE Abteilung ='Buchhaltung'";
            $stat = $db->query($query);
            $tab = $stat->fetchAll();
           
            
            foreach($tab as $line)
            {
                $id = $line["id"];
                echo "<tr><td>".$id."</td><td>".$line["Abteilung"]."</td><td>".$line["Hersteller"]."</td><td>".$line["IP0"].".".$line["IP1"].".".$line["IP2"].".".$line["IP3"]."</td><td>".$line["MAC0"].":".$line["MAC1"].":".$line["MAC2"].":".$line["MAC3"].":".$line["MAC4"].":".$line["MAC5"]."</td><td>".$line["Sub0"].".".$line["Sub1"].".".$line["Sub2"].".".$line["Sub3"]."</td><td>".$line["Os"]."</td><td><a href='UpdateComputerphp.php?ID=$id'>Bearbeiten</a></td><td><a href='removeComputerphp.php?ID=$id'>Löschen</a></tr>";
            }
        ?>            
                
        </table><br /><br />
    </body>
</html>
