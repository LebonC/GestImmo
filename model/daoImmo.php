<?php
include ("MyPDO.php");
//*****************************************************************************************
class DaoImmo extends MyPDO
{

	// constructeur qui appelle constructeur de la super classe qui effectue la connexion
	// avec les variables contenues dans login.php
    function __construct()
	{
	include ("login.php");
	parent::__construct('mysql:host='.$serveur.';dbname='.$mabase,$login, $motdepasse);
    } // fin constructeur
//---------------------------------------------------------------------
    
	  function getAllAdmin()
	  {
		return $this->query("SELECT * FROM admin");
	  }
//---------------------------------------------------------------------
	  function VerifConnec()
    {
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$admin = $this->getAllAdmin();
    	while ($result = $admin->fetch(PDO::FETCH_ASSOC))
    	{
    		if ($result["nom_utilisateur"] == $username && $result["mdp"] == $password) 
    		{
    			session_start();
    			$_SESSION['nom_utilisateur'] = $result['nom_utilisateur'];
    			$_SESSION['mdp'] = $result['mdp'];
    			return true;
    		}
    	}
    	return false;
    }

//---------------------------------------------------------------------
  function getAllOrderBy($ordre)
	{ 
	//echo "Ordre : ".$ordre."<br>";
	$strSQL = "SELECT idDemande, prenom, genre, ville, budget, superficie FROM demande d, personne p WHERE d.idPersonne=p.idPersonne order by ".$ordre;
	$getAllOrderBy=$this->prepare($strSQL);
	$getAllOrderBy->execute();
	$t=$getAllOrderBy->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
	function getAllByVille($ville)
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getAllByVille=$this->prepare("SELECT * FROM demande WHERE ville= ?");
	$getAllByVille->execute(array($ville));
	$t=$getAllByVille->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------






//---------------------------------------------------------------------
	function getAllByBudget($budget){
	$getAllByBudget=$this->prepare("SELECT * FROM demande WHERE budget <= ?");
	$getAllByBudget->execute(array($budget));
	$t=$getAllByBudget->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
	function getAllByBudgetGenre($budget,$genre){
	$getAllByBudgetGenre=$this->prepare("SELECT * FROM demande WHERE budget <= ? AND genre = ?");
	$getAllByBudgetGenre->execute(array($budget,$genre));
	$t=$getAllByBudgetGenre->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
	function getMaxi()
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getMaxi=$this->prepare("SELECT MAX(budget) AS Budget_Max FROM demande");
	$getMaxi->execute(array());
	$t=$getMaxi->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
	function getMini()
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getMini=$this->prepare("SELECT MIN(budget) AS Budget_Minim FROM demande");
	$getMini->execute(array());
	$t=$getMini->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
	function getMoyen()
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getMoyen=$this->prepare("SELECT AVG(budget) AS Moyenne_Budget FROM demande");
	$getMoyen->execute(array());
	$t=$getMoyen->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
	function getNombre()
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getNombre=$this->prepare("SELECT COUNT(budget) AS Nombre_De_Biens FROM demande");
	$getNombre->execute(array());
	$t=$getNombre->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
	function getSupMoyenne()
	{//http://php.net/manual/fr/pdostatement.execute.php
	$getSupMoyenne=$this->prepare("SELECT * FROM demande WHERE budget > (SELECT AVG(budget) AS Moyenne_Budget FROM demande)");
	$getSupMoyenne->execute(array());
	$t=$getSupMoyenne->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
	function Modif($personne,$ville,$budget,$genre,$ide)
	{
	$Modif=$this->prepare("UPDATE demande d, personne p SET p.prenom= ?, d.ville= ?, d.budget= ?, d.genre= ? WHERE p.idPersonne=d.idPersonne AND d.idDemande= ?");
	$Modif->execute(array($personne,$ville,$budget,$genre,$ide));
	// LA BONNE REQ DANS PHPMYADMIN
	// UPDATE demande d, personne p SET p.prenom='jean', d.ville= 'Saint-Joseph' , d.budget= '150000' , d.genre= 'maison' , d.superficie= '120' WHERE p.idPersonne=d.idPersonne AND idDemande = 2;
	}
//---------------------------------------------------------------------
	//function Supp($ide)
	//{
	//$Supp=$this->prepare("DELETE FROM demande d, personne p WHERE p.idPersonne=d.idPersonne AND p.idPersonne= ?");
	//$Supp->execute(array($ide));
	//$SuppIdP=$this->prepare("DELETE FROM demande WHERE idDemande= ?");
	//$SuppIdP->execute(array($ide));
	//}
function Insert($personne,$genre,$ville,$budget,$superficie)
	{
		
		$Resultat=$this->query("SELECT * FROM personne WHERE prenom = '$personne'")->fetchAll(PDO::FETCH_ASSOC);
		if(isset($Resultat[0]))
		{
			$id=$Resultat[0]['idPersonne'];
			$MaxId2=$this->query("SELECT MAX(idDemande) FROM demande")->fetchAll(PDO::FETCH_NUM)[0][0]+1;
			$this->query("INSERT INTO demande (idDemande, idPersonne, genre, ville, budget, superficie) VALUES ($MaxId2, $id, '$genre', '$ville', $budget, $superficie)");
		}
		else
		{
			$MaxId=$this->query("SELECT MAX(idPersonne) FROM personne")->fetchAll(PDO::FETCH_NUM)[0][0]+1;
			$Insert2=$this->query("INSERT INTO personne (idPersonne, prenom) VALUES ($MaxId, '$personne')");
			$MaxId2=$this->query("SELECT MAX(idDemande) FROM demande")->fetchAll(PDO::FETCH_NUM)[0][0]+1;
			$this->query("INSERT INTO demande (idDemande, idPersonne, genre, ville, budget, superficie) VALUES ($MaxId2, $MaxId, '$genre', '$ville', $budget, $superficie)");
		}
	}






//----------------------------------------------------------------------	
	function getAllById($id)
	{
	$getAllById=$this->prepare("SELECT * FROM demande d, personne p WHERE d.idPersonne=p.idPersonne  AND idDemande = ?");
	$getAllById->execute(array($id));
	$t=$getAllById->fetchAll(PDO::FETCH_OBJ);
	return $t;
	}
//---------------------------------------------------------------------
	function getVilleByVilleStartWith($ville)
	{
	$getVilleByVilleStartWith=$this->prepare("SELECT distinct ville FROM demande WHERE ville like ? ");
	$ville=$ville.'%';
	$retour=array();
	$getVilleByVilleStartWith->setFetchMode(PDO::FETCH_NUM);
	$getVilleByVilleStartWith->execute(array($ville));
	for ($i=0;$i<$getVilleByVilleStartWith->rowCount();$i++)
		{
		$retour=array_merge($retour,$getVilleByVilleStartWith->fetch());
		}
	return $retour;
	}
//---------------------------------------------------------------------
	
};// fin de classe
