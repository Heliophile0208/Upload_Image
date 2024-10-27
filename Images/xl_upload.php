<?php
// Kiểm tra nếu có file được tải lên
if (isset($_FILES['file'])) {
    $uploadsDir = 'uploads/';
    $uploadedFiles = [];
    
    // Kiểm tra và tạo thư mục uploads nếu chưa tồn tại
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0755, true);
    }

    foreach ($_FILES['file']['name'] as $key => $name) {
        $tmpName = $_FILES['file']['tmp_name'][$key];
        $error = $_FILES['file']['error'][$key];
        $size = $_FILES['file']['size'][$key];

        // Kiểm tra lỗi
        if ($error === UPLOAD_ERR_OK) {
            // Kiểm tra kích thước file (giới hạn 2MB)
            if ($size > 2 * 1024 * 1024) {
                echo "File $name quá lớn. Vui lòng chọn file nhỏ hơn 2MB.<br>";
                continue;
            }

            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($ext, $allowedExtensions)) {
                echo "Định dạng file không hợp lệ cho file $name.<br>";
                continue;
            }


            $targetFile = $uploadsDir . basename($name);
            if (move_uploaded_file($tmpName, $targetFile)) {
                $uploadedFiles[] = $name; 
            } else {
                echo "Có lỗi khi tải lên file $name.<br>";
            }
        } else {
            echo "Có lỗi với file $name. Mã lỗi: $error<br>";
        }
    }
    if (!empty($uploadedFiles)) {
        header('Location: Bai9_4.php?filename=' . urlencode(implode(' ', $uploadedFiles)));
        exit;
    }
} else {
    echo "Không có file nào được tải lên.";
}
