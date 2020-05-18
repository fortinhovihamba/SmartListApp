         <!-----------top nav --------------->
         <div class="col-xl-10 col-lg-10 col-md-8 ml-auto bg-dark fixed-top py-2 top-navbar">
              <div class="row align-item-center">
                <div class="col-md-3">
                    <h5 class="text-light text-uppercase mb-0">
                      Dashboad</h5>
                </div>

                <div class="col-md-3">
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
                <div class="col-md-4">
                  <ul class="navbar-nav">
                    <li class="nav-item icon-parent text-white">
                      <a href="#"class="nav-link  text-white">
                        <i class="fa fa-user text-white fa-lg"></i>
                        Bonjour : <?php //print $user ?>
                      </a>

                    <li class="nav-item ml-md-auto">

                      <a href="../logout.php"class="nav-link" onclick="return confirm('Etes-vous sûr de vouloir quitter l\'application ?')" >
                       <i class="fa fa-power-off text-danger fa-lg"></i>
                       
                     </a>
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
