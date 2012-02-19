<div class="story index">
    <h1>Edit Chapter-Block</h1>

    <?php echo $this->Form->create('Chapter');?>
        <?php echo $this->element('form_chapters'); ?>
    <?php echo $this->Form->end('Submit', true);?>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>