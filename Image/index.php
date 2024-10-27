<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Ảnh</title>
    <style>
        body {
            margin: 0 auto;
        }

        .form {
            border: 1px solid;
            padding: 10px;
            margin: 0 auto;
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="form">
        <h1 style="color:green; text-align:center">UPLOAD FLIE HÌNH</h1>
        <form action="xl_upload.php" method="post" enctype="multipart/form-data">
            <div style="display:flex; padding:10px;">
                <div style="width:70%;margin-right: 30px;">Chọn file cần upload: <br><span style="color:red"><i>(Chỉ chọn *.jpg, *.gif, *.png)</i></span></div>
                <div>
                    <input type="file" name="fileToUpload" accept="image/jpg, image/jpeg, image/png, image/gif" required>
                    <input style="margin-top:10px" type="submit" value="Upload Ảnh">
                </div>
            </div>
        </form>
    </div>
    <?php
    if (isset($_GET['filename'])) {
        $filename = htmlspecialchars($_GET['filename']);
        echo "<div style='text-align: center'>";
        echo "<h2 style='color:green'>KẾT QUẢ UPLOAD FILE HÌNH</h2>";
        echo "<img src='uploads/$filename' alt='$filename' style='max-width: 500px;'>";
        echo "</div>";
    }
    ?>
</body>

</html>