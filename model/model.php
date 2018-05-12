<?php
include("daoImmo.php");

//---------------------------------------------------------------------
class Model{

private	$monDao;


//---------------------------------------------------------------------
function __construct()
	{
	$this->monDao=new DaoImmo();
	}
//---------------------------------------------------------------------
function getAllOrderBy($ordre)
	{
	return $this->monDao->getAllOrderBy($ordre);
	}
//---------------------------------------------------------------------
function getAllByVille($ville)
	{
	return $this->monDao->getAllByVille($ville);
	}
//---------------------------------------------------------------------

//---------------------------------------------------------------------
function VerifConnec()
{
	return $this->monDao->VerifConnec();
}

//---------------------------------------------------------------------
function getAllAmdin()
{
	return $this->monDao->getAllAdmin();
}
//---------------------------------------------------------------------

//---------------------------------------------------------------------
function getAllByBudget($budget)
	{
	return $this->monDao->getAllByBudget($budget);
	}
//---------------------------------------------------------------------
function getAllByBudgetGenre($budget,$genre)
	{
	return $this->monDao->getAllByBudgetGenre($budget,$genre);
	}
//---------------------------------------------------------------------
//---------------------------------------------------------------------
function getMaxi()
	{
	return $this->monDao->getMaxi();
	}
//---------------------------------------------------------------------
function getMini()
	{
	return $this->monDao->getMini();
	}
//---------------------------------------------------------------------
function getMoyen()
	{
	return $this->monDao->getMoyen();
	}
//---------------------------------------------------------------------
function getNombre()
	{
	return $this->monDao->getNombre();
	}
//---------------------------------------------------------------------
function getSupMoyenne()
	{
	return $this->monDao->getSupMoyenne();
	}
//---------------------------------------------------------------------
function Modif($personne,$ville,$budget,$genre,$ide)
	{
	return $this->monDao->Modif($personne,$ville,$budget,$genre,$ide);
	}
//function Supp($ide)
//	{
//	return $this->monDao->Supp($ide);
//	}

function Insert($personne,$genre,$ville,$budget,$superficie)
	{
	return $this->monDao->Insert($personne,$genre,$ville,$budget,$superficie);
	}



function getAllById($id)
	{
	return $this->monDao->getAllById($id);
	}
//---------------------------------------------------------------------
function getVilleByVilleStartWith($ville)
	{
	$t=$this->monDao->getVilleByVilleStartWith($ville);
	return $t;
	}

};// fin de classe

?>
