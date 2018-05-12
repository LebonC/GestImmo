<?php
class Vue
{
	function afficheTab($tab,$largeur)
 	{
		$this->enteteHtml();
		//Entrées: 
			//$tab: tableau d'objets contenant le résultat de la requête
			//$largeur: largeur du tableau dans la page Html 100 pour 100%, 50 pour 50%...
		//Sortie:	rien
		//Traitement:
			// Affichage du tableau sur largeur désirée
			//echo "affiche";
			//print_r($tab);
		$t=new ArrayObject($tab[0]);
		$colonne=count($t);

		if (is_array($tab))
			{
				$ligne=count($tab);
				$largeurCellule=80/$colonne."%";
				reset($tab);
				echo '<h3>Gestion des demandes</h3>';
				echo'<h4>';print_r($_REQUEST);echo'</h4>';
				echo "<table width=$largeur%  ><tr>";
				//affiche premiere ligne en fixant largeur colonnes: 
				//nom des colonnes= nom des attributs du premier objet
						
				//cette boucle affiche la première ligne avec les attributs de l'objet comme titre de colonne
				//ceci sans connaître les noms des attributs
				foreach($tab[0] as $attribut => $val) {
					echo "<th class= titre width=$largeurCellule > $attribut</th>";
				}
				
				//affiche un objet par ligne: les valeurs de ses attributs-------------------------
				foreach ($tab as $e)
				{
					echo "<tr>";
					// boucle permettant d'afficher les valeurs des attributs 
					//sans connaitre les noms des attributs
					foreach ($e as $attribut => $val)
						{
							echo "<td align=center>$val </td>";
						}
					echo "</tr>";
				
				}// fin foreach $tab
				echo "</table>";
				include "../inc/footer.inc.php";
			}// fin if isarray
		else echo "<script language=javascript>alert(\"Aucun resultat pour votre demande\");</script>";
	}

	//----------------------------------------------
	function formulaireModif($t)
	{
		//print_r($t);
		$this->enteteHtml();
		echo '<h3>Dashboard</h3>';
		echo " 
			<table  class=cadre width=60%  >
			<tr ><td align=center>
			<form name= formulaire action=./controller.php  method=post target=controller> 
			prenom :<input type=text size=10 name=personne value=$t->prenom>
			ville:<input type=text size=30 name=ville value=$t->ville>
			budget:<input type=number size=10 name=budget value=$t->budget>
			genre:<input type=text size=12 name=genre value=$t->genre>
			<input type=hidden name=cas value=VoiciLesModif>
			<input type=hidden name=ide value=$t->idDemande></td></tr>
			<tr><td align=center>
			superficie:<input type=number name=superficie value=$t->superficie></td></tr>
			<tr><td align=center>
			<input type=button value=Ok onclick=javascript:Validation();>
			</form></td></tr></table></div>
		";

		include "../inc/footer.inc.php";
	}

	//----------------------------------------------
	function afficheAccueil()
	{
		$this->enteteHtml();
		echo '<div class="container">
			<h3>Cas « Gestin Agence immobilière » </h3>
				<p>
					L\'agence immobilière gère les demandes d’achat d\’appartements et de maisons pour le compte de propriétaires. 
					Les clients qui souhaitent acheter un bien, effectuent des demandes ;
				</p>
				<p>
					L\'agence  enregistre alors demande avec son identifiant, son nom,  son budget, le type  de bien (maison, appartement) et la superficie. Les biens sont dans des localités, dont on indique le nom. 
				</p>
				<p>
					Vous travaillez  pour  la SSII  ailTECH. Vous êtes chargé de créer une interface web permettant d\'effectuer différentes requêtes SQL sur la table des demandes.
				</p>
			</div>
			';
		require("../inc/footer.inc.php");
	}

