<?php
    echo $this->TagCloud->display($tags, array(
        'before' => '<span class="fs%size% tag">',
        'after' => '</span>',
        'maxSize' => 50, 
        'minSize' => 1));
?>
