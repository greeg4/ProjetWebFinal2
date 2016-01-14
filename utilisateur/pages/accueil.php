
<h2 id="titreA">Bienvenu sur "DVD en folie" </h2>
<?php

$accueilManager = new AccueilManager($db);
$texteAcc = $accueilManager->getTexteAcc();


if(count($texteAcc) == 0)
{
    echo "rien";
}
else
    {

    for($i = 0; $i<count($texteAcc);$i++)
    {

    }
}



?>
<img src="../admin/images/banniereAccueilUser.png" alt="Accueil User" />
&nbsp;
<div id="mot" class="up txtA">
    <?php for($i = 0; $i<count($texteAcc);$i++)
    {
        print "<br/>";
        utf8_decode(print $texteAcc[$i]->mot);
        print "<br/>";
    }
    ?>
</div>


<p><span class="txtGras"> Nous ferons tout pour satisfaire votre demande. </span>
</p>
<?php
    
?>

<section id="avertisst">    
    Nous ne reprenons aucun article déballé !!  
</section>
 <input type="button" id="cacher" value="Cacher l'avertissement"/>
 
