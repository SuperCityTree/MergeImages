<?php

require_once __DIR__ . '/mergeImages.php';

$remoteImage = 'http://kraken-php.com/build/img/index/logo-php-adbac78231.png';
$images = ['img/boostrap.jpg','img/jquery.png','img/css.jpg', $remoteImage, 'img/html5.png'];
$path = 'files/';
$filename = 'test_merged';
$output = 'screen';

// instance Class
$mergeimages = new MergeImages;

// main process
$mergeimages->process($images, false, $path, $filename, $output);

// other methods
// $mergeimages->setItems($images);
// $mergeimages->getItems();
// $mergeimages->mergeItems();
// $mergeimages->saveImage($path, $filename);
// $mergeimages->showImage();
// $mergeimages->getImage();


?>