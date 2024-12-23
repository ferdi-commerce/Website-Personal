<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        :root {
            --primary: rgb(57, 233, 63); /* Warna hijau utama */
            --secondary: rgb(33, 37, 41); /* Warna abu-abu gelap */
            --bg: #f8f9fa; /* Latar belakang abu-abu terang */
            --white: #ffffff;
            --hover-color: #218838; /* Warna tombol hover */
            --font-family: 'Arial', sans-serif;
        }

        /* Reset padding dan margin untuk elemen standar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 8%;
            background-color: rgb(81, 102, 219);
            border-bottom: 2px solid #eee;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan halus untuk navbar */
            transition: top 0.3s; /* Animasi transisi saat menghilang atau muncul */
        }

        .navbar .navbar-logo {
            font-size: 1.5rem; /* Ukuran logo lebih kecil */
            font-weight: 600;
            color: #eee;
            font-style: italic;
            margin-right: 15px; /* Memberikan jarak antara logo dan search bar */
        }

        .navbar .navbar-logo span {
            color: var(--primary);
        }

        #search-bar {
            padding: 0.5rem;
            font-size: 0.9rem; /* Ukuran font pencarian lebih kecil */
            border: none;
            border-radius: 5px;
            width: 250px; /* Lebar pencarian lebih kecil */
            transition: all 0.3s ease;
        }

        #search-bar:focus {
            outline: none;
            border: 2px solid var(--primary); /* Highlight ketika fokus */
        }

        /* Menu Section */
        #menu {
            margin: 2rem 0;
            padding-top: 120px; /* Ruang untuk navbar yang fixed */
            text-align: center;
        }

        #menu h2 {
            font-size: 1.5rem; /* Ukuran judul menu lebih kecil */
            font-weight: 600;
            margin-bottom: 1rem;
        }

        #menu-items {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Ukuran kolom lebih kecil */
            gap: 1.5rem;
            list-style: none;
            padding: 0;
        }

        #menu-items li {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek card */
            overflow: hidden;
            transition: all 0.3s ease;
        }

        #menu-items li:hover {
            transform: translateY(-5px); /* Efek hover pada card */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15); /* Bayangan lebih tajam saat hover */
        }

        #menu-items img {
            width: 100%;
            height: 180px; /* Ukuran gambar lebih besar */
            object-fit: cover;
            border-bottom: 2px solid #eee;
        }

        #menu-items h3 {
            padding: 10px;
            font-size: 1rem; /* Ukuran nama makanan lebih kecil */
            font-weight: 600;
        }

        #menu-items p {
            padding: 0 10px;
            font-size: 0.8rem; /* Ukuran harga lebih kecil */
            color: #555;
        }

        button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem; /* Ukuran tombol lebih kecil */
            margin: 8px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 0.9rem; /* Ukuran font tombol lebih kecil */
        }

        button:hover {
            background-color: var(--hover-color);
            transform: scale(1.05); /* Efek pembesaran tombol */
        }

        button:active {
            transform: scale(1); /* Efek klik pada tombol */
        }

        /* Cart Section */
        #cart {
            padding: 1.5rem;
            background-color: var(--bg);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 2rem auto;
        }

        #cart h2 {
            text-align: center;
            font-size: 1.5rem; /* Ukuran judul keranjang lebih kecil */
            margin-bottom: 1rem;
        }

        #cart-items {
            list-style: none;
            padding: 0;
            margin-bottom: 1rem;
        }

        #total-price {
            font-size: 1.3rem; /* Ukuran total lebih kecil */
            font-weight: bold;
            color: var(--primary);
        }

        #cart button {
            background-color: #dc3545; /* Warna merah untuk cancel */
            margin-top: 1rem;
        }

        /* Media Query untuk perangkat mobile */
        @media only screen and (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
                padding: 1rem;
            }

            .navbar .navbar-logo {
                font-size: 1.3rem; /* Ukuran lebih kecil di perangkat kecil */
                margin-bottom: 1rem;
            }

            #search-bar {
                width: 80%;
            }

            #menu-items {
                grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); /* Lebar item lebih kecil */
            }

            #menu-items img {
                height: 150px; /* Gambar lebih kecil pada perangkat kecil */
            }

            #menu-items h3 {
                font-size: 0.9rem; /* Nama makanan lebih kecil */
            }

            #menu-items p {
                font-size: 0.75rem; /* Harga lebih kecil */
            }

            button {
                padding: 0.5rem 1rem; /* Tombol lebih kecil */
            }
        }

        @media only screen and (max-width: 480px) {
            #menu-items li {
                font-size: 0.7rem; /* Ukuran lebih kecil di layar kecil */
            }

            #menu-items h3 {
                font-size: 0.8rem; /* Nama makanan lebih kecil */
            }

            #menu-items p {
                font-size: 0.7rem; /* Harga lebih kecil */
            }

            #total-price {
                font-size: 1.1rem;
            }

            #cart h2 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <a class="navbar-logo">Toko<span>Senyum</span></a>
        <input type="text" id="search-bar" placeholder="Cari..." onkeyup="searchMenu()">
    </nav>

    <!-- Main Content -->
    <div id="menu">
        <h2>Barang</h2>
        <ul id="menu-items">
            <li>
                <img src="https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//106/MTA-78957420/brd-44261_sepatu-sneakers-olahraga-pria-fashion-rw-terbaru_full04.jpg" alt="Sepatu Sneakers Olahraga">
                <h3>Sepatu Sneakers Olahraga</h3>
                <p>Rp 46.790</p>
                <button onclick="addItem('Arsik ikan mas', 46790)">Tambahkan ke Keranjang</button>
            </li>
            <li>
                <img src="https://webicdn.com/sdirmember/24/23164/produk/23164_product_1684749608.jpg" alt="Baju Gucci Junior">
                <h3>Baju Gucci Junior</h3>
                <p>Rp 29.500</p>
                <button onclick="addItem('Baju Gucci Junior', 29500)">Tambahkan ke Keranjang</button>
            </li>
            <li>
                <img src="https://images.samsung.com/is/image/samsung/p6pim/id/sm-a057flvhxid/gallery/id-galaxy-a05s-sm-a057-479703-sm-a057flvhxid-540320099?$650_519_PNG$" alt="Galaxy A05s">
                <h3>Samsung Galaxy A05s</h3>
                <p>Rp 2.099.000</p>
                <button onclick="addItem('Samsung Galaxy A05s', 2099000)">Tambahkan ke Keranjang</button>
            </li>
            <li>
                <img src="https://images.samsung.com/is/image/samsung/p6pim/id/sm-a356elbgxid/gallery/id-galaxy-a35-5g-sm-a356-sm-a356elbgxid-540157717?$650_519_PNG$" alt="Samsung Galaxy A35">
                <h3>Samsung Galaxy A35</h3>
                <p>Rp 4.999.000</p>
                <button onclick="addItem('Samsung Galaxy A35', 4999000)">Tambahkan ke Keranjang</button>
            </li>
            <li>
                <img src="https://images.tokopedia.net/img/cache/250-square/VqbcmM/2023/5/8/01379621-2c37-4479-adb4-00f6b7fffaf8.jpg" alt="LAPTOP Hp EliteBook 840 G5 Core i7 Gen8 RAM 32GB/512GB SSD FREE TAS - 840 G5 i5 GEN8, 32GB/1TB">
                <h3>LAPTOP Hp EliteBook 840 G5 Core i7 Gen8 RAM 32GB/512GB SSD FREE TAS - 840 G5 i5 GEN8, 32GB/1TB</h3>
                <p>Rp 6.400.000</p>
                <button onclick="addItem('LAPTOP Hp EliteBook 840 G5 Core i7 Gen8 RAM 32GB/512GB SSD FREE TAS - 840 G5 i5 GEN8, 32GB/1TB', 6400000)">Tambahkan ke Keranjang</button>
            </li>
            <li>
                <img src="https://images.tokopedia.net/img/cache/900/product-1/2020/7/4/16093264/16093264_c70009a0-35d4-4004-8508-80769d128c54_800_800" alt="Topi Baseball Topi Quick Dry Topi Pria - GRAY">
                <h3>Topi Baseball Topi Quick Dry Topi Pria - GRAY</h3>
                <p>Rp 55.000</p>
                <button onclick="addItem('Topi Baseball Topi Quick Dry Topi Pria - GRAY', 55000)">Tambahkan ke Keranjang</button>
            </li>
        </ul>
    </div>

    <!-- Cart Section -->
    <div id="cart">
        <h2>Keranjang Belanja</h2>
        <ul id="cart-items"></ul>
        <p>Total: Rp. <span id="total-price">0</span></p>
        <button onclick="cancelOrder()">Cancel Order</button>
    </div>

    <script>
        var totalPrice = 0;
        var lastScrollTop = 0; // Menyimpan posisi scroll terakhir

        function addItem(itemName, itemPrice) {
            totalPrice += itemPrice;
            $.ajax({
                type: "POST",
                url: "checkout.php",
                data: {
                    name: itemName,
                    price: itemPrice
                },
                success: function(response) {
                    $('#cart-items').html(response);
                    $('#total-price').text(totalPrice); // Update total price
                }
            });
        }

        function cancelOrder() {
            $.ajax({
                type: "POST",
                url: "cancel-order.php",
                success: function(response) {
                    $('#cart-items').html(response);
                    totalPrice = 0;
                    $('#total-price').text(totalPrice);
                }
            });
        }

        function searchMenu() {
            var input = document.getElementById("search-bar");
            var filter = input.value.toUpperCase();
            var ul = document.getElementById("menu-items");
            var li = ul.getElementsByTagName("li");

            for (var i = 0; i < li.length; i++) {
                var h3 = li[i].getElementsByTagName("h3")[0];
                if (h3) {
                    var textValue = h3.textContent || h3.innerText;
                    if (textValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
        }

        // Detect scroll event
        $(window).on('scroll', function() {
            var currentScroll = $(this).scrollTop();
            if (currentScroll > lastScrollTop) {
                // Scroll down, hide navbar
                $('#navbar').css('top', '-100px');
            } else {
                // Scroll up, show navbar
                $('#navbar').css('top', '0');
            }
            lastScrollTop = currentScroll;
        });
    </script>
</body>

</html>
