<?php

include_once('m/M_Order.php');

class C_Order extends C_Base
{
    public function action_show(){
        $order = new M_Order();
        $this->title .= 'Управление заказами';
        $this->scriptJs .= file_get_contents('assets/js/changeOrderStatus.js');
        $this->content = $this->Template('v/v_order.php', array('orders_list' => $order->show()));
    }
}