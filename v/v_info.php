<h3><?=$userlogin?>, это твой личный кабинет!</h3>
    <hr>
<div class="orders">
    <? foreach ($orders_list as $order): ?>
        <div class="orders_order">
            <ul class="orders_products">
                <? foreach ($order['products'] as $product): ?>
                    <li class="orders_product">
                        <img src="<?= $product['miniPhoto'] ?>" alt="Изображение" class="orders_product_pic">
                        <div class="orders_product_info">
                            <span>Название товара: <?= $product['product_name'] ?></span>
                            <span>Количество: <?= $product['quantity'] ?></span>
                            <span>Цена: <?= $product['price'] ?></span>
                            <span>Сумма по товарной позиции: <?= $product['sum'] ?> руб.</span>
                        </div>
                    </li>
                <? endforeach; ?>
            </ul>
            <div class="order_info">
                <span>Сумма заказа: <?= $order['amount'] ?> руб. </span>
                <span>Дата создания заказа: <?= $order['datetime_create'] ?></span>
                <span>Статус заказа: <strong><?= $order['order_status_name'] ?></strong></span>
            </div>
        </div>
        <hr>
    <? endforeach; ?>
</div>


