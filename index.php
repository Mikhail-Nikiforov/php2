<?php
// declare(strict_types=1);

// ini_set('error_reporting', (string)E_ALL);
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');

abstract class Product {
    
    const PROFIT_PER_PRODUCT = 10;
    abstract public function finalСost();
    abstract public function profitCalc();

}

class DigitalProduct extends Product {

    const COST_PER_PRODUCT = 100;
    private $totalQuantity;

    public function __construct($totalQuantity) {
        self::setTotalQuantity($totalQuantity);
    }
    
    public function getCostPerProduct() {
        return COST_PER_PRODUCT;
    }

    public function getTotalQuantity() {
        return $this->totalQuantity;
    }

    public function setTotalQuantity($totalQuantity=0) {
        $this->totalQuantity = $totalQuantity;
    }

    public function finalСost() {
        return self::COST_PER_PRODUCT * $this->totalQuantity;
    }

    public function profitCalc() {
        return  $this->finalСost() / 100 * parent::PROFIT_PER_PRODUCT;
    }

}

class PieceProduct extends DigitalProduct {

    public function getCostPerProduct() {
        return parent::COST_PER_PRODUCT * 2;
    }

    public function finalСost() {
        return $this->getCostPerProduct() * parent::getTotalQuantity();
    }

    public function profitCalc() {
        return  $this->getCostPerProduct() / 100 * parent::PROFIT_PER_PRODUCT;
    }

}

class WeightProduct extends Product {

    private $costPerProduct;
    private $wieght;

    public function __construct($costPerProduct, $wieght) {
        self::setCostPerProduct($costPerProduct);
        self::setWieght($wieght);
    }

    public function setCostPerProduct($costPerProduct=0) {
        $this->costPerProduct = $costPerProduct;
    }
    
    public function setWieght($wieght=0) {
        $this->wieght = $wieght;
    }

    public function finalСost() {
        return $this->costPerProduct * $this->wieght;
    }
    
    public function profitCalc() {
        return $this->costPerProduct * $this->wieght / 100 * parent::PROFIT_PER_PRODUCT;
    }
}

$digProd = new DigitalProduct(5);
echo $digProd->profitCalc();

$pieceProd = new PieceProduct(5);
echo $pieceProd->profitCalc();

$weightProd = new WeightProduct(5, 250);
echo $weightProd->profitCalc();

?>