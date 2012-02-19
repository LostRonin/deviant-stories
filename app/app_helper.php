<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::import('Helper', 'Helper', false);

/**
 * This is a placeholder class.
 * Create the same file in app/app_helper.php
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake
 */
class AppHelper extends Helper 
{
    var $helpers = array('Session');
    
    #returns formatted date (eg. 30th May 2011)
    function formattedDate($time)
    {
        return $this->format('M, jS Y', $time);
    }
    
    # checks if logged in
    function loggedIn()
    {
		return $this->Session->check('Auth.User');
	}


	# return user info
	function user($key) 
    {
		$user = $this->Session->read('Auth.User');
			if (isset($user[$key])) {
				return $user[$key];
			}
		return false;
	}

    # checks to see if user can edit file
	function canEdit($model, $id)
	{
    $record = $this->{$model}->find(array("$model.id" => $id));
		if ($record[$model]['user_id'] != $this->Auth->user('id')) 
		{
		  $this->flashWarning('Your not allowed to do that!', '/dashboard');
		}
	}    
    
}
