<?php
// Deny Direct Access
defined('APP_PATH') || http_response_code(403).die('403 Direct Access Denied!');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= apply_filter('template.asset', 'css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1><?= $welcome ?></h1>
        <p>Your lightweight MVC PHP framework for fast and clean development.</p>
        <a class="docs-link" href="<?= $app_info['url.doc'] ?>">Read the Docs</a>
        <div class="version">Framework version: <?= $app_info['version'] ?></div>
    </div>
</body>
</html>
