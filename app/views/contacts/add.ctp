<?php $html->addCrumb('Contact', '/contacts/add'); ?>
<?php $this->set("title_for_layout","Contact | deviant-stories.com"); ?>

<h2 style="text-align: center; margin-top: 40px;">Contact Form</h2>
<h6 style="text-align: center;">Please use the contact form to leave your message:</h6>
<div style="text-align: center; margin-top: 30px;"></div>

<?php echo $this->Session->flash(); ?>

<div class="contactbox">

    <div style="margin-top: 20px;">
        <?php

            echo $form->create('Contact');

            echo $form->input('name', array(
                'label' => 'Name',
                'size'  => 65,
                'error' => array(
                'notEmpty' => __d('contact', 'Please enter your name', true))));
        ?>
    </div>

    <div style="margin-top: 20px;">
        <?php
            echo $form->input('email', array(
                'label' => 'Email',
                'size'  => 65,
                'error' => array(
                'email' => __d('contact', 'Please enter your email', true))));
        ?>
    </div>

    <div style="margin-top: 20px;">
        <?php
            echo $form->input('message', array(
                'label' => 'Message&nbsp;',
                'cols'  => 67,
                'rows'  => 12,
                'error' => array(
                'notEmpty' => __d('contact', 'Please enter a message', true))));
        ?>
    </div>

    <div style="margin-top: 40px;"><?php echo $form->input('security_code', array('label' => 'Enter the Sum of:' . '&nbsp;&nbsp;' . $mathCaptcha . '&nbsp;=&nbsp;&nbsp;')); ?></div>

    <div style="margin-top: 40px; text-align: center;">
    	<input type="submit"
    		class="inputButton"
    		name="submitContactForm"
    		id="submitContactForm"
    		value="Send message" />
    </div>
</div>
