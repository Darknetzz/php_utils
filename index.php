<!DOCTYPE html>
<html data-bs-theme="dark">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
require_once("PHPUtils/_All.php");
// $gui = new Resources;
// $gui->Bootstrap();
?>

<link rel="stylesheet" href="/_assets/css/bootstrap.min.css">
<link rel="stylesheet" href="/_assets/css/bootstrap-table.min.css">
<script src="/_assets/js/jquery.min.js"></script>
<script src="/_assets/js/bootstrap.min.js"></script>
<script src="/_assets/js/marked.min.js"></script>

<div class="container m-3 p-3">

    <div class='card border border-primary'>
    <h1 class='card-header text-bg-primary'>Classes</h1>
        <div class='card-body'>
            <a href="Docs">Docs</a>
            <table class='table table-hover'>
                <thead class='table-dark'>
                    <tr><th>Class</th><th>Documentation</th><th>Test</th></tr>
                </thead>
            <tbody>
            <?php
                $classFolder = "PHPUtils";
                $docsFolder  = "Docs/PHPDocumentor/classes";
                $testFolder  = "test";
                $classes = glob($classFolder."/*.php");
                foreach($classes as $class){
                    $classPath  = explode("/",$class);
                    $className  = end($classPath);
                    $classTitle = str_replace(".php","",$className);

                    $thisDoc  = $docsFolder."/$classTitle.md";
                    $thisTest = $testFolder."/$classTitle.php";

                    $btnClass = (file_exists($thisDoc) ? "btn btn-sm btn-outline-success" : "btn btn-sm btn-outline-danger");
                    $docLink  = "<a href='$thisDoc' class='$btnClass' target='_blank'>$thisDoc</a>";

                    $btnClass = (file_exists($thisTest) ? "btn btn-sm btn-outline-success" : "btn btn-sm btn-outline-danger");
                    $testLink = "<a href='$thisTest' class='$btnClass' target='_blank'>$thisTest</a>";
            
                    echo "
                    <tr>
                        <td><a href='$class'>$classTitle</a></td>
                        <td>$docLink</td>
                        <td>$testLink</td>
                    </tr>";
                }
            ?>
            </tbody>
            </table>
        </div>
    </div>

</div>

</html>