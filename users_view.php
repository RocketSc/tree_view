<?php
    function draw_tree(array $tree) {
        foreach ($tree as $node) {
            if ( array_key_exists('children', $node) ) {
                echo '<li>' . $node['name'];
                echo '<ol>';
                draw_tree($node['children']);
                echo '</ol></li>';
            } else {
                echo '<li>' . $node['name'] . '</li>';
            }
        }
    }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Tree</title>
</head>
<body>
    <h1>Users Tree</h1>
    <ol>
    <?php
        draw_tree($tree);
    ?>
    </ol>
</body>
</html>