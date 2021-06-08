<?php
include_once './conexion.php';
include_once './session.php';
Session::init();

if (!Session::get('logged')) {
    header('Location: ' . URL);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once './head.php'; ?>

<body style="background-color: #f5f7fb">
    <!-- Mavbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #D32F2F; min-height: 80px;">
        <div class="container">
            <a class="navbar-brand" href="http://tecnimotors.com/">TECNIMOTORS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav" style="margin-left: auto;">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= URL . 'modulos' ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= URL . 'logout' ?>">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container">

        <!-- Acciones -->
        <section class="actions">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger mt-4" data-bs-toggle="modal" data-bs-target="#usuario-modal">
                    <span class="d-inline m-2">Nuevo Usuario</span><i class="fas fa-plus"></i>
                </button>
            </div>
        </section>

        <!-- Modulos -->
        <section class="modulos mt-4">
            <a class="card animate__animated animate__fadeIn" href="/">
                <div class="icon"><i class="fas fa-user-tie"></i></div>
                <div class="card-content">
                    <h2>Gerencia</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur</p>
                </div>
            </a>
            <a class="card animate__animated animate__fadeIn" href="/">
                <div class="icon"><i class="fas fa-code"></i></div>
                <div class="card-content">
                    <h2>Desarrollo</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur </p>
                </div>
            </a>
            <a class="card animate__animated animate__fadeIn" href="/">
                <div class="icon"><i class="fas fa-clipboard-list"></i></div>
                <div class="card-content">
                    <h2>Administrativa</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur </p>
                </div>
            </a>
            <a class="card animate__animated animate__fadeIn" href="/">
                <div class="icon"><i class="fas fa-truck"></i></div>
                <div class="card-content">
                    <h2>Transportes</h2>
                    <p>Lorem ipsum dolor sit, amet consectetur </p>
                </div>
            </a>
        </section>

        

        <!-- Modal -->
        <div class="modal fade" id="usuario-modal" tabindex="-1" aria-labelledby="usuario-modal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="usuario-modal">NUEVO USUARIO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formUsuario">
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="txtNombre" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nombre" class="form-control" id="txtNombre" autofocus >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="txtCorreo" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="correo" class="form-control" id="txtCorreo" placeholder="example@gmail.com" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="txtPassword" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="txtPassword" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="btnCancelar" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="btnGuardar" name="btnGuardar">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <br><br>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="<?=PLUGINS . 'alertify/alertify.min.js'?>"></script>
    <script type="module" src="<?=JS.'app.js'?>"></script>
</body>

</html>