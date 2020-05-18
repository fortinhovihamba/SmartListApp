<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="fas fa-book-reader fa-2x mx-3"></i> SMARTLIST</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="margin-left:50%">

      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php?p=program">PROGRAMME </a>
      </li>

            <li class="nav-item">
        <a class="nav-link" href="dashboard.php?p=program">DOCUMENTATION </a>
      </li>

    </ul>
    <ul class="navbar-nav navbar-right" style="margin-right:6%;">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <i class="fa fa-user text-warning fa-lg"></i> &nbsp;Welcome : <?php print $user ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown bg-dark text-white">
          <a class="dropdown-item" href="dashboard.php?p=profil&id=<?=$id?>"><i class="fa fa-user text-success fa-lg"></i>
            Profil</a>
          <a class="dropdown-item" href="dashboard.php?p=editp&id=<?=$id?>"><i class="fa fa-user-edit text-primary fa-lg"></i>

              Modifer </a>
              <a class="dropdown-item" href="dashboard.php?p=editp&id=<?=$id?>"><i class="fa fa-wrench text-primary fa-lg"></i>

                 Mot de passe </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php">
            <i class="fa fa-power-off text-danger fa-lg"></i> Se déconnecter</a>
        </div>
      </li>
    </ul>

  </div>
</nav>
</div>
