***

# Images

Class Images

This class provides utility functions for working with images using the Imagick extension.

* Full name: `\Images`
* Parent class: [`\Base`](./Base.md)




## Methods


### __construct

Images constructor.

```php
public __construct(): mixed
```

Initializes the Images class and checks if the Imagick extension is enabled.
If the extension is not enabled, it terminates the script execution.










***

### blur

Blur an image.

```php
public blur(string $imagePath, float $radius = 10, float $sigma = 25, int $channel = imagick::CHANNEL_ALL): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$imagePath` | **string** | The path to the image file. |
| `$radius` | **float** | The blur radius. |
| `$sigma` | **float** | The blur sigma. |
| `$channel` | **int** | The channel(s) to apply the blur to. |


**Return Value:**

The path of the blurred image.



**Throws:**
<p>If an error occurs while blurring the image.</p>

- [`ImagickException`](./ImagickException.md)



***

### textToImage

Add text to an image.

```php
public textToImage(string $text, string $imagePath, string $fontPath, int $fontSize, int $x, int $y, string $color = &#039;black&#039;): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$text` | **string** | The text to add to the image. |
| `$imagePath` | **string** | The path to the image file. |
| `$fontPath` | **string** | The path to the font file. |
| `$fontSize` | **int** | The font size. |
| `$x` | **int** | The x-coordinate of the text position. |
| `$y` | **int** | The y-coordinate of the text position. |
| `$color` | **string** | The color of the text. |




**Throws:**
<p>If an error occurs while adding the text to the image.</p>

- [`ImagickException`](./ImagickException.md)



***


## Inherited methods


### __construct



```php
public __construct(): mixed
```












***


***
> Automatically generated on 2024-03-06
