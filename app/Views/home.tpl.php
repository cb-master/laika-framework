<?php
// Deny Direct Access
defined('BASE_PATH') || http_response_code(403).die('403 Direct Access Denied!');
?>
<!doctype html>
<html>
    <head>
        <title><?= strtoupper($title) ?></title>
    </head>
    <body>
        <main>
            <h2><?= $title ?></h2>
            <p>Page Loaded Without Template Engine.</p>
        </main>
    </body>
</html>