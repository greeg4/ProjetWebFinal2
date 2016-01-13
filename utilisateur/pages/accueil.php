
<h2>Bienvenu sur "DVD en folie" </h2>
<?php
//accueil.php est contenu dans l'index, qui contient une
//instance de db
$accueilManager = new AccueilManager($db);
$texteAcc = $accueilManager->getTexteAcc();
/*echo 'le print r donne : ';
    print_r($texteAcc[0]);
echo'apres print_r';*/


if(count($texteAcc) == 0)
{
    echo "vide";
}
else
    {

    for($i = 0; $i<count($texteAcc);$i++)
    {

    /*echo $texteAcc[$i]->gettexte();-->*/
    }
}



?>
<img src="../admin/images/banniereAccueilUser.png" alt="Jeux video" />
&nbsp;
<div id="mot" class="up txtMauv">
    <?php for($i = 0; $i<count($texteAcc);$i++)
    {
        print "<br/>";
        utf8_decode(print $texteAcc[$i]->mot);
        print "<br/>";
    }
    ?>
</div>



<!---->

<p><span class="txtGras"> Nous ferons tout pour satisfaire votre demande. </span>
</p>
<?php
    //$accueilManager->faireQqch();
?>
<!--
<section id="avertisst">    
    Toute r&eacute;servation ...
    <input type="button" id="cacher" value="Cacher"/>
</section>
-->
<section id="avertisst">    
    Nous ne reprenons aucun article déballé !!  
</section>
 <input type="button" id="cacher" value="Cacher l'avertissement"/>
 
 <!--<section id="no-js" class="txtRed txtGras">
     Pour plus de confort d'utilisation, veuillez activer javascript!
 </section>