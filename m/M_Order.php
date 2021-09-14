<?php

include_once 'config/catalog.php';

class M_Order extends Model
{
    public function show ($role = 0) {
        $connect = $this->dbConnecting();

        if ($role === 0) {
            $orders_db = $connect->query("SELECT * FROM orders 
                                               INNER JOIN order_status ON orders.id_order_status = order_status.id_order_status
                                               INNER JOIN users ON orders.id_user = users.id")->fetchAll();
        } else if ($role == 'user') {
            $orders_db = $connect->query("SELECT * FROM orders 
                                               INNER JOIN order_status ON orders.id_order_status = order_status.id_order_status
                                               INNER JOIN users ON orders.id_user = users.id
                                               WHERE orders.id_user = '" . $_SESSION['user_id'] . "'")->fetchAll();
        }
        $orders = [];


        if (isset($orders_db)) {
            foreach ($orders_db as $order_db) {
                $order = ['id_order' => $order_db['id_order'],
                    'login' => $order_db['login'],
                    'amount' => $order_db['amount'],
                    'datetime_create' => $order_db['datetime_create'],
                    'contact' => $order_db['contact'],
                    'order_status_name' => $order_db['order_status_name'],
                    'order_status_id' => $order_db['id_order_status'],
                    'products' => [],

                ];
                $products_db = $connect->query("SELECT * FROM baskets INNER JOIN goods ON baskets.id_product = goods.id WHERE baskets.id_order = '" . $order['id_order'] ."'")->fetchAll();
                foreach ($products_db as $product_db) {
                    $product = [
                        "product_name" => $product_db['nameShort'],
                        "quantity" => $product_db['quantity'],
                        "price" => $product_db['price'],
                        'miniPhoto' => IMG_DIR . $product_db['miniPhoto'],
                        'sum' => $product_db['price'] * $product_db['quantity'],
                    ];
                    array_push($order['products'], $product);
                }
                array_push($orders, $order);
            }
        }
        return $orders;
    }
}