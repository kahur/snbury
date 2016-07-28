<?php
namespace Tests\View;

use PHPUnit\Framework\TestCase;
use Sainsbury\View\Output\Adapter\JSON\WrongContentFormatException;

/**
 * Description of OutputTest
 *
 * @author Kamil Hurajt
 */
class OutputTest extends TestCase 
{
    
    public function testGetOutput()
    {
        $data = array(1,2,3);
        
        $json = new \Sainsbury\View\Output\Adapter\JSON();
        $json->setContent($data);
        
        $this->assertEquals(json_encode(array(1,2,3)), $json->getOutput());
    }
    
    public function testWrongContent()
    {
        $this->expectException(WrongContentFormatException::class);
        
        $data = 'test';
        
        $json = new \Sainsbury\View\Output\Adapter\JSON();
        $json->setContent($data);        
    }
}
