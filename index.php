
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Hotel</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/justified-nav.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>  
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.min.css" />
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> 
     <script>

        $(document).ready(function() {
            $("#calendario").datepicker({
                changeMonth: true,
                changeYear: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
                dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
                dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                    'Outubro', 'Novembro', 'Dezembro'
                ],
                monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            });
        });
</script>

  </head>

  <body>

    <div class="container">

      <div class="masthead">
      
   <!-- Jumbotron -->
       <div class="topo-pagina text-muted">
                            <h4>Hotel LOREM IPSUM </h4>
                            <h5>A rede de hotéis com tudo que você precisa para seu descanso e lazer</h5> 
                            <br/>
                             <p>Usuário: </p>
                        </div>
                       
        <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav text-md-center nav-justified w-100">
              <li class="nav-item active">
                <a class="nav-link" href="#">Consulta <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Cadastro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Reserva</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Histórico</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
              </li>
           
            </ul>
          </div>
        </nav>
      </div>

   

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-3 card">
<p>texto coluna esquerda</p>

<?php
    require_once("classBancoDados.php");
    $conexao_bd = new classBancoDados("localhost");
if (!$conexao_bd->AbrirConexao()) {
    echo "<p> Erro na conexão com o banco de dados!<br>".$conexao_bd->MensagemErro()."</p>";
} else {
    $conexao_bd->SetSELECT("*", "hoteis", "UF,Cidade");
    if ($conexao_bd->ExecSELECT()) {
         $NumeroRegistros = $conexao_bd->TotalRegistros();
         $DataSet = $conexao_bd->GetDataSet();
            
        if ($NumeroRegistros > 0) {
            echo '<ul class="list-group list-group-flush">';
            while ($Registros = $DataSet->fetch_assoc()) {
                $EnderecoHotel ="<li class='list-group-item'><b>".trim($Registros['Endereco']).", ".trim($Registros["Numero"])."<br>";
                $EnderecoHotel .= trim($Registros['Bairro'])." - ".trim($Registros["Cidade"])."<br>";
                $EnderecoHotel .= trim($Registros['UF'])." - Fone: ".trim($Registros["Telefone"])."</b></li>";
                echo $EnderecoHotel;
            }
            echo '</ul>';
        }
    } else {
        echo "<p>Erro na execução do comando SELECT</p>";
    }
}
$conexao_bd->FecharConexao();

?> 
        </div>
        <div class="col-lg-4">
      
        </div>
        <div class="col-lg-4">
<div class="linha1-coluna-direita">
                                <div class="calendario" align="center" id="calendario"></div>
                            </div>
                            <div class="separacao-linhas"></div>
                            <div class="linha2-coluna-direita">
                                <p>texto coluna esquerda</p>
                            </div>
        </div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Levi Saturnino 2017</p>
      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
   
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="js/offcanvas.js"></script>
  </body>
</html>
