<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="de">
    <head >
        <title>Willkommen an der Praxis --- Intranet</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css"  href = "buttoncss.css" />
        <!--link rel = "stylesheet" type = "text/css"  href = "Teamcss.css" /-->
    </head>
    <body>
        <header>
        <!--div>TODO write content</div-->
        <h1>Intranet Bisso Na Bisso</h1>
        <div id="horizontal_menu" >
        <ul class="level1">

        <li>
            <a href="index.php">Home</a>
        </li>
        
        <li>
                <a href="Teamhtml.html">Team</a>
        </li>
        
        <li>                
            <a id="abteilungen">Abteilungen</a>               
            <ul class="level2">              
                <li><a href="Anmeldunghtml.html" id="anmeldung">Anmeldung</a></li><br />
                <li><a href ="Buchhaltunghtml.html" id="buchhaltung">Buchhaltung</a></li><br />
                <li><a href ="Mrthtml.html" id="mrt">MRT</a></li><br />
                <li><a href="Roentgenhtml.html" id="roentgen">R&oumlntgen</a></li><br />
                <li><a href="Cthtml.html" id="ct">CT</a></li><br />
            </ul>
        </li>
        
        <li>
                <a href="Neuigkeitenhtml.html">Neuigkeiten</a>
        </li>
        
</ul>
        </div>
        </header>
        <br /><br /><br /><br /><br /> <br /> 
        
        <!--Table containing the computers parameters-->
        <table id="table" style="width: 50%">
            <caption id="caption">Liste der Computer</caption>
                <tr>
                    <th>ID</th>
                    <th>Abteilung</th>
                    <th>Hersteller</th>
                    <th>IP 1</th>
                    <th>IP 2</th>
                    <th>IP 3</th>
                    <th>IP 4</th>
                    <th>MAC 1</th>
                    <th>MAC 2</th>
                    <th>MAC 3</th>
                    <th>MAC 4</th>
                    <th>MAC 5</th>
                    <th>MAC 6</th>
                    <th>Subnet 1</th>
                    <th>Subnet 2</th>
                    <th>Subnet 3</th>
                    <th>Subnet 4</th>
                    <th>Betriebssystem</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>
                
        <?php
            include("Dbconnectphp.php");
            $query = "SELECT * FROM Computers";
            $stat = $db->query($query);
            $tab = $stat->fetchAll();
           
            
            foreach($tab as $line)
            {
                $id = $line["ID"];
                echo "<tr><td>".$id."</td><td>".$line["Abteilung"]."</td><td>".$line["Hersteller"]."</td><td>".$line["IP0"]."</td>"
                        . "<td>".$line["IP1"]."</td><td>".$line["IP2"]."</td><td>".$line["IP3"]."</td><td>".$line["MAC0"]."</td>"
                        . "<td>".$line["MAC1"]."</td><td>".$line["MAC2"]."</td><td>".$line["MAC3"]."</td><td>".$line["MAC4"]."</td><td>".$line["MAC5"]."</td><td>".$line["Sub0"]."</td>"
                        . "<td>".$line["Sub1"]."</td><td>".$line["Sub2"]."</td><td>".$line["Sub3"]."</td><td>".$line["Os"]."</td><td><a href='UpdateComputerphp.php?id=$id'>Bearbeiten</a></td><td><a href='removeComputerphp.php?id=$id'>Löschen</a></tr>";
            }
        ?>            
                
        </table><br /><br />
        
        <form method ="post" action="Formularhtml.html">
            <p>
                <input type="submit" value="Gerät hinzufügen">
            </p>
        </form><br /><br />        
        
    </body>
    
</html>