	function afficheModification()
	{
		$this->enteteHtml();
		echo'
					<h3>Modification</h3>
						<br>
						<form class="from-horizontal" name=form4 action=./controller.php method=post target=controller> id n&deg;
                          <div class="form-group">
                              <input type=text size=5 name=ide>
                              <BR>
                              <label class="radio-inline"><input type=hidden name=cas value=modifier></label>
                              <hR>
                              <label class="radio-inline"><input type=radio name=choix value=modifier>modifier</label>
                              <hR>
                              <label class="radio-inline"><input type=radio name=choix value=supprimer>supprimer</label>
                              <hR>
                              <input type=button name=bouton value=Choix onclick=javascript:controle(form4,ide,ide);>
                              <hR>
                          </BR>
                        </form>
				      <h4></h4>
				            <table>
				                  <tr>
				                        <th>
				                              <form class="from-horizontal" action=./controller.php method=post target=controller>
				                                <div class="form-group">
				                                    <input class="form-control" type=hidden name=cas value=insere>
				                                    <input class="form-control" type=submit value=ins&eacute;rer>
				                                </div>
				                              </form>
				                        </th>
				                  </tr>
				            </table>
                        ';
        include "../inc/footer.inc.php";
	}

	function afficheConsultSpe()
	{
		$this->enteteHtml();
		echo'<div class="contenaire" id="formulaire">
			            <table>
			                  <tr>
			                        <th>
			                        <form class="from-horizontal" name=form1 action=./controller.php method=post target=controller> Demande pour la ville de
			                          <div class="form-group">
			                              <input class="form-control" type=text name=ville id=ville size=20>
			                              <input class="form-control" type=hidden name=cas value=villePrecise>
			                              <input class="form-control" type=button name=bouton value=Ville onclick=javascript:controle(form1,ville,ville);>
			                          </div>
			                        </form>
			                        </th>
			                  </tr>

			                  <tr>
			                        <th>
			                        <form class="from-horizontal" name=form2 action=./controller.php method=post target=controller> Demande dont le budget est
			                          <div class="form-group">
			                              < &agrave; <input class="form-control" type=number size=5 name=budget>
			                                    <input class="form-control" type=hidden name=cas value=budgetInferieur>
			                                    <input class="form-control" type=button value=Budget onclick=javascript:controle(form2,budget,budget);>
			                          </div>
			                        </form>
			                        </th>
			                  </tr>

			                  <tr>
			                        <th>
			                        <form class="from-horizontal" name=form3 action=./controller.php method=post target=controller> Demande dont le budget est
			                          <div class="form-group">
			                              < &agrave; <input class="form-control" type=number name=budget>
			                                    <br>et dont le genre est
			                                    <br>
			                                    <input class="form-control" type=text size=15 name=genre>
			                                    <input class="form-control" type=hidden name=cas value=budgetGenre>
			                                    <input class="form-control" type=button value=BudgetGenre onclick=javascript:controle(form3,budget,genre);>
			                          </div>
			                        </form>
			                        </th>
			                  </tr>
			            </table>
			      </div>
			</div>';
		include "../inc/footer.inc.php";
	}

	function afficheConnexion()
	{
		
		echo'
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="../asset/Connec.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action=./controller.php?cas=VerifConnec method="POST">
                <h1>Connexion</h1>
                
                <label><b>Nom utilisateur</b></label>
                <input type="text" placeholder="Entrer nom utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id="submit" value="LOGIN" >
            </form>
        </div>
    </body>
</html>
';
	}

	//----------------------------------------------
	function afficheMess($t)
	{
		$this->enteteHtml();
		echo $t;
	}

	//----------------------------------------------
	function afficheMessJson($t)
	{
		echo json_encode($t);
	}

	//----------------------------------------------

	function formulaireNouveau()
	{
		$this->enteteHtml();
		echo '<h3>Insérer</h3>';
		echo " 
			<table  class=cadre width=60%  >
			<tr ><td align=center>
			<form name= formulaire action=./controller.php?cas=nouveau  method=post target=controller> 
			Prenom:<input type=text size=30 name=personne value=>
			ville:<input type=text size=30 name=ville value=>
			budget:<input type=number size=10 name=budget value=>
			genre:<input type=text size=12 name=genre value=>
			<input type=hidden name=cas value=nouveau>
			<tr><td align=center>
			superficie:<input type=number name=superficie value=></td></tr>
			<tr><td align=center>
			<input type=button value=Insérer onclick=javascript:Validation();>
			</form></td></tr></table></div>
		";
		include "../inc/footer.inc.php";

	}

	//----------------------------------------------
	function enteteHtml()
	{
		include "../inc/header.inc.php"; 
		include "../inc/menu.inc.php";
		echo '<div id="bloc">';
	}

};// fin de classe Vue
?>
