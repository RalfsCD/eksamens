

<?php
$config = require "config.php";

class Database {
    private $pdo;

    public function __construct($config) {
        $connection_string = "mysql:" . http_build_query($config, "", ";");
        $this->pdo = new PDO($connection_string, $config['user'], $config['password']);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    public function execute($query_string, $params = []) {
        $stmt = $this->pdo->prepare($query_string);
        $stmt->execute($params);
        return $stmt;
    }
    public function getallusers() {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }
};