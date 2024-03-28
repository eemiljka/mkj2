<?php
global $DBH;
require 'dbConnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && isset($_POST['description'])) {
        $data = [
            'user_id' => 1,
            'filename' => 'https://via.placeholder.com/150',
            'filesize' => 1234567,
            'media_type' => 'image',
            'title' => $_POST['title'],
            'description' => $_POST['description'],
        ];
        $sql = "INSERT INTO MediaItems (user_id, filename, filesize, media_type, title, description)
            VALUES (:user_id, :filename, :filesize, :media_type, :title, :description)";

        try {
            $STH = $DBH->prepare($sql);
            $STH->execute($data);
            header('Location: index.php?success=Item+added+successfully');
        }   catch (PDOException $e) {
            echo "Could not insert data into database.";
            file_put_contents('PDOErrors.txt', 'insertData.php - ' . $e->getMessage(), FILE_APPEND);
        }
    }
}