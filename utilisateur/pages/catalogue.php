<h2 id="titre_page"> Catalogue </h2>
<?php
if(isset($_GET['submitcatalogue'])) {
    extract($_GET,EXTR_OVERWRITE);
    echo 'idCl : + $idCl + achat: + $achat';
      if(trim($idCl)!='')
	  {	  
            $mg2 = new achatManager($db);
            $retour = $mg2->getAchat($_GET);  
            if($retour==1)
            {
                $texte="<span class='txtGras'>Demande enregistrée</span>";
            }
			if(isset($_SESSION['form'])) {unset($_SESSION['form']);}
            else
            {
                $texte="Champs manquant.";
                if(trim($idCl)!='') {$_SESSION['form']['idCl']=$idCl;}
                
            }
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
                    <?php if(isset($_SESSION['form']['idCl'])) { ?>
                        <input type="text" name="idCl" id="idCl" value="<?php print $_SESSION['form']['idCl'];?>"/>
                    <?php
                    }
                    else {
                        ?>
                        <input type="text" name="idCl" id="idCl" placeholder="Identifiant" required/>
                        <?php
                    }
                    ?>
                        <div id="error"></div>
                </td>
            </tr>
<tr><td>Titre</td><td>Prix</td><td>Genre</td><td>Support</td><td>Réalisateur</td><td>Commander</td></tr>
<?php
    for($i=0;$i<count($cat);$i++)
    {
        $titre=$cat[$i]->titre;
        $prix=$cat[$i]->prix;
        $genre=$cat[$i]->genre;
        $realisateur=$cat[$i]->realisateur;
        $support=$cat[$i]->support;
        $idDVD=$cat[$i]->idDVD;
        $nom="achat";
        $id="cc";
        $ty="radio";
        print "<tr><td>{$titre}</td><td>{$prix}</td><td>{$genre}</td><td>{$support}</td><td>{$realisateur}</td><td><input type={$ty} name={$nom} id={$id} value={$idDVD}/></td></tr>";
    }
?>
<tr> 
    <td></td><td></td><td></td><td></td><td></td><td></td>  <td colspan="2">
                    
<input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>
<!--<input type="hidden" name="hd" id="hd" value="hd"/>-->
                &nbsp;&nbsp;&nbsp;
                </td>
            </tr>
<a href="index.php?page=printcat">PDF du catalogue</a>
</table>
</form>
