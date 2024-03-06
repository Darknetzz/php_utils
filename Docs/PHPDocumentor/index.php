<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/2.1.0/showdown.min.js"></script>

<div id="content">
<?php
$md = file_get_contents("Home.md");
?>
</div>

<script>
    var converter = new showdown.Converter();
    var text = `<?php echo $md; ?>`;
    var html = converter.makeHtml(text);
    document.getElementById('content').innerHTML = html;
</script> -->