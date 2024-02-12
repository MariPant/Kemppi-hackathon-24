<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="images/kemppi_logo.png">
    <script src="https://kit.fontawesome.com/1e581cada8.js" crossorigin="anonymous"></script>
    <title>Kemppi Hackathon 2024</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-brand">
            <div class="header-brand-logo">
                <img src="images/KEMPPI-LOGO-NEGATIVE-TRANSPARENT-RGB.png" alt="Kemppi" class="header-brand-logo-picture">
            </div>
        </div>
        <div class="header-banner"></div>
    </header>
    <nav class="navbar">
        <div class="navbar-buttons">
            <ul class="navbar-buttons-list">
                <li><input type="text" class="navbar-buttons-list-input" placeholder="Search"></li>
                <li><button class="navbar-buttons-list-item"><i class="fa-solid fa-magnifying-glass"></i></button></li>
                <li><button class="navbar-buttons-list-item"><i class="fa-solid fa-sort"></i></button></li>
                <li><button class="navbar-buttons-list-item"><i class="fa-solid fa-plus"></i></button></li>
                <li><button class="navbar-buttons-list-home"><i class="fa-solid fa-house"></i></button></li>
            </ul>
        </div>
    </nav>
    <!-- content -->
    <section class="content" id="content">
        <div class="content-wrapper">
            <div class="content-wrapper-card">
                <!-- This is where the cards will be dynamically added -->
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="footer">
        <div class="footer-heading"></div>
    </footer>

    <!-- JavaScript code -->
    <script>
        window.onload = function() {
            var contentSection = document.getElementById('content');

            fetch('machines.json')
                .then(response => response.json())
                .then(data => {
                    data.forEach(item => {
                        var cardDiv = document.createElement('div');
                        var imgDiv = document.createElement('div');
                        var textDiv = document.createElement('div');
                        var buttonDiv = document.createElement('div');
                        var additionalDiv = document.createElement('div');
                        var imageElement = document.createElement('img');

                        cardDiv.className = 'machineCard';
                        imgDiv.className = 'productImgDiv';
                        textDiv.className = 'productDataText';
                        buttonDiv.className = 'removeButton';
                        additionalDiv.className = 'showHideDiv';

                        imageElement.className = 'productImage';

                        cardDiv.appendChild(imgDiv);
                        cardDiv.appendChild(textDiv);
                        cardDiv.appendChild(buttonDiv);
                        cardDiv.appendChild(additionalDiv);

                        imgDiv.appendChild(imageElement);
                        imageElement.src = 'data:image/png;base64,<?php echo base64_encode(file_get_contents('machines.json')); ?>';
                        imageElement.alt = 'Red dot';

                        textDiv.innerHTML = `
                                <h3><?php echo $item['model']; ?></h3>
                                <label for='name'>Product name</label><br>
                                <input type="text" id='name' name='name'><br>
                                <label for='location'>Location</label><br>
                                <input type="text" id='location' name='location'><br>`;

                        buttonDiv.innerHTML = '<button type="button">Add</button>';

                        additionalDiv.innerHTML = `
                            <p><?php echo $item['productNumber']; ?></p>
                            <p><?php echo $item['type']; ?></p>`;

                        contentSection.appendChild(cardDiv);
                    })
                });
        }
    </script>
</body>
</html>
