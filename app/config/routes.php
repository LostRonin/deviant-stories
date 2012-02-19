<?php
/**
 * Routes Configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
 
$staticPages = array(
        'about',
        'favs',
        'soon'
);
 
$staticList = implode('|', $staticPages);
 
Router::connect('/:static', array(
        'plugin' => false,
        'controller' => 'pages',
        'action' => 'display'), array(
                'static' => $staticList,
                'pass' => array('static')
                )
        );
 

Router::connect('/', array('controller' => 'updates', 'action' => 'dashboard'));
Router::connect('/admin', array('controller' => 'stories', 'action' => 'adminstoryoverview'));
Router::connect('/stories', array('controller' => 'stories', 'action' => 'storyoverview'));
Router::connect('/story', array('controller' => 'stories', 'action' => 'storyoverview'));
Router::connect('/ramblings', array('controller' => 'ramblings', 'action' => 'ramblingoverview'));
Router::connect('/rambling', array('controller' => 'ramblings', 'action' => 'ramblingoverview'));
Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
Router::connect('/register', array('controller' => 'users', 'action' => 'register'));  
Router::connect('/signup', array('controller' => 'users', 'action' => 'register'));
Router::connect('/signin', array('controller' => 'users', 'action' => 'register'));
Router::connect('/contact', array('controller' => 'contacts', 'action' => 'add'));
Router::connect('/contact/submit', array('controller' => 'contacts', 'action' => 'submit'));
Router::connect('/photo', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/photos', array('controller' => 'pages', 'action' => 'display'));
Router::connect('/sexy', array('controller' => 'pages', 'action' => 'display'));    

//Router::connect('/admin/:controller/:action/*', array( 
//    'action' => null, 'prefix' => 'admin', 'admin' => true 
//));
    

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
 