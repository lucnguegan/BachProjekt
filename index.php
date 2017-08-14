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
                <a href="Teamphp.php">Team</a>
        </li>
        
        <li>                
            <a id="abteilungen">Abteilungen</a>               
            <ul class="level2">              
                <li><a href="Anmeldungphp.php" id="anmeldung">Anmeldung</a></li><br />
                <li><a href ="Buchhaltungphp.php" id="buchhaltung">Buchhaltung</a></li><br />
                <li><a href ="Mrtphp.php" id="mrt">MRT</a></li><br />
                <li><a href="Roentgenphp.php" id="roentgen">R&oumlntgen</a></li><br />
                <li><a href="Ctphp.php" id="ct">CT</a></li><br />
            </ul>
        </li>
        
        <li>
            <a href="monitoring2.php">Infos</a>
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
                    <th>IP-Adress</th>
                    <th>MAC-Adress</th>
                    <th>Subnet-Adress</th>
                    <th>Betriebssystem</th>
                    <th>Bearbeiten</th>
                    <th>Löschen</th>
                </tr>
                
        <?php
            
            include './Dbconnectphp.php';
            $query = "SELECT * FROM Computers";
            $stat = $db->query($query);
            $tab = $stat->fetchAll();
           
            
            foreach($tab as $line)
            {
                $id = $line["id"];
                echo "<tr><td>".$id."</td><td>".$line["Abteilung"]."</td><td>".$line["Hersteller"]."</td><td>".$line["IP0"].".".$line["IP1"].".".$line["IP2"].".".$line["IP3"]."</td><td>".$line["MAC0"].":".$line["MAC1"].":".$line["MAC2"].":".$line["MAC3"].":".$line["MAC4"].":".$line["MAC5"]."</td><td>".$line["Sub0"].".".$line["Sub1"].".".$line["Sub2"].".".$line["Sub3"]."</td><td>".$line["Os"]."</td><td><a href='UpdateComputerphp.php?id=$id'>Bearbeiten</a></td><td><a href='removeComputerphp.php?id=$id'>Löschen</a></tr>";
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
