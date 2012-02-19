<div class="news_box">
	<h6><?php echo $time->formattedDate($update['Update']['created']); ?></h6>

	<p><?php echo $update['Update']['content']; ?></p>

    <div style="margin-bottom: 15px;">
        <?php
        if (!empty($update['Update']['link']))
        {
            echo $html->image('links.png');
            echo '&nbsp;'; echo '&nbsp;';
            echo $html->link($update['Update']['linkDescription'], array('controller' => 'chapters', 'action' => $update['Update']['link']));
        } ?>
    </div>
</div>