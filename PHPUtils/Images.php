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
    function blur(string $imagePath, float $radius = 10, float $sigma = 25, int $channel = imagick::CHANNEL_ALL) {
        // header('Content-type: image/jpeg');

        try {

            // Create a temporary file
            $tmpDir          = dirname($imagePath);
            $tmpFile         = "blurred_".basename($imagePath);
            $tmpFullPath     = $tmpDir."/".$tmpFile;
            $tmpRelativePath = basename($tmpDir)."/".$tmpFile;

            if (is_file($tmpFullPath)) {
                return $tmpRelativePath;
            }

            $image = new Imagick($imagePath);
            $image->blurImage($radius, $sigma, $channel);
            $image->writeImage($tmpFullPath);

            // Schedule the file deletion when the script execution is finished
            register_shutdown_function(function() use ($tmpFullPath, $image) {
                $image->clear();
                $image->destroy();
                unlink($tmpFullPath);
            });

            return $tmpRelativePath; // return the path of the temporary file
        } catch (ImagickException $e) {
            die("Error: " . $e->getMessage());
        }
    }

    /* ────────────────────────────────────────────────────────────────────────── */
    /*                                 textToImage                                */
    /* ────────────────────────────────────────────────────────────────────────── */
    function textToImage(string $text, string $imagePath, string $fontPath, int $fontSize, int $x, int $y, string $color = 'black') {
        $draw = new ImagickDraw();
        $draw->setFont($fontPath);
        $draw->setFontSize($fontSize);
        $draw->setFillColor($color);
        $draw->setGravity(Imagick::GRAVITY_NORTHWEST);
        $draw->annotation($x, $y, $text);

        $image = new Imagick($imagePath);
        $image->drawImage($draw);
        $image->writeImage($imagePath);
        $image->clear();
        $image->destroy();
    }
}
?>