<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;
$errorMessage = ""; 


if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $errorMessage .= "File là hình ảnh - " . $check["mime"] . ". ";
    } else {
        $errorMessage .= "File không phải là hình ảnh. ";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    $errorMessage .= "Xin lỗi, file đã tồn tại. ";
    $uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 500*1024) {
    $errorMessage .= "Xin lỗi, kích thước file quá lớn. ";
    $uploadOk = 0;
}


if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
    $errorMessage .= "Xin lỗi, chỉ cho phép file JPG, JPEG, PNG và GIF. ";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    echo "Xin lỗi, không thể upload file. " . $errorMessage;
} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " đã được upload.";
        header("Location: index.php?filename=" . basename($_FILES["fileToUpload"]["name"]));
        exit;
    } else {
        echo "Xin lỗi, đã có lỗi xảy ra khi upload file.";
    }

}