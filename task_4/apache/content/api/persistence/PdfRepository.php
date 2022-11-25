<?php
require_once('configuration/DbConfig.php');

class PdfRepository
{
    private mysqli $connection;

    public function __construct()
    {
        $this->connection = DbConfig::connect();
    }

    public function saveOrUpdate($sessionId, $name, $type, $size, $content): void
    {
        $statement = $this->connection->prepare('INSERT INTO pdf_files (session_id, name, type, size, content) 
                                                       VALUES (?, ?, ?, ?, ?) 
                                                       ON DUPLICATE KEY UPDATE name = ?, type = ?, size = ?, content = ?');
        $statement->bind_param('sssssssss', $sessionId, $name, $type, $size, $content, $name, $type, $size, $content);
        $statement->execute();
    }

    public function findBySessionId($sessionId) {
        return $this->connection->query("SELECT * FROM pdf_files WHERE session_id = '$sessionId'");
    }


    private static PdfRepository $instance;

    public static function getInstance(): PdfRepository
    {
        if (!empty(self::$instance)) {
            return self::$instance;
        }
        self::$instance = new PdfRepository();
        return self::$instance;
    }
}