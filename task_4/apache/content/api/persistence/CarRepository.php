<?php

class CarRepository
{
    private mysqli $connection;

    public function __construct()
    {
        $this->connection = DbConfig::connect();
    }


    public function save($carToCreate)
    {
        $statement = $this->connection->prepare("INSERT INTO cars(name, color, in_stock_count) VALUES(?, ?, ?)");
        $statement->bind_param('ssi', $carToCreate->name, $carToCreate->color, $carToCreate->inStockCount);
        $statement->execute();
    }

    public function findAll()
    {
        return $this->connection->query("SELECT * FROM cars");
    }

    public function deleteById($idToDelete)
    {
        $statement = $this->connection->prepare("DELETE FROM cars WHERE id = ?");
        $statement->bind_param("i", $idToDelete);
        $statement->execute();
    }

    public function updateById($carToUpdate, $idToUpdate)
    {
        $statement = $this->connection->prepare("UPDATE cars SET name = ?, color = ?, in_stock_count = ? WHERE id = ?");
        $statement->bind_param('ssii', $carToUpdate->name, $carToUpdate->color, $carToUpdate->inStockCount, $idToUpdate);
        $statement->execute();
    }
}