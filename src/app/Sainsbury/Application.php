<?php

namespace Sainsbury;

use Sainsbury\Application\ViewNotFoundException,
    Sainsbury\View\ViewInterface;

/**
 * Description of Application
 *
 * @author Kamil Hurajt
 */
class Application 
{
    /**
     * @var ViewInterface
     */
    private $view;
    
    public function setView(ViewInterface $view)
    {
        $this->view = $view;
    }
    //put your code here
    public function run()
    {
        if(!$this->view){
            throw new ViewNotFoundException('No view library loaded');
        }
        
        $controller = new \Controller\MainController();
        $controller->setView($this->view);
        $controller->mainAction();
        
        return $this->view->render();
    }
}
