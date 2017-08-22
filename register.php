<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <!-- Anmeldeformular für die Ausgabe, wenn die POST-Variablen nicht gesetzt sind
        oder wenn das Anmelde-Skript einen Fehler verursacht hat. -->
        <div class="content">   
        <p id="tilte">Registration</p>
                <?php
                if (!empty($error_msg)) {
                    echo $error_msg;
                }
                ?>
                <ul>
                    <li>Benutzernamen dürfen nur Ziffern, Groß- und Kleinbuchstaben und Unterstriche enthalten.</li>
                    <li>E-Mail-Adressen müssen ein gültiges Format haben.</li>
                    <li>Passwörter müssen mindest sechs Zeichen lang sein.</li>
                    <li>Passwörter müssen enthalten
                        <ul>
                            <li>mindestens einen Großbuchstaben (A..Z)</li>
                            <li>mindestens einen Kleinbuchstabenr (a..z)</li>
                            <li>mindestens eine Ziffer (0..9)</li>
                        </ul>
                    </li>
                    <li>Das Passwort und die Bestätigung müssen exakt übereinstimmen.</li>
                </ul>
                <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">                    
                        Username: <input type='text' name='username' id='username' /><br><br>
                        Email: <input type="text" name="email" id="email" /><br><br>
                        Password: <input type="password" name="password" id="password"/><br><br>
                        Confirm password: <input type="password" name="confirmpwd" 
                                             id="confirmpwd" /><br><br><br>
                        <input type="button" 
                           value="Register" 
                           onclick="return regformhash(this.form,
                                           this.form.username,
                                           this.form.email,
                                           this.form.password,
                                           this.form.confirmpwd);" /> 
                </form> 
                <br /><br /><br /><br />
            <p>Return to the <a href="Teamphp.php">login page</a>.</p>            
        </div>
    </body>
</html>
    
