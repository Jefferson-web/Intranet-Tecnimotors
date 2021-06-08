<?php

include_once './conexion.php';
include_once './session.php';

Session::init();

if (isset($_POST["txtCorreo"]) && isset($_POST["txtPassword"])) {

  $correo = $_POST["txtCorreo"];
  $password = $_POST["txtPassword"];

  $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE correo=:correo');
  $stmt->bindParam(':correo', $correo);
  $stmt->execute();

  $error = "";

  if ($stmt->rowCount() == 0) {
    $error = 'Usuario o contraseña incorrectas';
  }

  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!password_verify($password, $usuario["password"])) {
    $error = 'Usuario o contraseña incorrectas';
  }

  if (empty($error)) {
    Session::set('logged', true);
    Session::set('nombre', $usuario["nombre"]);
    header('location: modulos');
    exit();
  }
}

?>

<!DOCTYPE html>
<html>
<?php include_once './head.php'; ?>

<body>
  <section class="login">
    <div class="left">
      <h2>LOGIN</h2>
      <p>
        Ingresa tu correo electrónico y contraseña para ingresar al sistema.
      </p>
      <form action="<?= URL ?>" method="POST" class="t-form">
        <?php if (isset($error)) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <div class="form-group-t">
          <label for="txtCorreo">Correo:</label>
          <input type="email" class="control-t" name="txtCorreo" required />
        </div>
        <div class="form-group-t">
          <label for="txtPassword">Contraseña:</label>
          <input type="password" class="control-t" name="txtPassword" required />
        </div>
        <div class="form-group-t">
          <button class="btn-t" name="ingresar">Ingresar</button>
        </div>
      </form>
      <hr class="separator" />
      <ul class="social">
        <li>
          <a href="https://es-la.facebook.com/Rtecnimotors/" class="icon facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
        </li>
        <li>
          <a href="https://www.instagram.com/p/CMv2L3BIo3j/" class="icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
        </li>
        <li>
          <a href="" class="icon whatsapp"><i class="fab fa-whatsapp"></i></a>
        </li>
      </ul>
    </div>
    <div class="right">
      <img src="<?= IMG . 'logo.png' ?>" alt="logo tecnimotors" />
      <h1>TECNIMOTORS EIRL</h1>
      <p>Especialista en repuestos desde <strong>1979</strong></p>
    </div>
  </section>
</body>

</html>