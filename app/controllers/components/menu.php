<?php 
class MenuComponent extends Object {
	var $components = array('Session');
 
	function startup() {
 
		$userMenu = array();
		$generalMenu = array();
        
        
		//Vorbereitung für Untermenues
		$stories = array();
		$parent1[__('Story Overview', true)] = '/stories/storyoverview';
        $parent1[__('Sold to the Arabs', true)] = '/chapters/storychapter/1/1#tab_1';
        $parent1[__('Barbarian Invasion', true)] = '/chapters/storychapter/2/3#tab_1';        
        
        $gallery = array();
        $parent2[__('Deviant Gallery', true)] = '/images/gallery';
        $parent2[__('Sexy Photos', true)] = '/pages/sexy';
 
        // Definition des Menus
		
        if($this->Session->read('Auth.User.username') == 'admin')
        {
            $generalMenu[__('Home', true)] = '/updates/dashboard';
            $generalMenu[__('Stories', true)] = $parent1;            
            $generalMenu[__('Gallery', true)] = $parent2;
            $generalMenu[__('Ramblings', true)] = '/ramblings/ramblingoverview';
            $generalMenu[__('Favs', true)] = '/pages/favs';
            $generalMenu[__('Contact', true)] = '/contacts/add';
            $generalMenu[__('About', true)] = '/pages/about';
            $generalMenu[__('Admin', true)] = '/stories/adminstoryoverview';
        }
        else
        {
            $generalMenu[__('Home', true)] = '/updates/dashboard';
            $generalMenu[__('Stories', true)] = $parent1;            
            $generalMenu[__('Gallery', true)] = $parent2;
            $generalMenu[__('Ramblings', true)] = '/ramblings/ramblingoverview';
            $generalMenu[__('Favs', true)] = '/pages/favs';
            $generalMenu[__('Contact', true)] = '/contacts/add';
            $generalMenu[__('About', true)] = '/pages/about';          
        }
            
		if(!$this->Session->check('Auth.User')) 
        {
   			$userMenu[__('Sign up', true)] = '/users/register';
			$userMenu[__('Login', true)] = '/users/login';               
		}
		else {
			$userMenu[__('Logout', true)] = '/users/logout';			
		}		
 
		//$user = $this->Session->read('Auth.User');
 
		//menus arra
		$menus = array();
		$menus[__('General', true)] = $generalMenu;
		$menus[__('User', true)] = $userMenu;
 
		$this->Session->write('Menu.main', $menus);
	}
}
?>