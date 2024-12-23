<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@100;300;400;700&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
      :root {
        --primary: rgb(57, 233, 63);
        --bg: #010101;
        --white: #ffffff;
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none;
      }

      html {
        scroll-behavior: smooth;
      }

      body {
        font-family: "Poppins", sans-serif;
        background-color: var(--bg);
        color: #fff;
      }

      /* Navbar */
      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.4rem 7%;
        background-color: rgb(81, 102, 219);
        border-bottom: 1px solid #eee;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 9999;
      }

      .navbar .navbar-logo {
        font-size: 2rem;
        font-weight: 700;
        color: #eee;
        font-style: italic;
      }

      .navbar .navbar-logo span {
        color: var(--primary);
      }

      .navbar .navbar-nav a:hover {
        color: var(--primary);
      }

      .navbar .navbar-nav a::after {
        content: "";
        display: block;
        padding-bottom: 0.5rem;
        border-bottom: 0.1rem solid #eee;
        transform: scaleX(0);
        transition: 0.1s linear;
      }

      .navbar .navbar-nav a:hover::after {
        transform: scaleX(0.5);
      }

      .navbar .navbar-extra a {
        color: #fff;
        margin: 0 0.5rem;
      }

      .navbar .navbar-extra a:hover {
        color: var(--primary);
      }

      /* Hero Section */
      .hero {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url("https://st3.depositphotos.com/5411610/15334/i/450/depositphotos_153344150-stock-photo-small-empty-shopping-cart.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
      }

      .hero::after {
        content: "";
        display: block;
        position: absolute;
        width: 100%;
        height: 30%;
        bottom: 0;
        background: linear-gradient(
          0deg,
          rgba(1, 1, 3, 1) 8%,
          rgba(255, 255, 255, 0) 50%
        );
      }

      .hero .content {
        padding: 1.4rem 7%;
        text-align: left;
        max-width: 60rem;
        z-index: 10;
      }

      .hero .content h1 {
        font-size: 3rem;
        color:rgb(252, 249, 249);
        text-shadow: 2px 2px 6px rgba(83, 92, 211, 0.7);
        line-height: 1.4;
        margin-top: 1.5rem;
      }

      .hero .content h1 span {
        color: var(--primary);
      }

      .hero .content p {
        font-size: 1.6rem;
        margin-top: 3rem;
        line-height: 1.4;
        font-weight: 100;
        text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        mix-blend-mode: difference;
      }

      .hero .content .cta {
        margin-top: 1rem;
        display: inline-block;
        padding: 1rem 3rem;
        font-size: 1.4rem;
        color: #f0f0f0;
        background-color: var(--primary);
        border-radius: 0.5rem;
        box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        text-decoration: none;
        transition: background-color 0.3s ease;
      }

      .hero .content .cta.hover {
        background-color: darken(var(--primary), 10%);
      }

      /* About Section */
      .about {
        padding: 8rem 7% 1.4rem;
      }

      .about h2 {
        text-align: left;
        font-size: 2.6rem;
        margin-bottom: 3rem;
      }

      .about h2 span {
        color: var(--primary);
      }

      .about .row {
        display: flex;
      }

      .about .row .about-img {
        flex: 1 1 45rem;
      }

      .about .row .about-img img {
        width: 100%;
      }

      .about .row .content {
        flex: 1 1 35rem;
        padding: 0 1rem;
      }

      .about .row .content h3 {
        font-size: 1.8rem;
        margin-bottom: 1rem;
      }

      .about .row .content p {
        margin-bottom: 0.8rem;
        font-size: 1.4rem;
        font-weight: 100;
        line-height: 1.6;
      }

      /* Footer */
      footer {
        background-color: var(--primary);
        text-align: center;
        padding: 1rem 0 3rem;
        margin-top: 3rem;
      }

      footer .socials {
        padding: 1rem 0;
      }

      footer .socials a {
        color: #fff;
        margin: 1rem;
      }

      footer .socials a:hover,
      footer .links a:hover {
        color: var(--bg);
      }

      footer .links {
        margin-bottom: 1.4rem;
      }

      footer .links a {
        color: #fff;
        padding: 0.7rem 1rem;
      }

      footer .credit {
        font-size: 0.8rem;
      }

      footer .credit a {
        color: var(--bg);
        font-weight: 700;
      }

      /* Media Queries */

      @media (max-width: 1366px) {
        html {
          font-size: 75%;
        }
      }

      /* Tablet */
      @media (max-width: 758px) {
        html {
          font-size: 62.5%;
        }

        .navbar .navbar-nav {
          display: flex;
          justify-content: flex-end;
          width: 100%;
        }

        .navbar .navbar-nav a {
          display: inline-block;
          font-size: 1.6rem;
          color: #eee;
        }

        .about .row {
          flex-wrap: wrap;
        }

        .about .row .about-img img {
          height: 24rem;
          object-fit: cover;
          object-position: center;
        }

        .about .row .content {
          padding: 0;
        }

        .about .row .content h3 {
          margin-top: 2rem;
          font-size: 1rem;
        }

        .about .row .content p {
          font-size: 1.6rem;
        }

        .menu p {
          font-size: 1.2rem;
        }

        .contact .row {
          font-size: wrap;
        }

        .contact .row .map {
          height: 30rem;
        }

        .contact .row form {
          padding-top: 0;
        }
      }

      /* Mobile Phone */
      @media (max-width: 450px) {
        html {
          font-size: 55%;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">Toko<span>Senyum</span>.</a>

      <div class="navbar-nav">
        <a href="login.php">Login</a>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Mari Nikmati Berbelanja Di <span>Toko Kami</span></h1>
        <p>
          Kami mengundang Anda untuk merasakan pengalaman berbelanja yang menyenangkan di toko kami. Dengan berbagai produk berkualitas, pelayanan ramah, dan suasana yang nyaman, kami pastikan setiap kunjungan Anda menjadi pengalaman yang tak terlupakan. Temukan beragam pilihan barang dengan harga terbaik hanya di toko kami. Segera kunjungi dan nikmati kemudahan berbelanja, karena kepuasan Anda adalah prioritas kami. Selamat berbelanja!
        </p>
        <a href="#" class="cta">Beli Sekarang</a>
      </main>
    </section>
    <!-- Hero Section end -->

    <!-- About section start -->
    <section id="about" class="about">
      <h2><span>Tentang</span> kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="https://c8.alamy.com/comp/2DE6YJ7/icon-marcet-cart-on-tablet-in-the-hand-ordering-food-online-at-home-online-shopping-concept-tech-on-e-commerce-internet-shoping-concept-2DE6YJ7.jpg" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h3>Kenapa Memilih Toko Kami?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga at,
            iusto earum autem facilis eos.
          </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio
            cumque vel placeat error eius. Minima praesentium nemo consectetur
            inventore! Odit!
          </p>
        </div>
      </div>
    </section>
    <!-- About Section end -->

    <!-- Footer start -->
    <footer>
      <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#menu">Menu</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Design by <a href="#">YourName</a></p>
      </div>
    </footer>
    <!-- Footer end -->
  </body>
</html>
