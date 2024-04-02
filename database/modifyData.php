<?php
global $DBH;
require 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['title']) && isset($_POST['description'])) {
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'media_id' => $_POST['media_id'],
        ];

        $sql = 'UPDATE MediaItems SET title = :title, description = :description WHERE media_id = :media_id';

        try {
            $STH = $DBH->prepare($sql);
            $STH->execute($data);
            header('Location: index.php?success=Item modified');
        } catch (PDOException $e){
            echo "Could not modify data in the database.";
            file_put_contents('PDOErrors.txt', 'modifyData.php - ' . $e->getMessage(), FILE_APPEND);
        }
    }
}