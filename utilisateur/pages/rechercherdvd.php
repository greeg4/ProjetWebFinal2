<h2 id="titre_page">Rechercher DVD</h2>

<?php
if (isset($_POST['submit_rech'])) {
    echo 'dans le get appui bouton';
    extract($_GET, EXTR_OVERWRITE);
    $r = new rechmanager($db);
    if (trim($titre) != '' && trim($support) != '' && trim($realisateur) != '') {
        $cat = $r->getdvdall($titre, $support, $realisateur);
    } else if (trim($titre) != '' && trim($support) != '') {
        $cat = $r->getdvdts($titre, $support);
    } else if (trim($titre) != '' && trim($realisateur) != '') {
        $cat = $r->getdvdtr($titre, $realisateur);
    } else if (trim($support) != '' && trim($realisateur) != '') {
        $cat = $r->getdvdsr($support, $realisateur);
    } else if (trim($titre) != '') {
        $cat = $r->getdvdt($titre);
    } else if (trim($support) != '') {
        $cat = $r->getdvds($support);
    } else if (trim($realisateur) != '') {
        $cat = $r->getdvdr($realisateur);
    }
}
?><?php
if (isset($_GET['submitcatalogue'])) {
    extract($_GET, EXTR_OVERWRITE);
    if (trim($idClient) != '') {
        $mg2 = new achatManager($db);
        $retour = $mg2->getAchat($_GET);
        if ($retour == 1) {
            $texte = "<span class='txtGras'>Demande enregistrée</span>";
        }
        if (isset($_SESSION['form'])) {
            unset($_SESSION['form']);
        } else {
            $texte = "Champs manquants.";
            if (trim($idClient) != '') {
                $_SESSION['form']['idClient'] = $idClient;
            }
        }
    }
}

if (isset($cat)) {
    ?>
    <form id="formachat" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <table>
            <tr>
                <td>Votre ID : </td>
                <td>
    <?php if (isset($_SESSION['form']['idClient'])) { ?>
                        <input type="text" name="idClient" id="id_client" value="<?php print $_SESSION['form']['idClient']; ?>"/>
        <?php
    } else {
        ?>
                        <input type="text" name="idClient" id="id_client" placeholder="Identifiant" required/>
        <?php
    }
    ?>

                </td>
            </tr>
            <tr><td>Titre</td><td>Prix</td><td>Genre</td><td>Realisateur</td><td>Support</td><td>Commander</td></tr>
                    <?php
                    for ($i = 0; $i < count($cat); $i++) {
                        $titre = $cat[$i]->titre;
                        $prix = $cat[$i]->prix;
                        $genre = $cat[$i]->genre;
                        $realisateur = $cat[$i]->realisateur;
                        $support = $cat[$i]->support;
                        $idd = $cat[$i]->idDVD;
                        $nom = "achat";
                        $id = "cc";
                        $ty = "radio";
                        print "<tr><td>{$titre}</td><td>{$prix}</td><td>{$genre}</td><td>{$realisateur}</td><td>{$support}</td><td><input type={$ty} name={$nom} id={$id} value={$idd}/></td></tr>";
                    }
                    ?>
            <tr> 
                <td></td><td></td><td></td><td></td><td></td><td></td>  <td colspan="2">

                    <input type="submit" name="submitcatalogue" id="submitcatalogue" value="Acheter"/>

                    &nbsp;&nbsp;&nbsp;
                </td>
            </tr>

        </table>
    </form>
<?php } ?>
<?php if (!isset($cat)) { ?>
    <form id="form_rech" action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
        <fieldset id="recherche">
            <legend class="txtRech txtGras">Recherche</legend>
            <table id='tabRech'>
                <tr>
                    <td>Titre: </td>
                    <td><?php if (isset($_SESSION['form']['titre'])) { ?>
                            <input type="text" name="titre" id="titre" value="<?php print $_SESSION['form']['titre']; ?>"/>
        <?php
    } else {
        ?>
                            <input type="text" name="titre" id="titre" placeholder="Titre"/>
        <?php
    }
    ?>

                    </td>
                </tr>
                <tr>
                <tr>
                    <td>Support: </td>
                    <td>
                        <?php if (isset($_SESSION['form']['support'])) { ?>
                            <input type="text" name="support" id="genre" value="<?php print $_SESSION['form']['support']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="support" id="genre" placeholder="Support"/>
        <?php
    }
    ?>
                      
                    </td>
                </tr>
                <tr>
                    <td>Realisateur : </td>
                    <td>
                        <?php if (isset($_SESSION['form']['realisateur'])) { ?>
                            <input type="text" name="realisateur" id="real" value="<?php print $_SESSION['form']['realisateur']; ?>"/>
                            <?php
                        } else {
                            ?>
                            <input type="text" name="nomreal" id="real" placeholder="Realisateur"/>
                            <?php
                        }
                        ?>
                       
                    </td>
                </tr>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit_rech" id="submit_rech" value="Envoyer" />
                        &nbsp;&nbsp;&nbsp;
                        <input type="reset" id="reset" value="Remise a zero du formulaire" />
                    </td>
                </tr>

            </table>
        </fieldset>
    </form>
<?php } ?>
<section id="resultat" class="txtGreen"><?php if (isset($q)) print $q; ?></section>
