<?php
App::import('Sanitize');

class RamblingsController extends AppController {
    
	var $name = 'Ramblings';
    var $paginate = array(  'limit' => 10,                        
                        'order' => 'Rambling.id DESC');                       


	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                                     	                           
            $this->layout = 'admin';
            $this->Rambling->recursive = 0;
    		$this->set('ramblings', $this->paginate());
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                      
	}


    function view($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {                                     	                           
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
            $this->set('ramblings', $this->Rambling->read(null, $id));
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                                      
	}


    function ramblingOverview($id = null)
    {    
        //$this->set('tags', $this->Rambling->Tagged->find('cloud', array('limit' => 10)));
        $ramblingLists = $this->paginate('Rambling');
        //$ramblingLists = $this->Rambling->ramblingListsOverview();                
        $this->set(compact('ramblingLists'));
    }

	function comment($id = null) {
		if (!$id) {
			$this->_flash(__('Invalid Post.', true),'error');
			$this->redirect(array('action'=>'ramblingoverview'));
		}

		// save the comment
		if (!empty($this->data['Comment'])) {
			$this->data['Comment']['class'] = 'Rambling'; 
            
			$this->data['Comment']['foreign_id'] = $id;
            $this->data['Comment']['name'] = $this->Session->read('Auth.User.username');
            $this->data['Comment']['email'] = $this->Session->read('Auth.User.email');
            
            $cc = $this->data['Comment']['class'];
            $fi = $this->data['Comment']['foreign_id'];            
             
			$this->Rambling->Comment->create();
             
			if ($this->Rambling->Comment->save(Sanitize::paranoid($this->data, array(
                       ' ', '@', '.', ',', ';', '?', '!', ':', '-', '_', '"', "'")), false)) 
            {
				$this->Session->setFlash(__('The Comment has been saved.', true),'success');
				$this->redirect(array('action'=>'comment',$id));
			}
			$this->Session->setFlash(__('The Comment could not be saved. Please, try again.', true),'warning');
		}

		// set the view variables
		$comments = $this->Rambling->read(null, $id); // contains $post['Comments']
		$this->set(compact('comments', 'cc', 'fi'));
	}
    
	
    function add() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Rambling->create();
    			if ($this->Rambling->save($this->data)) 
                {
    				$this->flashSuccess('This rambling has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This rambling could not be saved. Please, try again.');
    			}
    		}
        }
        else
        {       
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
	}


	function edit($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
    		
            if (!empty($this->data)) 
            {
    			if ($this->Rambling->save($this->data)) 
                {
    				$this->flashSuccess('This rambling has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This rambling could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Rambling->read(null, $id);
    		}
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
	}

	
    function delete($id = null) 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {        
    		$this->layout = 'admin';
            $this->idEmpty($id, 'index');
    		
            if ($this->Rambling->delete($id)) 
            {
    			$this->flashSuccess('Rambling deleted', 'index');
    		}
    		
            $this->flashWarning('Rambling was not deleted', 'index');
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                        
	}

}
?>