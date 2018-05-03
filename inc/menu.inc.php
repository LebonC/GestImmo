
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="../index.php"><img class="logo" src="../images/logo.png" alt="logo"></a>
    </div>
    <br>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">Gestion Agence Immobilière</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consulter par :<span class="caret"></span></a>
        <br>
        <ul class="dropdown-menu">
          <li> <a href=./controller.php?cas=idDemande target=controller> ↓  Id </a> </li>
          <li> <a href=./controller.php?cas=budget target=controller> ↓ Budget</a></li>
          <li> <a href=./controller.php?cas=personne target=controller>  ↓ Personne </a></li>
          <li> <a href=./controller.php?cas=genre target=controller>  ↓ Genre </a></li>
          <li> <a href=./controller.php?cas=ville target=controller> ↓ Ville </a></li>
          <li> <a href=./controller.php?cas=superficie target=controller> ↓ Superficie</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Statistique<span class="caret"></span></a>
      <br>
      <ul class="dropdown-menu">
        <li> <a href=./controller.php?cas=budmoy target=controller>Budget moyen </a></li>
        <li> <a href=./controller.php?cas=mini target=controller> Budget mini</a></li>
        <li> <a href=./controller.php?cas=maxi target=controller> Budget maxi </a></li>
        <li> <a href=./controller.php?cas=budsupmoy target=controller> Budget > Moyenne </a></li>
        <li> <a href=./controller.php?cas=nbbiens target=controller> Nombre de biens </a></li>
      </ul>
      </li>      
      <li><a href=./controller.php?cas=ConsultSpe>Consultation Spécifique</a></li>
      <li><a href=./controller.php?cas=Modification>Modification</a></li>
      <li><a href="#">Connexion</a></li>
    </ul>
  </div>
</nav>
<hr>


















<!--<div id="menu">
    <h2> Menu </h2>    
    <h4> Tri </h4>
    <ul>
      <li> <a href=./controller.php?cas=idDemande target=controller> ↓  Id </a> </li>
      <li> <a href=./controller.php?cas=budget target=controller> ↓ Budget</a></li>
      <li> <a href=./controller.php?cas=personne target=controller>  ↓ Personne </a></li>
      <li> <a href=./controller.php?cas=genre target=controller>  ↓ Genre </a></li>
      <li> <a href=./controller.php?cas=ville target=controller> ↓ Ville </a></li>
      <li> <a href=./controller.php?cas=superficie target=controller> ↓ Superficie</a></li>
    </ul>
    <hr>
    <h4> Filtrer </h4>
    <ul>
      <li> <a href=./controller.php?cas=budmoy target=controller>Budget moyen </a></li>
      <li> <a href=./controller.php?cas=mini target=controller> Budget mini</a></li>
      <li> <a href=./controller.php?cas=maxi target=controller> Budget maxi </a></li>
      <li> <a href=./controller.php?cas=budsupmoy target=controller> Budget > Moyenne </a></li>
      <li> <a href=./controller.php?cas=nbbiens target=controller> Nombre de biens </a></li>
    </ul>
    <hr>
    <h4>Recherche par Critères</h4>
    <div class="contenaire" id="formulaire">
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

                  <tr>
                        <th>
                        <form class="from-horizontal" name=form4 action=./controller.php method=post target=controller> id n&deg;
                          <div class="form-group">
                              <input class="form-control" type=text size=5 name=ide>
                              <BR>
                              <input class="form-control" type=hidden name=cas value=modifier>
                              <input class="form-control" type=radio name=choix value=modifier>modifier
                              <BR>
                              <input class="form-control" type=radio name=choix value=supprimer>supprimer
                              <BR>
                              <input class="form-control" type=button name=bouton value=Choix? onclick=javascript:controle(form4,ide,ide);>
                          </BR>
                        </form>
                        </th>
                  </tr>
            </table>
      </div>
      <br>
      <hr>
      <div id="formulaire">
      <h4>Action</h4>
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
      </div>
      <br>
</div>
-->

