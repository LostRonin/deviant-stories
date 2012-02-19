<?php
	echo $this->Form->input('story_id');
	echo $this->Form->input('title_id');
	echo $this->Form->input('block');
	echo $this->Form->input('content');
	echo $this->Form->input('image_id');
	echo $this->Form->input('status_id');
    echo $this->Form->input('image_class');
    echo $this->Form->input('description');
    echo $this->Form->input('tags', array('type' => 'text'));
?>