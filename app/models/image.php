<?php
class Image extends AppModel {
	var $name = 'Image';
	var $displayField = 'name';
    
	//The Associations below have been created with all possible keys, those that are not needed can be removed

    var $hasMany = array('Rating' =>  
                     array( 'className'   => 'Rating', 
                            'foreignKey'  => 'model_id', 
                            'conditions' => array('Rating.model' => 'Image'), 
                            'dependent'   => true, 
                            'exclusive'   => true 
                          ), 
		
                        'Comment' => 
                    array(  'className' => 'Comment',
                			'foreignKey' => 'foreign_id',
                			'conditions' => array('Comment.class'=>'Image'),
	                     )
	                   );


	var $hasOne = array(
		'Chapter' => array(
			'className' => 'Chapter',
			'foreignKey' => 'image_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $belongsTo = array(
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'username_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


    #returns all published images
    function imageLists()
    {
        return $this->find('all', array('conditions' => array(
                                            'Image.status_id' => 2),        // look for 'published' images 
                                            'order' => 'Image.id ASC'));    // oldest first
    }

    function stats()
    {
        $stats = array();
        $stats['total'] = $this->find('count', array('conditions' => array(
                                            'Image.status_id' => 2)       // look for 'published' images 
                                            ));
        return $stats;
    }    

    #returns a specific chapter of a Story
    function getImage($image_id)
    {
        return $this->find('all', array('conditions' => array(
                                            'Image.id'   => $image_id)
                                            ));     // oldest first                                            
    }

    #returns last ID of a published image
    function lastId()
    {
            return $this->find('first', array('conditions' => array(
                                        'Image.status_id' => 2),        // look for 'published' images 
                                        'order' => 'Image.id DESC'));  
    }

}
?>