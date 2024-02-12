<?php
// imort from JSON
$json_data = file_get_contents('json/machines.json');
$data = json_decode($json_data, true);
?>
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
    <ul class="navbar-buttons-list">
        <li><button class="navbar-buttons-list-item"><i class="fa-solid fa-sort"></i></button></li>
        <li><button class="navbar-buttons-list-item"><i class="fa-solid fa-plus"></i></button></li>
        <li><button class="navbar-buttons-list-home"><i class="fa-solid fa-house"></i></button></li>
        <li class="navbar-search">
            <input type="text" class="navbar-buttons-list-input" placeholder="Search">
            <button class="navbar-buttons-list-item"><i class="fa-solid fa-magnifying-glass"></i></button>
        </li>
    </ul>
    </nav>
    <!-- content -->
    <section class="content" id="content">
        <div class="content-wrapper">
            <div class="content-wrapper-card">
            <?php foreach ($data as $item): ?>
                <div class="machineCard">
                    <div class="productImgDiv">
                        <img class="productImage" src="data:image/png;base64,<?php echo $item['image']; ?>" alt="Red dot">
                    </div>
                    <div class="productDataText">
                        <h3><?php echo $item['model']; ?></h3>
                        <p><?php echo $item['name']; ?></p>
                        <p><?php echo $item['location']; ?></p>
                    </div>
                    <div class="removeButton">
                        <button type="button" onclick="openCardDetails()">Details</button>
                    </div>
                    <div class="showHideDiv">
                        <p><?php echo $item['productNumber']; ?></p>
                        <p><?php echo $item['type']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- footer -->
    <footer class="footer">
        <div class="footer-heading"></div>
    </footer>
</body>
</html>