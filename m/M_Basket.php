<?php

include_once 'config/catalog.php';

class M_Basket extends Model
{
    public function get_basket() {
        $connect = $this->dbConnecting();
        return $connect->query("SELECT * FROM baskets INNER JOIN goods ON baskets.id_product = goods.id WHERE (baskets.id_user = '" . $_SESSION['user_id'] . "' AND baskets.status IS NULL)")->fetchAll(PDO::FETCH_ASSOC);
    }
    public function show() {
        $basket_db = $this->get_basket();
        $basket_html = '';
        if (count($basket_db)) {
            foreach ($basket_db as $product) {
                $basket_html .= '
                    <div class="product-small" id="product'. $product['id'] .'">
                        <a class="product-small_link" href="index.php?c=product&act=show&id=' . $product['id_product'] . '">
                            <img class="product-small_pic" src="'. IMG_DIR . $product['miniPhoto'] . '" alt="Изображение" title="'. $product['nameShort'] . '">
                            <span class="product-small_title">'. $product['nameShort'] . '</span>
                            
                        </a>
                        <span class="product-small_title"><span id="product'. $product['id'] .'Price">'. $product['price'] . '</span> руб.</span>
                        <form  class="product_buy-form" method="post" name="buying_form" id="productBuyForm">
                            <input type="number" name="count" id="quantity'. $product['id'] .'" data-quantity="'. $product['quantity'] . '" required min="0" value="'. $product['quantity'] . '">
                            <input type="button" name="button" class="btn_changeQuantity" id="changeQuantity'. $product['id'] .'" data-id="' . $product['id'] . '" data-quantity="' . $product['quantity'] . '" data-price="' . $product['price'] . '" value="Изменить колличество">
                        </form> 
                     </div>
                ';
            }

        } else {
            $basket_html = '<h2>Корзина пустая</h2>';
        }
        return $basket_html;
    }

    public function total_sum() {
        $basket = $this->get_basket();
        $total_sum = 0;
        foreach ($basket as $product) {
            $total_sum += $product['price'] * $product['quantity'];
        }
        return $total_sum;
    }

    public function order() {
        $connect = $this->dbConnecting();
        $basket_db = $connect->query("SELECT * FROM baskets WHERE (baskets.id_user = '" . $_SESSION['user_id'] . "' AND baskets.status IS NULL)")->fetchAll(PDO::FETCH_ASSOC);
        var_dump($basket_db);
        $connect->exec("INSERT INTO orders (orders.id_order, orders.id_user, orders.amount, orders.datetime_create, orders.id_order_status, orders.contact) VALUES (null, '" . $_SESSION['user_id'] . "','" . $this->total_sum() . "', '" . date('Y/m/d H:i:s', time()) . "', '1', '" . $_POST['mobile'] . "')");
        $order_id = $connect->lastInsertId();
        foreach ($basket_db as $product) {
            var_dump($product);
            $connect->exec("UPDATE baskets SET baskets.status = '1', baskets.id_order = '" . $order_id ."' WHERE id = '" . $product['id'] . "'");
            var_dump($product);
        }
    }
}