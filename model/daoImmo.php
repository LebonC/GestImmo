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
  function getAllOrderBy($ordre)
	{ 
	//echo "Ordre : ".$ordre."<br>";
	$strSQL = "SELECT idDemande, idPersonne, genre, ville, budget, superficie FROM demande order by ".$ordre;
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
function Insert($personne,$ville,$budget,$genre)
	{
	$Insert=$this->prepare("INSERT INTO demande (isDemande, idPersonne, genre, ville, budget, superficie) VALUES ('', '', '?', '?', '?', '?')");
	$Insert->execute(array($personne,$ville,$budget,$genre));	
	}






//----------------------------------------------------------------------	
	function getAllById($id)
	{
	$getAllById=$this->prepare("SELECT * FROM demande WHERE idDemande = ?");
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
