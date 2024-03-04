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
        // header('Content-type: image/jpeg');

        try {
            $image = new Imagick($imagePath);
            $image->blurImage($radius, $sigma, $channel);
            $image->writeImage($imagePath);
            $image->clear();
            $image->destroy();
            return $image;
        } catch (ImagickException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
?>