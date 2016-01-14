<h2 id="titre_page"> Création d'un compte </h2>

<?php

if(isset($_GET['submit_ccompte'])) {
    extract($_GET,EXTR_OVERWRITE);
    if(trim($nom_cc)!='' && trim($pren_cc)!='' && trim($adresse_cc)!='' && trim($ville_cc)!='' && trim($cp_cc)!='' && trim($pays_cc)!='' && trim($num_cc)!='') {
        $mg2 = new creercompteManager($db);
        $retour = $mg2->addClient($_GET);
        if($retour>=0){
            $texte="<span class='txtGras'>Demande enregistrée.</span>";
            print '$texte';
        }
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($nom_cc)!='') {$_SESSION['form']['nom_cc']=$nom_cc;}
        if(trim($pren_cc)!='') {$_SESSION['form']['pren_cc']=$pren_cc;}
        if(trim($adresse_cc)!='') {$_SESSION['form']['adresse_cc']=$adresse_cc;}
        if(trim($ville_cc)!='') {$_SESSION['form']['ville_cc']=$ville_cc;}
        if(trim($cp_cc)!='') {$_SESSION['form']['cp_cc']=$cp_cc;}
        if(trim($pays_cc)!='') {$_SESSION['form']['pays_cc']=$pays_cc;}
        if(trim($num_cc)!='') {$_SESSION['form']['num_cc']=$num_cc;}
    }
}
?>
<img src="../admin/images/banniereCompte.gif" alt="Image compte" />

<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<section id="leform">
    <form id="form_ccompte" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtCpte txtGras">Renseignements personnel : </legend>
        <table id="formCpte">
            <tr>
                <td>Nom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['nom_cc'])) { ?>
                        <input type="text" name="nom_cc" id="nom_cc" value="<?php print $_SESSION['form']['nom_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="nom_cc" id="nom_cc" placeholder="Nom" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
	    <tr>
                <td>Prénom : </td>
                <td>
                    <?php if(isset($_SESSION['form']['pren_cc'])) { ?>
                        <input type="text" name="pren_cc" id="pren_cc" value="<?php print $_SESSION['form']['pren_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="pren_cc" id="pren_cc" placeholder="Prenom" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
             <tr>
                <td>Adresse : </td>
                <td>
                    <?php if(isset($_SESSION['form']['adresse_cc'])) { ?>
                        <input type="text" name="adresse_cc" id="adresse_cc" value="<?php print $_SESSION['form']['adresse_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="adresse_cc" id="adresse_cc" placeholder="Adresse" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
	
                       
            <tr>
                <td>Ville : </td>
                <td>
                    <?php if(isset($_SESSION['form']['ville_cc'])) { ?>
                        <input type="text" name="ville_cc" id="ville_cc" value="<?php print $_SESSION['form']['ville_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="ville_cc" id="ville_cc" placeholder="Ville" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            
            <tr>
                <td>CP : </td>
                <td>
                    <?php if(isset($_SESSION['form']['cp_cc'])) { ?>
                        <input type="text" name="cp_cc" id="cp_cc" value="<?php print $_SESSION['form']['cp_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="cp_cc" id="cp_cc" placeholder="Code postal" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            
             <tr>
                <td>Pays : </td>
                <td>
                    <?php if(isset($_SESSION['form']['pays_cc'])) { ?>
                        <input type="text" name="pays_cc" id="pays_cc" value="<?php print $_SESSION['form']['pays_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="pays_cc" id="pays_cc" placeholder="Pays" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>

             <tr>
                <td>Numéro de téléphone : </td>
                <td>
                    <?php if(isset($_SESSION['form']['num_cc'])) { ?>
                        <input type="text" name="num_cc" id="num_cc" value="<?php print $_SESSION['form']['num_cc'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="num_cc" id="num_cc" placeholder="Numero de téléphone" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                <input type="submit" name="submit_ccompte" id="submit_ccompte" value="Envoyer la demande" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="Remise à zéro du formulaire" />
                </td>
            </tr>
            
        </table>
        </fieldset>
    </form>
</section>