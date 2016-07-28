<?php
namespace Tests\Sainsbury\Product\Html;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;
use Sainsbury\Product\Html\Parser;

/**
 * Description of HtmlParserTest
 *
 * @author Kamil Hurajt
 */
class ParserTest extends TestCase
{
    protected $parser;
    
    public function setUp() 
    {
        $html = file_get_contents(dirname(__FILE__).'/example.html');
        $crawler = new Crawler($html);
        
        $this->parser = new Parser($crawler);
    }
    
    public function testProductList()
    {
        $products = $this->parser->getProductList();
        
        $count = count($products);
        
        $this->assertEquals(7, $count);        
    }
    
    public function testName()
    {
        $products = $this->parser->getProductList();
        
        $name = null;
        foreach($products as $product)
        {
            $html = $product->ownerDocument->saveHTML($product);;
            $crawler = new Crawler($html);
            $name = $this->parser->getProductName($crawler);
            break;
        }
        
        $this->assertTrue(is_string($name));
    }
    
    public function testPrice()
    {
        $products = $this->parser->getProductList();
        
        $price = null;
        foreach($products as $product)
        {
            $html = $product->ownerDocument->saveHTML($product);
            $crawler = new Crawler($html);
            $price = $this->parser->getUnitPrice($crawler);
            break;
        }
        
        $this->assertTrue(is_numeric($price));
    }
    
    public function testUrl()
    {
        $products = $this->parser->getProductList();
        
        $url = null;
        foreach($products as $product)
        {
            $html = $product->ownerDocument->saveHTML($product);;
            $crawler = new Crawler($html);
            $url = $this->parser->getDetailUrl($crawler);
            break;
        }
        
        $isUrl = filter_var($url, FILTER_VALIDATE_URL);
        
        $this->assertTrue(is_string($isUrl));
    }
    
    public function testSize()
    {
        $products = $this->parser->getProductList();
        
        $size = null;
        foreach($products as $product)
        {
            $html = $product->ownerDocument->saveHTML($product);;
            $crawler = new Crawler($html);
            $url = $this->parser->getDetailUrl($crawler);
            
            $size = $this->parser->getPageSize($url);
            break;
        }
        
        $isMatch = (preg_match('/([0-9]+([.?]+[0-9]+)?)( )?(Kb|M|G|T)/', $size)) ? true : false;
        $this->assertTrue($isMatch);
    }
    
}
