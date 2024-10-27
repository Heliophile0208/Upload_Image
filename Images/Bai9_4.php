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
    <script>
        function addFileInputs() {
            const numFiles = document.querySelector('input[name="numFiles"]').value;
            const fileInputContainer = document.getElementById('fileInputContainer');
            fileInputContainer.innerHTML = ''; // Xóa các input cũ
            
            for (let i = 0; i < numFiles; i++) {
                const input = document.createElement('input');
                input.type = 'file';
                input.name = 'file[]';
                fileInputContainer.appendChild(input);
                fileInputContainer.appendChild(document.createElement('br'));
            }
        }
    </script>
</head>

<body>
    <div class="form">
        <form id="uploadForm" action="xl_upload.php" method="post" enctype="multipart/form-data">
            <div style="padding:10px;">
                <div style="display:flex;">
                    Chọn số file hình cần upload:
                    <input style="margin:0 10px;" type="number" name="numFiles" min="1" required>
                    <button type="button" name="continue" onclick="addFileInputs()">Tiếp Tục</button>
                </div>
                <div style="border-top: 1px solid black; margin: 10px 0;"></div>
                <div id="fileInputContainer"></div>
                <p><input type="submit" name="upload" value="Upload File"/></p>
            </div>
        </form>
    </div>

    <?php
    if (isset($_GET['filename'])) {
        $filenames = explode(' ', $_GET['filename']);
        echo "<div style='text-align: center'>";
        echo "<h2 style='color:green'>KẾT QUẢ UPLOAD FILE HÌNH</h2>";
        foreach ($filenames as $filename) {
            echo "<img src='uploads/" . htmlspecialchars($filename) . "' alt='" . htmlspecialchars($filename) . "' style='max-width: 150px; height:150px; margin: 10px;'>";
        }
        echo "</div>";
    }
    ?>
</body>

</html>
