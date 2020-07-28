<?php namespace Models;


abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    public function findAll($order = "")
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($order){
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();

        return $articles;
    }

}