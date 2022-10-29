<?php

require_once('../configuration/DbConfig.php');
require_once ('persistence/ServiceRepository.php');

class ServiceController
{
    private ServiceRepository $serviceRepository;

    public function __construct($serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function create()
    {
        try {
            $serviceToCreate = json_decode(file_get_contents("php://input"));
            $this->serviceRepository->save($serviceToCreate);
            header("Content-Type:application/json; charset=utf-8");
            $response = ["message" => "Service created"];
            http_response_code(201);
            echo json_encode($response);
        } catch (Throwable $error) {
            http_response_code(500);
        }
    }

    public function findAll() {
        try {
            $servicesFromDb = $this->serviceRepository->findAll();
            $services = array();
            while($row = $servicesFromDb->fetch_assoc()) {
                $services[] = $row;
            }
            header("Content-Type:application/json; charset=utf-8");
            http_response_code(200);
            echo json_encode($services, JSON_UNESCAPED_UNICODE);
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
            $this->serviceRepository->deleteById($idToDelete);
            header("Content-Type:application/json; charset=utf-8");
            $response = ["message" => "Service deleted"];
            http_response_code(200);
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
            $serviceToUpdate = json_decode(file_get_contents("php://input"));
            $idToUpdate = $_GET['id'];
            $this->serviceRepository->updateById($serviceToUpdate, $idToUpdate);
            header("Content-Type:application/json; charset=utf-8");
            $response = ["message" => "Service updated"];
            http_response_code(200);
            echo json_encode($response);
        } catch (Throwable $error) {
            http_response_code(500);
        }
    }
}

$serviceRepository = new ServiceRepository();
$controller = new ServiceController($serviceRepository);

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

