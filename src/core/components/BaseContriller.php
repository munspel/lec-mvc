<?php
namespace lisnyak\mvc\core\components;

class BaseContriller {
    
    public $title = "Default title";
    /**
     * BaseView Instance
     * @var lisnyak\mvc\core\components\BaseView  
     */
    protected $view;
    
    /**
     * 
     * @return lisnyak\mvc\core\components\BaseView  
     */
    public function getView(){
        if (empty($this->view)){
            $this->view = new View($this);
        }
        return $this->view;        
    }
    
    
    
    
}
