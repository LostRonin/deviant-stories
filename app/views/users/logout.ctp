<?php $html->addCrumb('Logout', '/users/logout'); ?>
<?php echo $html->css('contact'); ?>

<br />
<h2>Login</h2>
<br />
<h6>Login, to get access to deviant stories...</h6>
<br />

<div class="contactbox">
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' =>'login'))); ?>
    <?php echo $this->Form->input('User.username'); ?>
    <?php echo $this->Form->input('User.password'); ?>
    <br />
    
    <?php echo $this->Form->end('Login'); ?>
    
    <br /><br />

<?php echo $this->Session->flash(); ?>

</div>