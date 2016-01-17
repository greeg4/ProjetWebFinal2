<?php
require './lib/php/verifier_connexion.php'; 
?>
<h2 class='titreDvd'>Ajouter dvd</h2>

<?php

if(isset($_GET['submit_dvd'])) {
    extract($_GET,EXTR_OVERWRITE);
    if(trim($Titre_dvd)!='' && trim($Prix_dvd)!='') {
        $mg2 = new AjoutDvdManager($db);
        $retour = $mg2->adddvd($_GET);
        if($retour==1){
            $texte="<span class='txtGras'>Demande enregistrée.<br /></span>";
        }
        else if ($retour==2) {
            $texte="<span class='txtGras'>Déjà présent</span>";
        }    
        if(isset($_SESSION['form'])) {unset($_SESSION['form']);}                
    }
    else {
        $texte="Complétez tous les champs.";
        if(trim($Titre_dvd)!='') {$_SESSION['form']['Titre_dvd']=$Titre_dvd;}
        if(trim($Prix_dvd)!='') {$_SESSION['form']['Prix_dvd']=$Prix_dvd;}
    }
}
?>
<img src="../admin/images/banniereDvd.png" alt="Dvd" />
&nbsp;

<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<section id="leform">
    <form id="form_ajout_jeu" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtDvd">Renseignements</legend>
        <table class="tabDvd">
            
           <tr>
                <td>Titre : </td>
                <td>
                    <?php if(isset($_SESSION['form']['Titre_dvd'])) { ?>
                    <input type="text" name="Titre_dvd" id="Titre_jeu" value="<?php print $_SESSION['form']['nom_client'];?>"/>
                    <?php
                    }
                    else{
                         ?>
                        <input type="text" name="Titre_dvd" id="Titre_jeu" placeholder="Titre" required/>
                        <?php
                    }
                    ?> <div id="error"></div>
                </td>
            </tr>
          
            <tr>
                <td>Prix : </td>
                <td>
                     <?php if(isset($_SESSION['form']['Prix_dvd'])) { ?>
                    <input type="number" step="0.01" min="0" name="Prix_dvd" id="Prix_jeu" value="<?php print $_SESSION['form']['Prix_dvd'];?>"/>
                     <?php
                    }
                    else{
                         ?>
                        <input type="number" step="0.01" min="0" name="Prix_dvd" id="Prix_jeu" placeholder="Prix" required/>
                        <?php
                    }
                    ?> <div id="error"></div>
                </td>
            </tr>
            
           
            <?php
                $aj=new AjoutDvdManager($db);
                $idreal=$aj->getRealId();
                $realisateur=$aj->getRealisateur();
                $idgenre=$aj->getGenreId();
                $genre=$aj->getGenre();
                $idsupp=$aj->getSupportId();
                $support=$aj->getNomSupp();
            ?>
            <tr>
                <td>Realisateur :  </td>
                <td><select name="Realisateur_dvd">
                        <?php
                            for($i=0;$i<count($idreal);$i++)
                            {
                                $var = $idreal[$i]->idreal;
                                $var2 = $realisateur[$i]->nomreal;
                                print "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les developpeur de la base de donnee-->
                    </select></td>
            </tr>
            
            <tr>
                <td>Genre : </td>
                <td><select name="Genre_dvd">
                        <?php
                            for($i=0;$i<count($idgenre);$i++)
                            {
                                $var = $idgenre[$i]->idgenre;
                                $var2 = $genre[$i]->genre;  
                                echo "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les genres de la base de donnee-->
                    </select></td>									
            </tr>				

             <tr>
                <td>Support : </td>
                <td><select name="Support_dvd">
                        <?php
                            for($i=0;$i<count($idsupp);$i++)
                            {
                                $var=$idsupp[$i]->idsupp;
                                $var2=$support[$i]->nomsupp;
                                echo "<option value={$var}>{$var2}</option>";
                            }
                        ?>
                    <!--rajouter les support de la base de donnee-->
                    </select></td>									
            </tr>	
            
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_dvd" id="submit_jeu" value="Cliquez pour ajouter" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="Remise a zero du formulaire" />
                </td>
            </tr>
        </table>
        </fieldset>
    </form>
</section>
