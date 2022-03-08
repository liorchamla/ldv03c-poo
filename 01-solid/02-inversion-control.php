<?php

interface Storage
{
    public function store();
}

// Classe créée par Anne
class SqlStorage implements Storage
{
    public function __construct(private PDO $pdo)
    {
    }

    public function store()
    {
        // Sauvegarde dans une base de données
        $this->pdo->query("INSERT ...");
    }
}

class FileStorage implements Storage
{
    public function __construct(private string $path)
    {
    }
    public function store()
    {
        // Sauvegarde dans un fichier
        fopen($this->path, "r");
    }
}

class CloudStorage implements Storage
{
    public function store()
    {
        // ...
    }
}

// Classe codée par Anne :
class StoreOrder
{
    public function saveOrder(Storage $storage)
    {
        $storage->store();
    }
}


// Utilisation de la classe par Joseph :
// $pdo = new PDO("mysql:host=localhost;dbname=Y", "user", "password");
// $sqlStorage = new SqlStorage($pdo);
// $fileStorage = new FileStorage("C:\\data.txt");
$cloudStorage = new CloudStorage();

$so = new StoreOrder();
$so->saveOrder($cloudStorage);
