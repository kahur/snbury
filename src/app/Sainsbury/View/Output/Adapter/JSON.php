<?php

namespace Sainsbury\View\Output\Adapter;

use Sainsbury\View\Output\Adapter\JSON\NoContentException,
    Sainsbury\View\Output\Adapter\JSON\WrongContentFormatException,
    Sainsbury\View\Output\OutputInterface;

/**
 * Description of JSON
 *
 * @author Kamil Hurajt
 */
class JSON implements OutputInterface
{
    protected $content;
    
    public function setContent($content) 
    {
        if(!is_array($content)){
            throw new WrongContentFormatException('Wrong content format, expected array');
        }
        
        $this->content = $content;
    }
    
    public function getOutput() 
    {
        if(!$this->content){
            throw new NoContentException('Missing content');
        }
        
        return json_encode($this->content);
    }

    
}
