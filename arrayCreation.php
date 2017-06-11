<?php 

    $abt = filter_input(INPUT_POST, 'abteilung');
    if($abt === 'Anmeldung')
    {
        echo 'Sie haben die Anmeldung gewählt';
                
    } else if($abt === 'Buchhaltung')
    {
        echo 'Sie haben die Buchhaltung ausgewälht';
    } else if($abt === 'MRT')
    {
        echo 'Sie haben das MRT ausgewälht';
    } else if($abt === 'CT')
    {
        echo 'Sie haben das CT ausgewälht';
    } else if($abt === 'Röntgen')
    {
        echo 'Sie haben das Röntgen ausgewälht';
    } 
?>

<?php
class Computer
{
    private $_abteilung;    //Departement for the computer
    private $_hersteller;   //Manufacturer of the computer
    private $_ipadr;        //IP-Adress
    private $_macadr;       //MAC-Adress
    private $_submask;      //Subnet Mask of the computer
    private $_os;           //Operatingsystem of the computer
    private $_remover;      //Remover of the computer on the list
    
    
    //private $computers = array(abteilung, $hersteller, $ipadr, $macadr, $submask);
    
   public function __construct($abteilung, $hersteller, $ipadr, $macadr, $submask, $os) //When the departement is "Anmeldung
    {
        
        $this->setAbteilung($abteilung);
        $this->setHersteller($hersteller);
        $this->setIpadr($ipadr);
        $this->setMacadr($macadr);
        $this->setSubmask($submask);
        $this->setOs($os);
        
        
        
    }
    
    public function setAbteilung($abteilung)
    {
        $this->_abteilung = $abteilung;
    }
    
    public function getAbteilung()
    {
        return $this->_abteilung;
    }

        public function setHersteller($hersteller)
    {
        $this->_hersteller = $hersteller;
    }
    
    public function setIpadr($ipadr)
    {
        $this->_ipadr = $ipadr;
    }
    
    public function setMacadr($macadr)
    {
        $this->_macadr = $macadr;
    }
    
    public function setSubmask($submask)
    {
        $this->_submask = $submask;
    }
    
    public function setOs($os)
    {
        $this->_os = $os;
    }
    
    
    
}
?>
<button type="button">Löschen</button>
<?php  

$rechner = new Computer('Anmeldung', 'IBM', '192.168.0.22', '11:22:33:44:55:66', '255.255.255.0', 'Archlinux');
?>
<br><br><br>

<form action ="index.html" id="botbut"> 
    <input id ="returnToStart" type="submit" value="Zurück zur Startseite" />
</form>

<form action ="Formularhtml.html" id="botbut"> 
    <input id ="" type="submit" value="Zu formular" />
</form>
    


