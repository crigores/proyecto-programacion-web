<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaTech</title>
    <meta name="AguaTech" content="">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./templates/header/header.css">
    <link rel="stylesheet" href="./templates/footer/footer.css">
    <script src="https://kit.fontawesome.com/7e5b2d153f.js" crossorigin="anonymous"></script>
    <meta name="description" content="">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <a href="#" class="logo nav-link">
                <img class="logo-img" src="../../assets/img/logo.png" alt="">
                <span class="logo-name">AquaTech</span>
            </a>
            <button class="nav-toggle" aria-label="Abrir menú">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu">
                <li class="nav-menu-item">
                    <a href="./pages/about/about.php" class="nav-menu-link nav-link">Contactanos</a>
                </li>
                <li class="nav-menu-item">
                    <a href="./pages/confirmPayment/confirmPayment.php" class="nav-menu-link nav-link">Confirmar Pago</a>
                </li>
                <li class="nav-menu-item">
                    <a href="./pages/login/login.php" class="nav-menu-link nav-link nav-menu-link_active">Login</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <figure class="background-hero"></figure>

        <section class="section product-section">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas reiciendis veritatis rerum aperiam
                voluptas enim veniam optio natus dolore qui est culpa tempore similique cupiditate eos magnam tenetur,
                nisi dicta.
            </p>

            <div class="products-list">
                <article class="product center-item">
                    <figure class="product-figure">
                        <img class="figure-img" src="./assets/img/image-gallery-milkbottles.jpg" alt="">
                    </figure>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, at!</p>
                </article>

                <article class="product center-item">
                    <figure class="product-figure">
                        <img class="figure-img" src="./assets/img/image-gallery-milkbottles.jpg" alt="">
                    </figure>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, at!</p>
                </article>

                <article class="product center-item">
                    <figure class="product-figure">
                        <img class="figure-img" src="./assets/img/image-gallery-milkbottles.jpg" alt="">
                    </figure>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, at!</p>
                </article>
            </div>
        </section>

        <section class="about-section">
            <figure class="about-figure">
                <img class="figure-img" src="./assets/img/bottled-water-20L.png" alt="">
            </figure>

            <div class="about-info">
                <p>
                    Somos una empresa.....Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates totam
                    repellendus, pariatur
                    est
                    perspiciatis non velit perferendis odio corrupti quia recusandae praesentium vel, optio minima?
                    Sint
                    obcaecati deserunt aliquam fugiat.
                </p>

                <a class="btn first" href="./pages/about/about.php">MORE ABOUT US</a>
            </div>
        </section>

        <section class="client-section">
            <h3>Client Testimonials</h3>
            <div class="clients-container">
                <article class="client">
                    <figure class="client-figure">
                        <img class="figure-img" src="./assets/img/image-emily.jpg" alt="">
                    </figure>
                    <h4 class="client-name">Emily</h4>
                    <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, at!</blockquote>
                </article>

                <article class="client">
                    <figure class="client-figure">
                        <img class="figure-img" src="./assets/img/image-thomas.jpg" alt="">
                    </figure>
                    <h4 class="client-name">Thomas</h4>
                    <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, at!</blockquote>
                </article>

                <article class="client">
                    <figure class="client-figure">
                        <img class="figure-img" src="./assets/img/image-jennie.jpg" alt="">
                    </figure>
                    <h4 class="client-name">Jennie</h4>
                    <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, at!</blockquote>
                </article>
            </div>
        </section>

        <section class="form-section">
            <h3>Leave a Reply</h3>
            <form class="reply-form" action="">
                <label for="name">Name</label>
                <input class="input" type="text" id="name" required placeholder="type your name">
                <label for="email">Email</label>
                <input class="input" type="text" id="email" required placeholder="type your addres">
                <label for="comment">Comment</label>
                <textarea class="textarea" name="" id="comment" cols="30" rows="10" placeholder="type your comment"></textarea>
                <input class="btn btn-input" type="submit" value="Post Comment">
            </form>
        </section>
    </main>

    <?php
    include("./templates/footer/footer.php");
    ?>

    <script src="./index.js"></script>
</body>

</html>