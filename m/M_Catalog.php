<?php

include_once 'config/catalog.php';

class M_Catalog extends Model {

    public function show () {
        $connect = $this->dbConnecting();
        $products = $connect->query("SELECT `id`, `nameShort` AS name, `miniPhoto` AS `src`, `bigPhoto` AS `srcBig`, `param` AS `description`, `price` AS `price` FROM `goods` limit " . CATALOG_LIMIT)->fetchAll();
        $catalog = '';
        if (isset($products)) {
            foreach ($products as $product) {
                $catalog .= '<div class="product-small">
                    <a class="product-small_link" href="index.php?c=product&act=show&id=' . $product['id'] . '">
                        <img class="product-small_pic" src="'. IMG_DIR . $product['src'] . '" alt="Изображение" title="'. $product['name'] . '">
                        <span class="product-small_title">'. $product['name'] . '</span>
                    </a>
				 </div>';
            }

        }
        return $catalog;
    }
}