<div class="story index">
    <h1>Edit User</h1>
    
    <?php echo $this->Form->create('User');?>
    <?php
    	echo $this->Form->input('username');
    	echo $this->Form->input('password');        
    	echo $this->Form->input('online');
        echo $this->Form->input('email');
        echo $this->Form->input('active');
        echo $this->Form->input('is_banned');
        echo $this->Form->input('group_id');
    ?>

    <?php echo $this->Form->end('Submit', true);?>
</div>

<div>
    <?php echo $this->element('admin_menu'); ?>
</div>