<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['file'])) {
        http_response_code(400);
        echo "No file uploaded.";
        exit;
    }

    $file = $_FILES['file'];
    $allowedExts = ['csv', 'xlsx'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowedExts)) {
        http_response_code(400);
        echo "Invalid file type.";
        exit;
    }

    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $filePath = $uploadDir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        echo "File uploaded successfully.";
    } else {
        http_response_code(500);
        echo "Failed to move uploaded file.";
    }

    $url = 'uploads/' . basename($file['name']);
echo "<p>File uploaded: <a href='$url' target='_blank'>$file[name]</a></p>";
}
?>