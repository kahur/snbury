<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Sainsbury\View\Output\Adapter\JSON;
use Sainsbury\View;
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
        
        $json = new JSON();
        
        $view = new View($json);
        $view->setContent($data);
        
        $this->assertEquals(json_encode($data), $view->render());
                
                
        
    }
}
