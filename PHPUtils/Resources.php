<?php


# ──────────────────────────────────────────────────────────────────────────────────────────────── #
#                                             RESOURCES                                            #
# ──────────────────────────────────────────────────────────────────────────────────────────────── #
class Resources extends Base {

    function Bootstrap(string $version = '5.3.2') {
        echo '
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@'.$version.'/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5'.$version.'/dist/js/bootstrap.bundle.min.js"></script>
        ';
    }

    function jQuery(string $version = '3.7.1') {
        echo '
        <script src="https://code.jquery.com/jquery-'.$version.'.min.js"></script>
        ';
    }
}


?>