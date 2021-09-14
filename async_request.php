<?php
session_start();
require_once "m/Model.php";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit();
}

$model = new Model();
$connect = $model->dbConnecting();
$data = json_decode(file_get_contents('php://input'));

if ($data->action == 'addProduct') {
    $select = $connect->query("SELECT * FROM baskets WHERE id_user = '" . $_SESSION['user_id'] . "' AND id_product = '" . $data->productId . "' AND baskets.status IS NULL ")->fetchAll(PDO::FETCH_ASSOC);
    if (count($select) == 0) {
        $connect->exec("INSERT INTO baskets (baskets.id, baskets.id_user, baskets.id_product, baskets.quantity, baskets.status) VALUES (null,'" . $_SESSION['user_id'] . "','" . $data->productId . "','" . $data->quantity . "', null)");
    } else {
        $connect->exec("UPDATE baskets SET quantity = " . ($select[0]['quantity'] + $data->quantity) ." WHERE id_user = '" . $_SESSION['user_id'] . "' AND id_product = '" . $data->productId ."'");
    }
    exit("Товар добавлен в корзину");
} else if ($data->action == 'changeQuantity') {
    $select = $connect->query("SELECT * FROM baskets WHERE id_user = '" . $_SESSION['user_id'] . "' AND id_product = '" . $data->productId . "'")->fetchAll(PDO::FETCH_ASSOC);
    if ($data->quantity != 0) {
        $connect->exec("UPDATE baskets SET quantity = " . $data->quantity ." WHERE id_user = '" . $_SESSION['user_id'] . "' AND id_product = '" . $data->productId ."'");
        exit($data->quantity);
    } else {
        $connect->exec("DELETE FROM baskets  WHERE id = '" . $select[0]['id'] . "'");
        exit(0);
    }
} else if ($data->action == 'changeOrderStatus') {
    $connect->exec("UPDATE orders SET id_order_status = " . $data->statusId ." WHERE id_order = '" . $data->orderId . "'");
    $select = $connect->query("SELECT * FROM order_status WHERE id_order_status = '" . $data->statusId . "'")->fetchAll(PDO::FETCH_ASSOC);
    exit ($select[0]['order_status_name']);
}


