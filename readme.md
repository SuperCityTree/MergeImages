# MergeImages

Create a combined image from multiple images using PHP.

By cabenitez <cabenitez83@gmail.com>

### Features
  - Suport JPEG, PNG, GIF and remote images.
  - Easy installation.
  - Display on the screen.
  - Allows you to save the result to a file.
  - Create an new PNG image with transparent background.

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
@param: $show (Boolean | Indicate whether to display the result on the screen).
@param: $save (Boolean | Indicate whether to save the result on the screen).
@param: $path (String | Path to save merged image).
@param: $filename (String | Filename for merged image).
@return Image merged.
*/
$mergeimages->process($images, $show, $save, $path, $filename);

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
```
### Todos

 - Process base64 encoded images

### License

MIT
