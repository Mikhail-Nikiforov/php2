<?php

include_once('m/M_Catalog.php');

class C_Catalog extends C_Base
{
    public function action_show() {
        $this->title .= 'Каталог';
        $catalog = new M_Catalog();
        $this->content = $this->Template('v/v_catalog.php', array('catalog' => $catalog->show()));
    }
}