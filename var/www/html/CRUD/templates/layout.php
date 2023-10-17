<!DOCTYPE html>
<html>

<head>
    <title>Proyecto CRUD</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>Proyecto CRUD</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="index.php?route=user-list">Lista de Usuarios</a></li>
                    <li><a href="index.php?route=form">Crear Usuario</a></li>
                    <!-- Agrega más enlaces de navegación si es necesario -->
                </ul>
            </nav>
        </header>
        <section>
            <?php include($content); ?>
        </section>
        <footer>
            <p>&copy; 2023 Proyecto CRUD</p>
        </footer>
    </div>
</body>

</html>