<?php

use App\Order;
use App\OrderController;
use App\SendEmailToClient;
use App\SendEmailToStock;
use App\SendSmsToClient;

require __DIR__ . "/../vendor/autoload.php";


$order = new Order("lior@mail.com", "+33 622445566", 300);

$controller = new OrderController;

$controller->register([new SendEmailToStock, "send"], "order_before_save");
$controller->register([new SendSmsToClient, "send"], "order_after_save");
$controller->register([new SendEmailToClient, "send"], "order_after_save");

$controller->storeOrder($order);
