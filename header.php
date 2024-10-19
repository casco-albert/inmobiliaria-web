<div class="contenedor-header">
    <header>
      

        <div class="nav-responsive" onclick="mostrarMenuResponsive()">
            <i class="fa-solid fa-bars"></i>
        </div>
        <nav class="" id="nav">
            <a href="index.php">Inicio</a>
            <a href="propiedades.php">Propiedades</a>
            <a href="contacto.php">Contacto</a>
        </nav>
        <div class="logo">
            <a href="index.php">
                <h1><i class="logotipo"></i></h1>
            </a>

        </div>
        <div class="info-contacto">
            <span class="info">
                <a href="tel:<?php echo $config['telefono1'] ?>">
                    <i class="fa-solid fa-phone"></i>
                    <span class="numero-telefono"><?php echo $config['telefono1'] ?> </span>
                </a>

            </span>
            <span class="info">
                <?php if ($config['facebook'] != null) : ?>
                    <a href="<?php echo $config['facebook'] ?>" target="_blank"><i class="fa-brands fa-facebook"></i> </a>
                <?php endif ?>
            </span>
            <span class="info">
                <?php if ($config['twitter'] != null) : ?>
                    <a href="<?php echo $config['twitter'] ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <?php endif ?>
            </span>
        </div>
    </header>
</div>