<?php

include_once('m/M_Product.php');

class C_Product extends C_Base
{
    public function action_show() {
        $this->title .= 'Продукт';
        $product = new M_Product();
        $this->scriptJs .= file_get_contents('assets/js/addProduct.js');
        $this->content = $this->Template('v/v_product.php', array('product' => $product->show(), 'product_id' => $_GET['id']));
    }

}