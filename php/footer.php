<?php
// Determine if the current file is in the "internal-pages" directory
$isInternal = strpos($_SERVER['SCRIPT_NAME'], '/internal-pages/') !== false;

// Set base paths depending on the current directory
$baseInternalPath = $isInternal ? '' : 'internal-pages/';
$baseRootPath = $isInternal ? '../' : '';
?>
        <footer>
            <div id="bottom" class="container container-footer">
                <a class="to-top" href="#top"><strong>^</strong>  Back to top  <strong>^</strong></a>
            </div>
        </footer>
        <script src="<?= $baseRootPath ?>javascript/jquery-3.7.1.min.js"></script>
        <script src="<?= $baseRootPath ?>javascript/script.js"></script>
    </body>
</html>