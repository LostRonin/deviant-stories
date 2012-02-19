<?php


class UpdatesController extends AppController {

	var $name = 'Updates';
                
    function beforeFilter()
    {
        parent::beforeFilter();       
        $this->Auth->allow('dashboard');
        
        if($this->only(array('add', 'edit')))
        {
            $this->__lists();
        }
    }


    function dashboard()
    {
        $threeRecords = $this->Update->threeRecords();
                      
        $this->set('tags', $this->Update->Tagged->find('cloud', array('limit' => 20)));
        $this->set(compact('threeRecords', 'username'));        
        $this->render(null, 'default_3_cols');        
    }
    

	function index() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {        
            $this->layout = 'admin';
            $this->set('updates', $this->paginate());
        }
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }            
	}
    

	function view($id = null) 
    {
		$this->layout = 'admin';
        $this->idEmpty($id, 'index');
        $this->set('update', $this->Update->read(null, $id));
    }


	function add() 
    {
        if($this->Auth->user('id') == 1) // identifies if admin logs in
        {        
    		$this->layout = 'admin';
            if (!empty($this->data)) 
            {
    			$this->Update->create();
    			if ($this->Update->save($this->data)) 
                {
    				$this->flashSuccess('This update has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This update could not be saved. Please, try again.');
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
    			if ($this->Update->save($this->data)) 
                {
    				$this->flashSuccess('This update has been saved', 'index');
    			} 
                else 
                {
    				$this->flashWarning('This update could not be saved. Please, try again.');
    			}
    		}
    		
            if (empty($this->data)) 
            {
    			$this->data = $this->Update->read(null, $id);
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
    		
            if ($this->Update->delete($id)) 
            {
    			$this->flashSuccess('Update deleted', 'index');
    		}		
            $this->flashWarning('Update was not deleted', 'index');
        }   
        else
        {
            $this->flashWarningGrowl('You are not authorized to access this page!', 'users', 'login');
        }                          
	}
    
    
    
    ##################
    # Private Methods
    ##################
    
    function __lists()
    {
		$users = $this->Update->User->find('list');
		$statuses = $this->Update->Status->find('list');
		$this->set(compact('users', 'statuses'));
    }    
      
}
?>