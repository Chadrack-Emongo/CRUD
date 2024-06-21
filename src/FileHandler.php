<?php
namespace App;

class FileHandler {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function read() {
        if (file_exists($this->filePath)) {
            $content = file_get_contents($this->filePath);
            return json_decode($content, true);
        }
        return [];
    }

    public function write(array $data) {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($this->filePath, $jsonData);
    }
}