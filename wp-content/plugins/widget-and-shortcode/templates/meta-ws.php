<?php

$meta = get_post_meta(get_the_ID());

$category = get_the_category(get_the_ID());

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
