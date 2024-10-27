<?php
header('Content-Type: text/html; charset=utf-8');


$dir = "docs/";


if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file !== '.' && $file !== '..') {
                echo "<h2>$file</h2>"; 
                $filePath = $dir . $file;
                if (is_file($filePath)) {

                    $content = file_get_contents($filePath);

                    echo nl2br($content); 
                }
                echo "<div class='separator'>*********************************</div>"; 
            }
        }
        closedir($dh);
    }
} else {
    echo "Thư mục không tồn tại.";
}
