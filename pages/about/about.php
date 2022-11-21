<!-- icons -->
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<script src="https://kit.fontawesome.com/9f748bd1d7.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./about.css">
<link rel="stylesheet" href="../../templates/header/header.css">
<link rel="stylesheet" href="../../templates/footer/footer.css">

<?php
    // include('../../templates/header/header.php')
?>

<header class="header">
        <nav class="nav">
            <a href="../../index.php" class="logo nav-link">
                <img class="logo-img" src="../../assets/img/logo.png" alt="">
                <span class="logo-name">AquaTech</span>
            </a>
            <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu">
                <li class="nav-menu-item">
                    <a href="./pages/login/login.php" class="nav-menu-link nav-link">Contactanos</a>
                </li>
                <li class="nav-menu-item">
                    <a href="./pages/confirmPayment/confirmPayment.php"
                    class="nav-menu-link nav-link">Confirmar Pago</a>
                </li>
                <li class="nav-menu-item">
                    <a href="./pages/login/login.php" class="nav-menu-link nav-link nav-menu-link_active">Login</a>
                </li>
            </ul>
        </nav>
</header>

<main class="mainContact">
    <div class="container">
        <div class="mainContact__content mainContact__content--grid ">

            <div class="contactInfo">
                <h2>Contactanos</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui laudantium iure accusamus debitis aliquid, earum error animi dolorum inventore porro autem soluta cumque, quam recusandae aliquam ipsa natus nostrum explicabo.</p>

                <div class="contactInfo__socialmedia">
                    <section class="contactInfo__socialmedia--flex">
                        <a href="#" class="fa-solid fa-phone"></a>
                        <div>
                            <p>Llamadas al:</p>
                            <span>+58 414 656 8168</span>
                        </div>
                    </section>
                    <section class="contactInfo__socialmedia--flex">
                        <a href="#" class="fa-solid fa-envelope"></a>
                        <div>
                            <p>Correo Electronico</p>
                            <span>AquaTech</span>
                        </div>
                    </section>

                    <hr>
                    <section class="contactInfo__socialmedia--flex">
                        <p>Más información en: </p>
                        <a href="#" class="fa-brands fa-facebook"></a>
                        <a href="#" class="fa-brands fa-twitter"></a>
                        <a href="#" class="fa-brands fa-instagram"></a>
                    </section>

                </div>
            </div>

            <div class="googleMaps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15682.106293583418!2d-71.6343318!3d10.6938078!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e899ecd22a1b721%3A0xd2cfab5751fcd5cc!2sDr.%20Rafael%20Belloso%20Chacin%20University!5e0!3m2!1sen!2sve!4v1669057492068!5m2!1sen!2sve" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</main>


<?php
    // include('../../templates/footer/footer.php')
?>