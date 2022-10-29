<?php

require_once('../configuration/DbConfig.php');
require_once ('persistence/CarRepository.php');

class CarController
{
    private CarRepository $carRepository;

    public function __construct($carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function create()
    {
        try {
            $carToCreate = json_decode(file_get_contents("php://input"));
            $this->carRepository->save($carToCreate);
            header("Content-Type: application/json; charset=UTF-8");
            http_response_code(201);
            $response = ["message" => "Car created"];
            echo json_encode($response);
        } catch (Throwable $error) {
            http_response_code(500);
        }
    }

    public function findAll() {
        try {
            $carsFromDb = $this->carRepository->findAll();
            $cars = array();
            while($row = $carsFromDb->fetch_assoc()) {
                $cars[] = $row;
            }
            header("Content-Type:application/json; charset=utf-8");
            http_response_code(200);
            echo json_encode($cars, JSON_UNESCAPED_UNICODE);
        } catch (Throwable $error) {
            http_response_code(500);
        }
    }

    public function deleteById() {
        try {
            if (!isset($_GET['id'])) {
                http_response_code(400);
                return;
            }
            $idToDelete = $_GET['id'];
            $this->carRepository->deleteById($idToDelete);
            http_response_code(200);
            header("Content-Type:application/json; charset=utf-8");
            $response = ["message" => "Car deleted"];
            echo json_encode($response);
        } catch (Throwable $error) {
            http_response_code(500);
        }
    }

    public function updateById() {
        try {
            if (!isset($_GET['id'])) {
                http_response_code(400);
                return;
            }
            $carToUpdate = json_decode(file_get_contents("php://input"));
            $idToUpdate = $_GET['id'];
            $this->carRepository->updateById($carToUpdate, $idToUpdate);
            header("Content-Type:application/json; charset=utf-8");
            http_response_code(200);
            $response = ["message" => "Car updated"];
            echo json_encode($response);
        } catch (Throwable $error) {
            http_response_code(500);
        }
    }
}

$carRepository = new CarRepository();
$controller = new CarController($carRepository);

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        $controller->findAll();
        break;
    case "POST":
        $controller->create();
        break;
    case "DELETE":
        $controller->deleteById();
        break;
    case "PUT":
        $controller->updateById();
        break;
    default:
        http_response_code(501);
        break;
}

