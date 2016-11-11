<?php

require_once __DIR__ . '/mergeImages.php';

// $images = ['../img2.jpg', '../img7.jpg', '../img8.png', 'https://www.autoefectivo.com/img/auto-bien.png', '../img9.gif'];
$remoteImage = 'http://kraken-php.com/build/img/index/logo-php-adbac78231.png';
$images = ['img/boostrap.jpg','img/jquery.png','img/css.jpg', $remoteImage, 'img/html5.png'];
$path = 'files/';
$filename = 'test_merged';

// instance Class
$mergeimages = new MergeImages;

// main process
$mergeimages->process($images, true, true, $path, $filename);

// other methods
// $mergeimages->setItems($images);
// $mergeimages->getItems();
// $mergeimages->mergeItems();
// $mergeimages->saveImage($path, $filename);
// $mergeimages->showImage();