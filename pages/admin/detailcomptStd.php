<?php
require_once('../../app/cnx.php');

$id=isset($_GET['id'])?$_GET['id']:0;

$query = "SELECT * 
      FROM t_comptstd 
        LEFT JOIN t_student ON t_student.idstd=t_comptstd.idstd
        WHERE t_comptstd.idcmptstd='$id'";

$resultats=$bdd->query($query);
$data = $resultats->fetch();
$name =$data['name'];
$prenom =$data['prenom'];
$sexe =$data['sexe'];
$tel =$data['tel'];
$adress =$data['adresse'];
$email =$data['email'];
$role =$data['role'];
$date =$data['date_at'];
$date_up =$data['date_update'];

?>



<div style="margin-left:15%;width:5000px"> 


  <hr class="my-4">
  <h5 class="p-3 mb-2 bg-dark text-white text-center">DETAIL COMPTE ÉTUDIANT</h5>
  <div class="jumbotron" id="div-id-name">
    <div>
      <div style="margin-left:150px;">
        <a class="btn btn btn-primary" style="width:20%" href="dashboard.php?p=editcptstd&id=<?php echo $id?>"><i class="fa fa-edit"></i> &nbsp;Edit</a>
        <a onclick="return confirm('Etes-vous sûr de vouloir supprimer <?php echo $name?> ?')"style="width:20%" class="btn btn btn-danger"
          href="../../app/deletcptstd.php?id=<?php echo $id;?>"><i class="fa fa-trash"></i> &nbsp;Delete</a> &nbsp;
          <a style="width:20%" class="btn btn btn-secondary"
          href="dashboard.php?p=t_comptens"><i class="fa fa-cancel"></i> &nbsp;Cancel</a>
      </div>
      <div class="mt-4"></div>
        <table class="table" border='0'>
          <tr>
              <td>Nom & Postnom :</td>
              <td></td>
              <td><?= $name; ?> <td>
          </tr>
          <tr>
              <td>Prénom :</td>
              <td></td>
              <td><?= $prenom; ?> <td>
          </tr>
          <tr>
              <td>Sexe :</td>
              <td></td>
              <td><?= $sexe; ?> <td>
          </tr>
          <tr>
              <td>Télephone :</td>
              <td></td>
              <td><?= $tel; ?> <td>
          </tr>
          <tr>
              <td>Email :</td>
              <td></td>
              <td><?= $email; ?> <td>
          </tr>
          <tr>
              <td>Adresse physique :</td>
              <td></td>
              <td><?= $adress; ?> <td>
          </tr>
          <tr>
              <td>Rôle utilisateur :</td>
              <td></td>
              <td><?= $role; ?> <td>
          </tr>
          <tr>
              <td>Date création :</td>
              <td></td>
              <td><?= $date; ?> <td>
          </tr>
          <tr>
              <td>Date modification :</td>
              <td></td>
              <td><?= $date_up; ?> <td>
          </tr>
        </table>
    </div>
</div>
</div>
