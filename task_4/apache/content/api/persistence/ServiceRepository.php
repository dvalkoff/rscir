<?php

class ServiceRepository
{
    private mysqli $connection;

    public function __construct()
    {
        $this->connection = DbConfig::connect();
    }


    public function save($service)
    {
        $statement = $this->connection->prepare("INSERT INTO services(name, price, currency) VALUES(?, ?, ?)");
        $statement->bind_param('sss', $service->name, $service->price, $service->currency); // TODO
        $statement->execute();
    }

    public function findAll()
    {
        return $this->connection->query("SELECT * FROM services");
    }

    public function deleteById($idToDelete)
    {
        $statement = $this->connection->prepare("DELETE FROM services WHERE id = ?");
        $statement->bind_param("i", $idToDelete);
        $statement->execute();
    }

    public function updateById($serviceToUpdate, $idToUpdate)
    {
        $statement = $this->connection->prepare("UPDATE services SET name = ?, price = ?, currency = ? WHERE id = ?");
        $statement->bind_param('sssi', $serviceToUpdate->name, $serviceToUpdate->price, $serviceToUpdate->currency, $idToUpdate); // TODO
        $statement->execute();
    }
}