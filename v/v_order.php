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
                <span>Номер заказа: <?= $order['id_order'] ?></span>
                <span>Имя заказчика: <?= $order['login'] ?></span>
                <span>Сумма заказа: <?= $order['amount'] ?> руб. </span>
                <span>Дата создания заказа: <?= $order['datetime_create'] ?></span>
                <span>Контакты: <?= $order['contact'] ?></span>
                <form method="post" name="order_status_form" id="orderChangeStatus">
                    <p>
                        <select id="select<?= $order['id_order'] ?>" size="4" name="order_status">
                            <option disabled>Статус заказа</option>
                            <option value="1" <?php if ($order['order_status_id'] == 1): ?>selected<?php endif;?>>Не обработан</option>
                            <option value="2" <?php if ($order['order_status_id'] == 2): ?> selected<?php endif;?>>Обработан</option>
                            <option value="5" <?php if ($order['order_status_id'] == 5): ?> selected<?php endif;?>>Отменён</option>
                        </select>
                    </p>
                    <button class="btn_changeStatus" type="button" id="changeStatus" data-id="<?= $order['id_order'] ?>">Подтвердить</button>
                </form>
            </div>
        </div>
        <hr>
    <? endforeach; ?>
</div>
