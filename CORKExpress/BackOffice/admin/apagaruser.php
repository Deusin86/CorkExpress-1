<script>
$(document).ready(function(){
	$("#99").hide();
    $(".sim").click(function(){
    	if($(".mxx").val() == ""){
        	 $("#99").hide();
        }
        else if($(".mxx").val() != "abc.123"){
           $(document).on('submit', '#my-form', function() {
            $("#99").show();
            return false;
           });
        }else{
          $(document).on('submit', '#my-form', function() {
           $("#99").hide();
           return true;
          });
        }
    });
});
</script>
<div class="mainbox">
  <div class="box1"></div>
  <div class="box2"></div>
  <div class="box3"></div>
  <div class="box4">
    <div class="textv3"><strong>Quere despedir o/a trabalhador/a <?php include '../../connect/conn.php'; $niftrabalhador = $_REQUEST["niftrabalhador"]; $dado=mysqli_fetch_array(mysqli_query($conn,"SELECT nome, apelido FROM trabalhadores WHERE nif = '$niftrabalhador'" )); echo'<br>   '.$dado["nome"].' '.$dado["apelido"]; ?> ?</strong></div>
    <form method="post" id="my-form">
      <div class="row form-group maingrup">
          <div class="col col-md-3">
              <label for="text-input" class=" form-control-label mainlab">Password:</label>
          </div>
          <div class="col-12 col-md-8">
              <input type="password" id="text-input" name="password" placeholder="Password" class="form-control mxx" required>
          </div>
          <strong id="99" style="color:red;">X</strong>
      </div>

      <div class="card-footer mainbut">
          <button type="submit" name="sim" class="btn btn-primary btn-sm sim">
              <i class="fa fa-dot-circle-o"></i> Sim
          </button>
          <button type="submit" class="btn btn-danger btn-sm" name="nao">
              <i class="fa fa-ban"></i> Não
          </button>
      </div>
    </form>
  </div>
  <div class="box5"></div>
</div>
<?php
    if (isset($_POST["sim"])){
      if($_POST["password"] == "abc.123"){
        include '../../connect/conn.php';
        $niftrabalhador = $_REQUEST["niftrabalhador"];
        mysqli_query($conn, "DELETE FROM trabalhadores WHERE nif = '$niftrabalhador'");
        mysqli_query($conn, "DELETE FROM salario WHERE nif = '$niftrabalhador'");
        echo '<meta http-equiv="refresh" content="0;url=admin.php?an=8">';
      }
    }
    if(isset($_POST["nao"])){
      echo '<meta http-equiv="refresh" content="0;url=admin.php?an=8">';
    }
 ?>
