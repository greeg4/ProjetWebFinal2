<h2 id="titre_page"> Catalogue admin </h2>
<?php
if(isset($_GET['submitcatalogue'])) {
    extract($_GET,EXTR_OVERWRITE);
      if(trim($id_client)!='')
	  {	  
            $mg2 = new achatManager($db);
            $retour = $mg2->getAchat($_GET);  
            if($retour==1)
            {
                $texte="<span class='txtGras'>Votre demande a bien été enregistrée</span>";
            }
	    else if ($retour==2){
                $texte="<span class='txtGras'>L'idclient n'a pas pu être trouvé</span>";
            }
            else 
            {
                $texte="Complétez tous les champs.";
                if(trim($id_client)!='') {$_SESSION['form']['id_client']=$id_client;}
                
            }
            if(isset($_SESSION['form'])) {unset($_SESSION['form']);} 
        }
    }
?>

  
        
<section id="resultat" class="txtGreen"><?php if(isset($texte)) print $texte; ?></section>
<form id="formachat" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
<table>
     <tr>
         <?php
            $cm=new catManager($db);
            $cat=$cm->getCat($_GET);
         ?>
                <td>Votre ID : </td>
                <td>
                    <?php if(isset($_SESSION['form']['id_client'])) { ?>
                        <input type="text" name="id_client" id="id_client" value="<?php print $_SESSION['form']['id_client'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="id_client" id="id_client" placeholder="Votre identifiant" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
<tr><td>Titre</td><td>Prix</td><td>Genre</td><td>Réalisateur</td><td>Support</td><td>Commander</td></tr>
<?php
    for($i=0;$i<count($cat);$i++)
    {
        $titre=$cat[$i]->titre;
        $prix=$cat[$i]->prix;
        $genre=$cat[$i]->genre;
        $realisateur=$cat[$i]->realisateur;
        $support=$cat[$i]->support;
        $idj=$cat[$i]->iddvd;
        $nom="achat";
        $id="achat";
        $ty="radio";
        print "<tr><td>{$titre}</td><td>{$prix}</td><td>{$genre}</td><td>{$realisateur}</td><td>{$support}</td><td><input type={$ty} name={$nom} id={$id} value={$idj}/></td></tr>";
    }
?>
<tr> 
    <td></td><td>Valeur</td><td><a href="index.php?page=printcat">Catalogue en PDF</a></td><td></td><td></td><td></td>  <td colspan="2">
                    
<input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>
<!--<input type="hidden" name="hd" id="hd" value="hd"/>-->
                &nbsp;&nbsp;&nbsp;
                </td>
            </tr>

</table>
</form>