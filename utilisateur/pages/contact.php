<h2 id="titre_page"> Pour nous contacter </h2>
<h3> Complétez ce formulaire pour nous contacter </h3>

<?php

if(isset($_GET['submit_reserv'])) {
    extract($_GET,EXTR_OVERWRITE);
    if(trim($type)!='' && trim($nom_client)!='' && trim($pren_client)!='' && trim($comm_client)!='' && trim($email)!='') {
        $mg2 = new contactManager($db);
        $retour = $mg2->addContact($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Demande enregistrée.<br />Nous vous contacterons au plus vite.</span>";
        }
        /*else if ($retour==2) { 'pas possible dans notre cas
            $texte="<span class='txtGras'>Déjà dans la base de données</span>";
        }    */
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($type)!='') {$_SESSION['form']['type']=$type;}
        if(trim($nom_client)!='') {$_SESSION['form']['nom_client']=$nom_client;}
        if(trim($pren_client)!='') {$_SESSION['form']['pren_client']=$pren_client;}
        if(trim($comm_client)!='') {$_SESSION['form']['comm_client']=$comm_client;}
        if(trim($email)!='') {$_SESSION['form']['email']=$email;}
    }
}
?>
<img src="../admin/images/banniereContact.jpg" alt="Image de contact" />
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<section id="leform">
    <form id="form_contact" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtMauv txtGras">Renseignements personnel : </legend>
        <table>
		    <tr>
                <td>Sexe : </td>
                <td>Monsieur  <input type="radio" name="type" id="Homme" value="Homme" />                   
                    &nbsp;&nbsp;&nbsp;Madame
                     <input type="radio" name="type" id="Femme" value="Femme"/>                     
                </td>
            </tr>
            <tr>
            <tr>
                <td>Nom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['nom_client'])) { ?>
                        <input type="text" name="nom_client" id="nom_client" value="<?php print $_SESSION['form']['nom_client'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="nom_client" id="nom_client" placeholder="Votre nom" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
			<tr>
                <td>Prénom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['pren_client'])) { ?>
                        <input type="text" name="pren_client" id="pren_client" value="<?php print $_SESSION['form']['pren_client'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="pren_client" id="pren_client" placeholder="Votre Prenom" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
			 <tr>
                <td>Commentaire : </td>
                <td>
                    <?php if(isset($_SESSION['form']['comm_client'])) { ?>
                    <textarea name="comm_client" id="comm_client" rows="5" cols="22" value="<?php print $_SESSION['form']['comm_client'];?>"></textarea>
                    <?php
                    }
                    else {
                        ?>
                    <textarea name="comm_client" id="comm_client" rows="5" cols="22" placeholder="Votre commentaire" required/> </textarea>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            <tr>
                <td>Email : </td>
                <td>
                    <?php if(isset($_SESSION['form']['email'])) { ?>
                    <input type="email" name="email" id="email" value="<?php print $_SESSION['form']['email'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                    <input type="email" name="email" id="email" placeholder="Votre email"/>
                    <?php
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                <input type="submit" name="submit_reserv" id="submit_reserv" value="Envoyer la demande" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
</section>