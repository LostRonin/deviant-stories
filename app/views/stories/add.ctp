<div class="story index">

<h1>New Story</h1>
    <?php echo $this->Form->create('Story');?>
        <?php echo $this->element('form_stories'); ?>
    <?php echo $this->Form->end('Submit', true);?>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>