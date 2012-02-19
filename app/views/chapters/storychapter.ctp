<?php $html->addCrumb('Story Overview', '/stories/storyoverview'); ?>
<?php $html->addCrumb('Read Story', null); ?>

<?php $this->set("title_for_layout","Stories | deviant-stories.com"); ?>



<?php $i = 1 ?>
<?php foreach ($chapterContent as $chapter):

    if($i==1)
    { ?>
        <br />
        <span class="caption2"><?php echo $chapter['Story']['name'] //. ' : ' ;?></span>
        <span class="caption"><?php //echo $chapter['Title']['name'] ;?></span>

    <?php
    }
    $i++;
endforeach; ?>

<br /><br /><br />


<?php
switch($chapter['Story']['id'])
{
    case '1': echo $this->element('chapter01');
                break;

    case '2': echo $this->element('chapter02');
                break;
}
?>

<div class="span-16 last">
    <?php echo $this->element('chapterinfo') ?>
</div>