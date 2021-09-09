<div class="basket">
    <div class="basket_main">
        <?=$basket?>
    </div>
    <div class="basket_info">
        <span>Общая стоимость товаров в корзине: <span id="totalSum"><?=$total_sum?></span> руб.</span>
    </div>
    <h3>Заполните контактные данные</h3>
    <form action="index.php?c=basket&act=order" method="post" name="order_form" id="makeOrderForm" class="basket_order">
        <label for="mobile">Номер для связи</label>
        <input name="mobile" type="tel" required>
        <button id="toOrder">Оформить заказ</button>
    </form>
</div>
