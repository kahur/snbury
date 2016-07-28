<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Sainsbury;

use Sainsbury\View\Output\OutputInterface,
    Sainsbury\View\ViewInterface;

/**
 * Description of View
 *
 * @author Kamil Hurajt
 */
class View implements ViewInterface
{
    protected $output;
    
    public function __construct(OutputInterface $output) 
    {
        $this->output = $output;
    }
    
    public function render()
    {
        return $this->output->getOutput();
    }

    public function getOutput() 
    {
        return $this->output;
    }
    
    public function setContent($content)
    {
        $this->output->setContent($content);
    }

}
