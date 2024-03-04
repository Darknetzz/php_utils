# Images
Contains certain methods for manipulating images, such as blurring etc.

## <font color="green">__construct</font>
The contruct method checks for the presence of required PHP module `imagick`.
```php
public function __construct() {
    // Initialization code goes here
    if (!extension_loaded('imagick')) {
        die("Imagick extension is not enabled. To use the class `Images` you must have Imagick extension enabled.");
    }
}
```

## <font color="green">blur</font>
```php
function blur(string $imagePath, float $radius = 10, float $sigma = 25, int $channel = imagick::CHANNEL_ALL)
```