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
        <?php
            include './Menuphp.php';
        ?>

        </header>
        <br /><br /><br /><br /><br /> <br /> 
        
</html>
<?php

// $pc = $_POST["IP"]; //IP von PC zu verwalten
$pc = "192.168.0.12"; //IP von PC zu verwalten
$obj = new COM('winmgmts://localhost/root/CIMV2');
$fso = new COM("Scripting.FileSystemObject");
$wmi_computersystem = $obj->ExecQuery("Select * from Win32_ComputerSystem");
$wmi_bios = $obj->ExecQuery("Select * from Win32_BIOS");
$processor = $obj->ExecQuery("Select * from Win32_Processor");
$PhysicalMemory = $obj->ExecQuery("Select * from Win32_PhysicalMemory");
$BaseBoard = $obj->ExecQuery("Select * from Win32_BaseBoard");
$LogicalDisk = $obj->ExecQuery("Select * from Win32_LogicalDisk");


$wmi = new COM('winmgmts://./root/OpenHardwareMonitor');
$result = $wmi->ExecQuery("SELECT * FROM Sensor");
foreach ($result as $obj) {
    if ($obj->SensorType == 'Temperature' && strpos($obj->Parent, 'cpu') > 0)
        echo "$obj->Name ($obj->Value C)"; // output cpu core temp
    else
        echo 'skipping ' . $obj->Identifier;
    echo '<br />';

    foreach ($wmi_computersystem as $wmi_call) {
        $model = $wmi_call->Model;
    }

    foreach ($wmi_bios as $wmi_call) {
        $serial = $wmi_call->SerialNumber;
        $bios_version = $wmi_call->SMBIOSBIOSVersion;
    }

    foreach ($processor as $wmi_processor) {
        $idprocessor = $wmi_processor->ProcessorId;
        $Architecture = $wmi_processor->Architecture;
        $Name = $wmi_processor->Name;
        $Version = $wmi_processor->Version;
    }
    foreach ($PhysicalMemory as $wmi_PhysicalMemory) {
        $Capacity = $wmi_PhysicalMemory->Capacity;
        $PartNumber = $wmi_PhysicalMemory->PartNumber;
        $Name = $wmi_PhysicalMemory->Name;
    }

    foreach ($BaseBoard as $wmi_BaseBoard) {
        $SerialNumber = $wmi_BaseBoard->SerialNumber;
    }
    foreach ($LogicalDisk as $wmi_LogicalDisk) {
        $SerialNumberDisk = $wmi_LogicalDisk->VolumeSerialNumber;
        $FileSystem = $wmi_LogicalDisk->FileSystem;
    }
    foreach ($disks as $d) {
        $str = sprintf("%s (%s) %s bytes, %4.1f%% free\n", $d->Name, $d->VolumeName, number_format($d->Size, 0, '.', ','), $d->FreeSpace / $d->Size * 100.0);

        echo $str;
    }
}
echo "Bios version   : " . $bios_version . "<br/>
          Serial number of bios  : " . $serial . "<br/>
          Hardware Model : " . $model . "<br/>
          ID-Processor : " . $idprocessor . "<br/>
          Architecture-Processor : " . $Architecture . "<br/>
          Name-Processor : " . $Name . "<br/>
          Version-Processor : " . $Version . "<br/>
          <hr>
          <hr>
          PhysicalMemory
          <hr>
          <hr>
          Capacity : " . $Capacity . "<br/>
          Name : " . $Name . "<br/>
          <hr>
          <hr>
          carte mere
          <hr>
          <hr>
          SerialNumber : " . $SerialNumber . "<br/>
           <hr>
          <hr>
          disk
          <hr>
          <hr>
          SerialNumber : " . $SerialNumberDisk . "<br/>
          FileSystem : " . $FileSystem . "<br>
          ";
?>
