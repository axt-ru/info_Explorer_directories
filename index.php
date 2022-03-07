<?php
 $dir = scandir('.');
 print_r($dir);
 $path = $_SERVER['DOCUMENT_ROOT'];
 echo "<br>\n" . $path . "<br>\n";
 echo "Содержание корневой директории". "<br>\n";
 foreach (new DirectoryIterator($path) as $fileInfo) {
    if ($fileInfo->isDot()) continue;
    echo $fileInfo->getFilename() . "<br>\n";
 }

 $mark = \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::FOLLOW_SYMLINKS;
 $iterator = new \RecursiveDirectoryIterator($path, $mark);   // Рекурсивный итератор директорий
 $iterator = new \RecursiveIteratorIterator($iterator, \RecursiveIteratorIterator::SELF_FIRST);

 echo "Содержание дерева директорий". "<br>\n";
 foreach ($iterator as $file)
 {
    echo $file . "<br>\n";
 }