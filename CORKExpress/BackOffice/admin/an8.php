<form class="form-header" action="" method="POST">
      <input class="au-input au-input--xl" type="text" name="search" placeholder="Procura por nome &amp; apelido do trabalhador" />
      <button class="au-btn--submit" name="pesque" type="submit">
          <i class="zmdi zmdi-search"></i>
      </button>
</form>
<small>Se quiser aparecer todos os trabalhadores clique só no botão e deixe barra em branco</small>
<br>
  <div class="row">
    <div class="col-lg-9" style="max-width:30%;">
        <div class="table-responsive table--no-card m-b-30"style="overflow-x: hidden; width:450px">
            <table class="table table-borderless table-striped table-earning">
                <thead style="display:block;">
                    <tr>
                        <th style="width:150px">Nome</th>
                        <th style="width:150px">Apelido</th>
                        <th style="width:150px">Nif</th>
                        <th style="width:150px">Nib</th>
                        <th style="width:150px">Nss</th>
                        <th style="width:150px">Categoria</th>

                    </tr>
                </thead >
                <tbody style="display:block; overflow:scroll; height:160px;">
                  <?php
                  if(isset($_POST["pesque"])){
                    include '../../connect/conn.php';
                    $first_letter = substr($_POST['search'], 0, 1);
                    $nome=mysqli_fetch_array(mysqli_query($conn,"SELECT nome FROM trabalhadores  WHERE LEFT (nome,1)='" . $first_letter . "' "));
                    $apelido=mysqli_fetch_array(mysqli_query($conn,"SELECT apelido FROM trabalhadores WHERE LEFT (apelido,1)='" . $first_letter . "' "));


                  //  include '../../connect/deconn.php';
                    if($nome){

                //    include '../../connect/conn.php';
                      $first_letter = substr($_POST['search'], 0, 1);
                      $dados =mysqli_query($conn,"SELECT idtrabalhador, nome, apelido, nif, nib, niss, categoria  FROM trabalhadores  WHERE LEFT (nome,1)='" . $first_letter . "' AND tipouser=0 ORDER BY nome");

                        while ($row=mysqli_fetch_assoc($dados)){
                          echo '<tr>';
                          echo '<td>'. $row['nome']. '</td>';
                          echo '<td>'. $row['apelido']. '</td>';
                          echo '<td>'. $row['nif']. '</td>';
                      //    echo '<td>'. $row['nib']. '</td>';
                      //    echo '<td>'. $row['niss']. '</td>';
                      //    echo '<td>'. $row['categoria']. '</td>';
                          echo '<td style="padding: 12px 20px;"> <a href="apagaruser.php?idtrabalhador='.$row["idtrabalhador"].'"><button>Apagar</button></a> </td>';
                          echo '</tr>';
                        }

                      }
                      else{
                        if($apelido){
                          $first_letter = substr($_POST['search'], 0, 1);
                          $dados =mysqli_query($conn,"SELECT nome, apelido, nif  FROM trabalhadores  WHERE LEFT (apelido,1)='" . $first_letter . "' AND tipouser=0 ORDER BY nome");

                            while ($row=mysqli_fetch_assoc($dados)){
                              echo '<tr>';
                              echo '<td>'. $row['nome']. '</td>';
                              echo '<td>'. $row['apelido']. '</td>';
                              echo '<td>'. $row['nif']. '</td>';
                              echo '</tr>';
                            }
                          }

                      }


                        if (empty($_POST['search'])){
                        $dados =mysqli_query($conn,"SELECT nome, apelido, nif  FROM trabalhadores where tipouser = 0");

                          while ($row=mysqli_fetch_assoc($dados)){
                            echo '<tr>';
                            echo '<td>'. $row['nome']. '</td>';
                            echo '<td>'. $row['apelido']. '</td>';
                            echo '<td>'. $row['nif']. '</td>';
                            echo '</tr>';
                          }
                        }
                      }

                   ?>


                </tbody>
            </table>
        </div>
    </div>
</div>