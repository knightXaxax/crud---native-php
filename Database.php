<?php

class Database 
{
    public $connection = "";
    public $error_message = "";

    public function __construct($config)
    {
        try {
            $this->connection = new PDO($config['dsn'], $config['user'], $config['passwd']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->error_message = $e->getMessage();
        }
    }

    public function raw_query($query, $placeholders)
    {
        try {
            $this->connection->beginTransaction();
            $stmt = $this->connection->prepare($query);
            $stmt->execute($placeholders);
            $this->connection->commit();
            return $stmt;
        } catch (PDOException $e) { 
            $this->connection->rollback();
            $this->error_message = $e->getMessage();
            return $this->error_message;
        }
    }
}