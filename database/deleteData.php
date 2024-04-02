<?php
global $DBH;
require 'dbConnect.php';

if (isset($_GET['id'])) {
    $DBH->beginTransaction();
    $data = [
        'media_id' => $_GET['id']
    ];

    // delete file from server

    // delete likes
    $sql = 'DELETE FROM Likes WHERE media_id = :media_id';
    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
    } catch (PDOException $e) {
        $DBH->rollBack();
        echo "Could not delete likes from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
        exit;
    }
    // delete comments
    $sql = 'DELETE FROM Comments WHERE media_id = :media_id';
    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
    } catch (PDOException $e) {
        $DBH->rollBack();
        echo "Could not delete comments from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
        exit;
    }
    // delete ratings
    $sql = 'DELETE FROM Ratings WHERE media_id = :media_id';
    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
    } catch (PDOException $e) {
        $DBH->rollBack();
        echo "Could not delete ratings from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
        exit;
    }
    // delete MediaItemTags
    $sql = 'DELETE FROM MediaItemTags WHERE media_id = :media_id';
    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
    } catch (PDOException $e) {
        $DBH->rollBack();
        echo "Could not delete MediaItemTags from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
        exit;
    }
    // delete MediaItems
    $sql = 'DELETE FROM MediaItems WHERE media_id = :media_id';
    try {
        $STH = $DBH->prepare($sql);
        $STH->execute($data);
        $DBH->commit();
        header('Location: index.php?success=Item deleted');
    } catch (PDOException $e) {
        $DBH->rollBack();
        echo "Could not delete data from the database.";
        file_put_contents('PDOErrors.txt', 'deleteData.php - ' . $e->getMessage(), FILE_APPEND);
        exit;
    }
} else {
    header('Location: index.php?error=No id given');
}

