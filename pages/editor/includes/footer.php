<p class="text-center">&copy Copy Right 2019 | Smart List développé par Lyontech</p>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
    <script src="../../css/popper.js"></script>
    <script>
  $(document).ready(function(){
      $('.Programbtn').on('click', function(){

          $('#inscritmodal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#note_id').val(data[0]);
              $('#nom').val(data[1]);
              $('#prenom').val(data[2]);


      });

  });
</script>
    <script>
  $(document).ready(function(){
      $('.stdbtn').on('click', function(){

          $('#updatestd').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#std_id').val(data[0]);
              $('#mat_std').val(data[1]);
              $('#nom_std').val(data[2]);
              $('#prenom_std').val(data[3]);
              $('#sexe').val(data[4]);


      });

  });
</script>
<script>
  $(document).ready(function(){
      $('.cotebtn').on('click', function(){

          $('#cotemodal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#note_id').val(data[0]);
              $('#nom').val(data[1]);
              $('#prenom').val(data[2]);


      });

  });
</script>
   <script>
  $(document).ready(function(){
      $('.updatCoursbtn').on('click', function(){

          $('#updatecours').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#note_id').val(data[0]);
              $('#nom').val(data[1]);
              $('#volCours').val(data[2]);
              $('#presCours').val(data[3]);


      });

  });
</script>

<script>
  $(document).ready(function(){
      $('.inscritbtn').on('click', function(){

          $('#inscritmodal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#note_id').val(data[0]);
              $('#matricule').val(data[1]);
              $('#nom').val(data[2]);
              $('#prenom').val(data[3]);
              $('#sexe').val(data[4]);
              $('#categorie').val(data[5]);


      });

  });
</script>
<script>
  $(document).ready(function(){
      $('.updatProgbtn').on('click', function(){

          $('#updatProgmodal').modal('show');

              $tr = $(this).closest('tr');

              var data = $tr.children("td").map(function(){
                  return $(this).text();
              }).get();

              console.log(data);

              $('#note_id').val(data[0]);
              $('#nom').val(data[1]);
              $('#prenom').val(data[2]);
              $('#cours').val(data[3]);


      });

  });
</script>
  </body>
</html>
