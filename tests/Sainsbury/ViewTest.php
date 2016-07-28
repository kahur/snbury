<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

/**
 * Description of ViewTest
 *
 * @author Kamil Hurajt
 */
class ViewTest extends TestCase
{
    public function testRender()
    {
        $data = array(1,2,3);
        
        $json = $this->getMockBuilder('\Sainsbury\View\Output\OutputInterface')
                ->getMockForAbstractClass();
        
        $json
                ->expects($this->exactly(2))
                ->method('getOutput')
                ->will($this->returnValue(json_encode($data)));
        
        $view = $this->getMockBuilder('\Sainsbury\View\ViewInterface')
                ->getMockForAbstractClass();
        
        $view
                ->expects($this->exactly(1))
                ->method('render')
                ->will($this->returnValue($json->getOutput()));
        
        $this->assertEquals($json->getOutput(), $view->render());
                
                
        
    }
}
