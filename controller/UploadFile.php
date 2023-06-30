<?php

function uploadFile($file, $uploadDir) {
    $fileName = $file['name'];
    $tmpFilePath = $file['tmp_name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $uniqueFileName = uniqid() . '.' . $fileExtension;
    $uploadPath = $uploadDir . $uniqueFileName;

    if (move_uploaded_file($tmpFilePath, $uploadPath)) {
        return $uniqueFileName;
    } else {
        return '';
    }
}
