<?php
//On demarre la session pour reconnaitre notre idUser
 session_start();
	if (isset($_SESSION['id'])) {

	    $user = $_SESSION['name'];
	    $id = $_SESSION['id'];

	}
			if(!empty($user)){

			include('includes/head.php') ;
			include('includes/sidebar.php');
			include('includes/topbar.php');

			?>
			<section>
			  <div class="container">
			    <div class="row">

			    <?php
			      include ((isset($_GET['p'])?$_GET['p']:'rapport').'.php');
			      $content_for_layout =ob_get_clean();
			    ?>
			    <?= $content_for_layout;?>
			    </div>
			  </div>
			</section>

			<?php

			include('../includes/footer.php');
	}
	else {
	  // code...
	  header('location:../forbidden.php');
	}
?>
