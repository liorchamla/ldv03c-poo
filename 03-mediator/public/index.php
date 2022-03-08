<?php

use App\EventDispatcher\Dispatcher;
use App\Order;
use App\OrderController;
use App\SendEmailToClient;
use App\SendEmailToStock;
use App\SendSmsToClient;

require __DIR__ . "/../vendor/autoload.php";

$dispatcher = new Dispatcher();

$sendEmailToStock = new SendEmailToStock;
$sendEmailToClient = new SendEmailToClient;
$sendSmsToClient = new SendSmsToClient;

$dispatcher->register([$sendEmailToStock, "send"], "order_before_save");
$dispatcher->register([$sendEmailToClient, "send"], "order_saved");
$dispatcher->register([$sendSmsToClient, "send"], "order_saved");

$order = new Order("lior@mail.com", "+33 622554499", 300);

$controller = new OrderController($dispatcher);

$controller->storeOrder($order);
