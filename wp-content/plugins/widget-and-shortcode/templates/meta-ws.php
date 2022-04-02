<?php

$category = get_the_category();
// var_dump($category);
?>

<ul>

    <?php
$html = '';
foreach ($category as $cat) {
    $cat_names = $cat->name;
    $html = "<li>$cat_names</li>";
    echo $html;
}

?>
</ul>
