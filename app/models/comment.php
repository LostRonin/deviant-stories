<?php
class Comment extends AppModel {
	var $name = 'Comment';

    var $validate = array(
        'body' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'allowEmpty' => false,
            'body' => 'notEmpty'));


    
    #returns comments
    function getComment($cc, $fi)
    {
        return $this->find('all', array('conditions' => array(
                                            'Comment.class'   => $cc,
                                            'Comment.foreign_id'   => $fi),                                             
                                            'order' => 'Comment.id DESC'));     // newest first                                            
    }    
}
?>