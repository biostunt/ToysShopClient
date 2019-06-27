<?php
    session_start();
?>

<head>
    <meta charset="utf-8">
    <title>Корзина</title>
    <link rel="stylesheet" href="style/cart.css">
    <link rel="stylesheet" href="style/toast.css">
    <link rel="stylesheet" href="style/price-list.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="script/toast.js" type="text/javascript"></script>
    <script src="script/ajax.js" type="text/javascript"></script>
</head>

<body>
    <div class="header"></div>

    <div id='main'></div>
    <div id="goods"></div>

    <div id="footer">
        <h2 id="totalPrice"> Сумма Заказа: 0</h2>
        <a id="cart">Заказать</a>
    </div>



    <script src="script/cart.js" type="text/javascript"></script>
</body>
