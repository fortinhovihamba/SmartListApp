         <!-----------top nav --------------->
         <div class="col-xl-10 col-lg-10 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
              <div class="row align-item-center">
                <div class="col-md-2">
                    <h5 class="text-light text-uppercase mb-0">
                      Dashboad</h5>
                </div>

                <div class="col-md-6">
                  <form method="" action="">
                      <div class="input-group">
                        <input type="text" class="form-control"
                        placeholder="Search...">
                        <button type="button" class="btn btn-success">
                          <i class="fas fa-search text-danger"></i> 
                        </button>
                      </div>
                  </form>
                </div>
                <div class="col-md-3" >
                  <ul class="navbar-nav">
                   <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="fa fa-user text-warning fa-lg"></i> &nbsp;Welcome : <?php print $user ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown bg-dark text-white">
                          <a class="dropdown-item" href="dashboard.php?p=profil&id=<?=$id?>"><i class="fa fa-user text-success fa-lg"></i>
                            Profil</a>
                          <a class="dropdown-item" href="dashboard.php?p=edituser&id=<?=$id?>"><i class="fa fa-user-edit text-primary fa-lg"></i>

                              Modifer </a>
                              <a class="dropdown-item" href="dashboard.php?p=editp&id=<?=$id?>"><i class="fa fa-wrench text-primary fa-lg"></i>

                                 Mot de passe </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="../logout.php" onclick="return confirm('Etes-vous sûr de vouloir quitter l\'application ?')">
                            <i class="fa fa-power-off text-danger fa-lg"></i> Se déconnecter</a>
                        </div>
                      </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-----------End of top-nav--------->
        </div>
      </div>
    </div>
    </nav>
    <!------End of navbar-------------------->
