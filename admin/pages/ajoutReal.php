<?php
require './lib/php/verifier_connexion.php'; 
?>
<h2>Ajouter un réalisateur</h2>

<?php

if(isset($_GET['submit_real'])) {
    
    extract($_GET,EXTR_OVERWRITE);
    if( trim($Nom_real)!='' && trim($Pays_real)!='') {
        $mg2 = new AjoutRealManager($db);
        $retour = $mg2->addReal($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Realisateur ajouté !<br /></span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà présent</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($Nom_real)!='') {$_SESSION['form']['Nom_real']=$Nom_real;}
        if(trim($Pays_real)!='') {$_SESSION['form']['Pays_real']=$Pays_real;}
    }
}
?>


<img src="../admin/images/banniereReal.jpeg" alt="banniere réalisateur" />
&nbsp;
<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="leform">
    <form id="form_ajout_dev" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Dev">
        <legend class="txtMauv txtGras">Renseignements du réalisateur : </legend>
        <table>
            <tr>
                <td>Nom: </td>
                <td>
                    <?php if(isset($_SESSION['form']['Nom_real'])) { ?>
                        <input type="text" name="Nom_real" id="Nom_dev" value="<?php print $_SESSION['form']['Nom_real'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="Nom_real" id="Nom_dev" placeholder="Nom" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
          
            <tr>
                <td>Pays du développeur : </td>
                <td><?php if(isset($_SESSION['form']['Pays_real'])) { ?>
                        <input type="text" name="Pays_real" id="Pays_dev" value="<?php print $_SESSION['form']['Pays_real'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="Pays_real" id="Pays_dev" placeholder="Pays" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
            
                       
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_real" id="submit_reserv" value="Cliquez pour ajouter" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="Remise à zéro" />
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</section>