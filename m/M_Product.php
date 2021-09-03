<?php

include_once 'config/catalog.php';

class M_Product extends Model
{
    public function show () {
        $connect = $this->dbConnecting();
        $product = $connect->query("SELECT `id`, `nameShort` AS name, `nameFull`, `miniPhoto` AS `src`, `bigPhoto` AS `srcBig`, `param` AS `description`, `price` AS `price` FROM `goods` WHERE `id` = " . $_GET['id'])->fetch();
        return '<img class="product_pic" src="'. IMG_DIR . $product['srcBig'] . '" alt="Изображение" title="'. $product['name'] . '">
                <div class="product_info">
                    <span class="product_title">'. $product['name'] . '</span>
                    <span class="product_price">'. $product['price'] . ' руб.</span>
                </div>
                <h3 class="product_fullname">' . $product['nameFull'] . '</h3>
                <p class="product_description">' . $product['description'] . '</p>
                <form  class="product_buy-form" method="post" name="buying_form" id="productBuyForm">
					<input type="number" name="count" id="quantity" min="1" required value="1">
					<input type="button" name="button" id="addToBasket" data-id="' . $product['id'] . '" value="Добавить в корзину">
				</form>
                ';
    }
}



