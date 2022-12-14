<?php 
  require_once('Conexion/Conexion.php');
  require_once('Usuario/Registro.php');
require_once('Usuario/Usuario.php');
  // $conex = new Conexion();

  $registro = new Registro();

  $registros = $registro->obtenerRegistros();

  if(isset($_POST['calcular'])){
  $peso = $_POST['peso'];
  $altura = $_POST['altura'];
  $usuario = new Usuario();
  $usuario->setPeso($peso);
  $usuario->setAltura($altura);
  $imc = $usuario->CalcularIMC();
  $mensaje = $usuario->mensaje();
  $color = $usuario->color;
  $registro->insertarDatos($peso, $altura,$imc,$mensaje);
  $registros = $registro->obtenerRegistros();


  }
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="Assets/css/materialize.min.css"  media="screen,projection"/>
      <!-- Custom CSS -->
      <link rel="stylesheet" href="Assets/css/style.css?v=<?php echo(rand()); ?>">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!-- Navegación -->
      <nav class="navegacion">
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo center"><img src="Assets/img/logo.png" alt=""></a>
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <!--<li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>-->
          </ul>
        </div>
      </nav>
      <header class="header">
        <h2>Calculadora IMC </h2>
        <h4>Kevin Aldana y Rodrigo Santacruz</h4>
      </header>
      <!-- ./Navegación -->
      <!-- Contenido -->
      <main>
        <div class="contenido-centro">
          <div class="row">
            <div class="col s6 calculadora">
              <div class="row">
                <div class="col s6 imagen">
                  <img src="Assets/img/salud.jpg" alt="">
                </div>
                <form method="POST" action="" class="col s6">
                  <div class="input-field">
                    <i class="material-icons prefix">account_balance_wallet</i>
                    <input id="peso" name="peso" type="number" class="validate">
                    <label for="peso">Peso (kg)</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">trending_up</i>
                    <input id="altura" name="altura" type="number" class="validate">
                    <label for="altura">Altura (cm)</label>
                  </div>
                  <?php 
                  if (isset($_POST['calcular'])){ ?> 
                      <div class= "card-panel <?= $color ?>">
                          <b><span class="white-text"> Tu IMC es de <?= $imc ?></span><br></b>
                          <b><span class="white-text"> Estado <?= $mensaje ?></span><br></b>
                       </div>
                    <?php }
                  ?>
                  <button class="btn waves-effect waves-light" type="submit" name="calcular">calcular
                    <i class="material-icons right">send</i>
                  </button>
                </form>
              </div>
            </div>
            <div class="col s6 tabla">
              <table>
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Peso(kg)</th>
                      <th>Altura(cm)</th>
                      <th>IMC</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($registros)): ?>
                    <?php foreach($registros as $key => $registro): ?>
                      <?php $key++ ?>
                      <tr>
                        <td><?= $key ?></td>
                        <td><?= $registro->peso_usuario ?></td>
                        <td><?= $registro->altura_usuario ?></td>
                        <td><?= $registro->imc_usuario ?></td>
                      </tr>
                    <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="4" class="no-datos">No hay datos</td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
              <div class="observacion">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    <span class="card-title">Observación</span>
                    <p>En esta tabla se muestra los registros de los usuarios que han usado la aplicación.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- ./Contenido -->
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
      <!-- Custom JS -->
      <script type="text/javascript" src="Assets/js/app.js?v=<?php echo(rand()); ?>"></script>
    </body>
  </html>