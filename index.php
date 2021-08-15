<?php
class Product{
    protected $name;
    protected $price;
    protected $isAvailable;

    function __construct($name, $price, $isAvailable) {
        $this->name = $name;
        $this->price = $price;
        $this->isAvailable = $isAvailable;
    }

    public function checkProduct() {
        echo "Товар $this->name по стоимости $this->price " . (($this->isAvailable > 0) ? "в наличие" : "отсутствует");
    }

}

class Food extends Product {
    protected $shelfLife;

    public function __construct($name, $price, $isAvailable, $shelfLife)
    {
        parent::__construct($name, $price, $isAvailable);
        $this->shelfLife = $shelfLife;
    }

    public function checkProduct() {
        echo "Товар $this->name по цене $this->price руб., со сроком годности $this->shelfLife " . (($this->isAvailable > 0) ? "есть в наличие" : "отсутствует");
    }
}

$food = new Food("Молоко", 123, rand(0,1), "1 месяц");
$food->checkProduct();


// class A {
//     public function foo() {
//         static $x = 0; // Статическая переменная, сохраняющая свое значения после выхода программы из области видимости функции 
//         echo ++$x;
//     }
// }
// $a1 = new A(); 
// $a2 = new A();
// $a1->foo(); //Увеличит перменную $x на 1 и выведет 1
// $a2->foo(); //Увеличит перменную $x на 1 и выведет 2
// $a1->foo(); //Увеличит перменную $x на 1 и выведет 3
// $a2->foo(); //Увеличит перменную $x на 1 и выведет 4

// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo();
// выведет 1122, т.к. методы foo у объектов а1 и b1 имеют разные области видимости
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A; //Скобки необходимы в случае, если конструктору передаются параметры
// $b1 = new B;
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo(); 
?>