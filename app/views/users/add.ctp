<?php $this->set("title_for_layout","Deviant-Stories - Contact Form"); ?>
<?php $html->addCrumb('Signup', '/users/add'); ?>
<?php echo $html->css('contact'); ?>


<br />
<h2>Signup Form</h2>
<br />
<h6>Sign up, it's free!</h6>
<br />

<?php echo $this->Session->flash(); ?>

<div class="contactbox">

<?php

    echo $form->create('User');
	    
    echo $this->Form->input('username', array(
        'label' => 'Name',
        'size'  => 60,
        'error' => array(
        'notEmpty' => __d('contact', 'Please specify your name', true))));
?>

<br />

<?php    
    echo $this->Form->input('password', array(
        'label' => 'Password',
        'size'  => 60,
        'error' => array(
        'notEmpty' => __d('contact', 'Please specify your name', true))));
?>

<br />

<?php    
    echo $this->Form->input('confirm_password', array(
        'label' => 'Confirm Password',
        'type'  => 'password',
        'size'  => 60,
        'error' => array(
        'notEmpty' => __d('contact', 'Please specify your name', true))));
?>

<br />

<?php    
    echo $this->Form->input('email', array(
        'label' => 'Email',
        'size'  => 40,
        'error' => array(
        'email' => __d('contact', 'Please specify your email', true))));
?>
  
<br />
        
<label class="submitLabel"
	for="submitContactForm">Sign me up!
</label>

<input type="submit"
	class="inputButton"
	name="submitContactForm"
	id="submitContactForm"
	value="Sign me up!" />          
          
</div>
)) ?>