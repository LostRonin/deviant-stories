<?php
	echo $this->Form->input('username');
	echo $this->Form->input('password');
    echo $this->Form->input('confirm_password', array('type' => 'password'));
	echo $this->Form->input('email', array('size' => 40));
?>