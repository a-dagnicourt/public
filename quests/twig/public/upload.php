<?php

require '../vendor/autoload.php';

$uploadFolder = '../uploads/';

if (!empty($_FILES['files']['name'][0])) {
    $files = $_FILES['files'];
    $maxSize = 10000000;

    $uploaded = array();
    $failed = array();

    $allowedExtensions = array('png', 'gif', 'jpg', 'jpeg');

    foreach ($files['name'] as $position => $filename) {

        $fileTemp = $files['tmp_name'][$position];
        $fileSize = $files['size'][$position];
        $fileError = $files['error'][$position];

        $fileExtension = explode('.', $filename);
        $fileExtension = strtolower(end($fileExtension));

        if (in_array($fileExtension, $allowedExtensions)) {
            if ($fileError === 0) {
                if ($fileSize < $maxSize) {
                    $uniqueFilename = uniqid('', true) . '.' . $fileExtension;
                    $fileDestination = $uploadFolder . $uniqueFilename;

                    if (move_uploaded_file($fileTemp, $fileDestination)) {
                        $uploaded[$position] = $fileDestination;
                    } else {
                        $failed[$position] = "[{$filename}] upload failed.";
                    }
                } else {
                    $failed[$position] = "[{$filename}] size is too large.";
                }
            } else {
                $failed[$position] = "[{$filename}] error code : {$fileError}.";
            }
        } else {
            $failed[$position] = "[{$filename}] file extension {$fileExtension} is invalid.";
        }
    }

    // if (!empty($uploaded)) {
    //     echo '<pre>', print_r(($uploaded), '</pre>');
    // }

    // if (!empty($failed)) {
    //     echo '<pre>', print_r(($failed), '</pre>');
    // }
}

$itemList = array();
$items = new FilesystemIterator($uploadFolder);
foreach ($items as $fileinfo) {
    $itemList[] =  $fileinfo->getPathname();
}

$loader = new Twig\Loader\FilesystemLoader(__DIR__ . '/../src/View');
$twig = new Twig\Environment($loader);

echo $twig->render('base.html.twig', ['itemList' => $itemList]);
