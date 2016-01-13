<h2 id="titre_page"> Commander un jeu </h2>

<!--creer une table contact afin de mettre ces données dans la DB ?-->
<section id="leform">
    <form id="form_contact" action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
        <fieldset id="Client">
        <legend class="txtMauv txtGras">Renseignements : </legend>
        <table>
            
            <tr>
                <td>Monsieur <input type="radio" name="type" id="typeH" value="homme" />
                &nbsp;&nbsp;&nbsp;Madame <input type="radio" name="type" id="typeF" value="femme" />
                </td>
            </tr>
          
            <tr>
                <td>Nom : </td>
                <td><input type="text" name="nom_client" id="nom_client" /></td>
            </tr>
            
            <tr>
                <td>Prénom :  </td>
                <td><input type="text" name="pren_client" id="pren_client" /></td>
            </tr>
            
            <tr>
                <td>Email : </td>
                <td><input type="email" name="em_client" id="em_client" /></td>									
            </tr>				

            <tr>
                <td>Titre dvd : </td>
                <td><input type="dvd" name="dvd_client" id="dvd_client" /></td>									
            </tr>
            <tr>
                <td colspan="2">
                <input type="submit" name="submit_reserv" id="submit_reserv" value="Cliquez ici pour commander" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" id="reset" value="R&eacute;initialiser le formulaire" />
                </td>
            </tr>

        </table>
        </fieldset>
    </form>
</section>
