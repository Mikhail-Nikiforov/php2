<?php

include_once('m/M_Basket.php');

class C_Basket extends C_Base
{
    public function action_show() {
        $this->title .= 'Корзина';
        $basket = new M_Basket();
        $this->scriptJs .= file_get_contents('assets/js/changeQuantity.js');
        $this->content = $this->Template('v/v_basket.php', array('basket' => $basket->show(), 'total_sum' => $basket->total_sum()));
    }

    public function action_order() {
        $this->title .= 'Главная страница';
        $basket = new M_Basket();
        $basket->order();
        $this->content = $this->Template('v/v_index.php', array('text' => 'Заказ оформлен! Скоро наш менеджер свяжется с вами для уточнения деталей'));
    }
}