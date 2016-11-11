# MergeImages

Create a new image merged from the images with PHP.

By cabenitez <cabenitez83@gmail.com>

### Features
  - Suport JPEG, PNG, GIF and remote images.
  - Easy installation.
  - Display on the screen.
  - Allows you to save the result to a file.
  - Create an new PNG image with transparent background.

### Graphic explanation

<img src="https://raw.githubusercontent.com/cabenitez/MergeImages/master/img/css.jpg" width="100"/> +
<img src="http://kraken-php.com/build/img/index/logo-php-adbac78231.png" width="100"/> +
<img src="https://raw.githubusercontent.com/cabenitez/MergeImages/master/img/html5.png" width="100"/> =>
<img src="https://raw.githubusercontent.com/cabenitez/MergeImages/master/img/merged.png" width="200"/>


### Requirements

- PHP 5+
- GD library

### Installation
Download and extract the [latest release](https://github.com/MergeImages).

### Usage

```php
<?php
// include mergeImages.php file
require_once 'mergeImages/mergeImages.php';

// instance Class
$mergeimages = new MergeImages;

// Images to be merged
$images = ['image1.jpg', 'image2.jpg', 'image3.png'];

// call to main process
$mergeimages->process($images);

```

### Methods

```php
<?php
/*
@param: $images (Array | Images to be merged).
@param: $save (Boolean | Indicate whether to save the result on the screen).
@param: $path (String | Path to save merged image).
@param: $filename (String | Filename for merged image).
@param: $output (String | Indicate whether you want to display the result on the screen, get the base64 code or none, the allowed values are "none", "screen" or "base64").
@return Image merged.
*/
$mergeimages->process($images, $save, $path, $filename, $output);

/*
@param: $images (Array | Images to be merged).
@return None.
*/
$mergeimages->setItems($images);

/*
@param: None.
@return Array of images added.
*/
$mergeimages->getItems();

/*
@param: None.
@return None.
*/
$mergeimages->mergeItems();

/*
@param: $path (String | Path to save merged image).
@param: $filename (String | Filename for merged image).
@return Image merged.
*/
$mergeimages->saveImage($path, $filename);

/*
@param: None.
@return Merged image.
*/
$mergeimages->showImage();

/*
@param: None.
@return Merged image encoded with MIME base64.
*/
$src = $mergeimages->getImage();
<img src="<?=$src?>" alt="Merged Image">

```
### Todos

 - Process base64 encoded images

### License

MIT
