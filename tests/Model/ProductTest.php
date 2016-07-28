<?php
namespace Tests\Model;

use PHPUnit\Framework\TestCase;
/**
 * Description of ProductTest
 *
 * @author Kamil Hurajt
 */
class ProductTest extends TestCase 
{
    
   protected $product;
   
   public function setUp() {
       $name = 'test';
       $price = 10.5;
       $size = '80kb';
       
       $product = $this->getMockBuilder('\Sainsbury\Product\ProductInterface')
               ->getMockForAbstractClass();
       
       $product->expects($this->any())
               ->method('getName')
               ->will($this->returnValue($name));
       
       $product->expects($this->any())
               ->method('getUnitPrice')
               ->will($this->returnValue($price));
       
       $product->expects($this->any())
               ->method('getSize')
               ->will($this->returnValue($size));
       
       $this->product = $product;
   }
   public function testGetName()
   {       
       $this->assertTrue(is_string($this->product->getName()));
   }
   
   public function testGetUnitPrice()
   {
       $this->assertTrue(is_numeric($this->product->getUnitPrice()));       
   }
   
   public function testGetSize()
   {
       $this->assertRegExp('/([0-9]+)kb/i', $this->product->getSize());
   }
}
