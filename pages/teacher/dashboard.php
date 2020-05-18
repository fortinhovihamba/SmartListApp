<?php
//On demarre la session pour reconnaitre notre student
session_start();
  if (isset($_SESSION['id'])) {

    $user = $_SESSION['name'];
    $id = $_SESSION['id'];

  }
if(!empty($user)){

require_once ('includes/header.php');
?>
<section>


        <?php
          include ((isset($_GET['p'])?$_GET['p']:'program').'.php');
          $content_for_layout =ob_get_clean();
        ?>
        <?= $content_for_layout;?>


</section>

<?php
require_once ('includes/footer.php');
}
else {
  // code...
  header('location:../forbidden.php');
}

?>
