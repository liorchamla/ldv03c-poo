<?php

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

// $log = new Log;

// $n1 = new ManageNews($log, "Article PHP");
// $n2 = new ManageNews($log, "Article MySQL");
// $n3 = new ManageNews($log, "Article JS");
// $n4 = new ManageNews($log, "Article MongoDB");
// $n5 = new ManageNews($log, "Article Python");

// var_dump($log->getStorage());

// $circle = new Circle;
// $red = new Color('red');
// $blue = new Color('blue');

// $circle->setColor($red);
// echo $circle->getColor()->getName() . "\n";

// $circle->setColor($blue);
// echo $circle->getColor()->getName() . "\n";

$A = new Point(0, 0);
$B = new Point(2, 0);
$C = new Point(2, 2);
$D = new Point(0, 2);

$square = new Square($A, $B, $C, $D);

echo $square->area();
