<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';

	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	var $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'username_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Updates' => array(
			'className' => 'Updates',
			'foreignKey' => 'username_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Story' => array(
			'className' => 'Story',
			'foreignKey' => 'username_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	        'Rambling' => array(
			'className' => 'Rambling',
			'foreignKey' => 'username_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);


    
    var $validate = array(
    'username'  => array(
        'alphaNumeric'  =>  array(
            'rule'          => 'alphanumeric',
            'allowEmpty'    => false,
            'message'       => 'Alphabets and numbers only.'
            ),
        'between'  =>  array(
            'rule'          => array('between', 5, 20),
            'allowEmpty'    => false,
            'message'       => 'Username must be between 5 to 20 characters.'
            ),
        'isUnique'  =>  array(
            'rule'          => 'isUnique',
            'allowEmpty'    => false,
            'message'       => 'Username is already taken.'
            )            
    ),
    
    'passwrd'  => array(
        'between'  =>  array(
            'rule'          => array('between', 5, 20),
            'allowEmpty'    => false,
            'message'       => 'Password must be between 5 to 20 characters.'
            )
    ),
             
    'email'  => array(
        'email'  =>  array(
            'rule'          => 'email',
            'allowEmpty'    => false,
            'message'       => 'Must be a valid email address.'
            ),
        'isUnique'  =>  array(
            'rule'          => 'isUnique',
            'allowEmpty'    => false,
            'message'       => 'E-mail is already taken.'
            )
    ),
    
    'agree' => array(
           'rule' => array('comparison', '!=', 0),
           'required' => true,
           'message' => 'You must agree to the terms of use',
           'on' => 'create'
           )                      
);     


    function getActivationHash()
    {
        if (!isset($this->id)) 
            {
                return false;
            }
            return substr(Security::hash(Configure::read('Security.salt') . $this->field('created') . date('Ymd')), 0, 8);
    }    
}
?>