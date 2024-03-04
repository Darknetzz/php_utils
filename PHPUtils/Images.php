<?php

/* ────────────────────────────────────────────────────────────────────────── */
/*                                   IMAGES                                   */
/* ────────────────────────────────────────────────────────────────────────── */
class Images extends Base {
    // Class implementation goes here
    public function __construct() {
        // Initialization code goes here
        if (!extension_loaded('imagick')) {
            die("Imagick extension is not enabled. To use the class `Images` you must have Imagick extension enabled.");
        }
    }

    /* ────────────────────────────────────────────────────────────────────────── */
    /*                                 Blur image                                 */
    /* ────────────────────────────────────────────────────────────────────────── */
    function blur(string $imagePath, float $radius = 5, float $sigma = 3, int $channel = 0) {
        header('Content-type: image/jpeg');

        if (!is_file($imagePath)) {
            die("Invalid image file: $imagePath");
        }
        
        $image = new Imagick($imagePath);
        
        if (!$image->pingImage($imagePath)) {
            die("Invalid image file: $imagePath");
        }
        
        $image->blurImage(5,3);
        echo $image;
    }
}
?>