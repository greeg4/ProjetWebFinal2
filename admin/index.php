<!doctype html>
<?php
//INDEX ADMIN
include ('./lib/php/liste_include.php');
$db = Connexion::getInstance($dsn,$user,$pass);
session_start();
$styles = array();
$i2 = 0;
foreach (glob('./lib/css/*.css') as $css) {
    $styles[$i2] = $css;
    $i2++;
}
$scripts=array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i=0;
foreach(glob('./lib/js/jquery/*.js') as $js) {
    $fichierJs[$i]=$js;
    $i++;
    
}

?>

<html>
<head>
	<title>DVD en folie</title>
        <meta charset='UTF-8'/>    
        <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.5-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css"/>
        <?php
        foreach ($styles as $css) {
            ?><link rel="stylesheet" type="text/css" href="<?php print $css; ?>"/>
            <?php
        }
        ?>
        <link rel="stylesheet" type="text/css" href="../utilisateur/lib/css/p_style.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/style_pc.css"/>
	<link rel="stylesheet" type="text/css" href="./lib/css/mediaqueries.css"/>
         <?php
            foreach($fichierJs as $js) {
               ?><script type="text/javascript" src="<?php print $js;?>"></script>
            <?php            
            }
            ?>
        <script type="text/javascript" src="./lib/js/fonctionsJqueryAdmin.js"></script> 
</head>

<body>    
    
    <?php //var_dump($_SESSION);
    //session_destroy();?>
    <section id="all_all">              
	<header id="header">
            <img src="./images/banniereAdmin.jpg" alt="Banniere" id="image_header"/><br />	
            <section id="deconnexion"> 
            <!-- section id="deconnexion">-->
            
                <?php
                    if(isset($_SESSION['admin'])){
                        ?><a href="./lib/php/disconnect.php" class="bDec">Déconnexion</a>
                    <?php
                    }                   
                ?>
            </section>
            
	</header>
        
        <?php if(!isset($_SESSION['admin'])) { 
            ?>
        <section id="login_form">
            <?php
                 require './pages/authentification.php';  
        ?> </section><?php  
        }
            else {
            
        //print "session : ".$_SESSION['admin'];
        ?>
        <section id="exemple">
            <div class="exemple" id="ex2">
               <ul class="nav">
            <!--<nav>-->
		<!--<ul id="menu"> -->
		<?php 
                    if(file_exists('./lib/php/menu.php')){
                        include ('./lib/php/menu.php');
                    }
                ?>
					
		</ul>
            <!--</nav>-->
	</section>
       
	<section id="all">
            
            
            
            <div class="exemple" id="ex2">
                <?php
               // var_dump($_GET);
               // var_dump($_SESSION);
                if(!isset($_SESSION['page'])) {                    
                    $_SESSION['page'] = "accueil";
                }
                if(isset($_GET['page'])) {
                    $_SESSION['page'] = $_GET['page'];
                }
                $chemin='./pages/'.$_SESSION['page'].'.php';
                if(file_exists($chemin)){

                    include ($chemin);
                }     
                                    //print "ch : ".$chemin;
                ?>                      
            </div>
     
	</section>		

	<footer id="footerAc">Copyright 2015-2016 mathieu.lienard@condorcet.be</footer>
              <?php 
             }
            ?>
  </body>
 </html>