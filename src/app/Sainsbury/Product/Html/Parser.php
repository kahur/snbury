<?php
namespace Sainsbury\Product\Html;

use Symfony\Component\DomCrawler\Crawler,
    Model\Product;
/**
 * Description of Parser
 *
 * @author Kamil Hurajt
 */
class Parser 
{
    /**
     * @var Crawler
     */
    protected $crawler;
    
    protected $items;
    
    /**
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
        $this->loadItems();
    }    
    
    
    /**
     * @param Crawler $product
     * @return Crawler
     */
    public function getDetailUrl(Crawler $product)
    {
        return $product->filter('.productInfo a')->attr('href');
    }
    
    /**
     * @param Crawler $product
     * @return String
     */
    public function getUnitPrice(Crawler $product)
    {
        $price = $product->filter('.pricing p.pricePerUnit')->text();
        if(!preg_match("/([0-9\.]+)/i", $price, $matches)){
            return null;
        }
        
        $price = $matches[0];
        
        return $price;
    }
    
    /**
     * @param Crawler $product
     * @return String
     */
    public function getProductName(Crawler $product)
    {
        return $product->filter('.productInfo a')->text();
    }
    
    /**
     * Get size in bytes of HTML content
     * @param string $url URL adres
     * @return string Formated size of page
     */
    public function getPageSize($url)
    {
        $html = file_get_contents($url);
        $size = mb_strlen($html, '8bit');
        $sizeKb = \Sainsbury\Math::formatBytes($size);
        
        return $sizeKb;
    }
    
    /**
     * Get products
     * @return HTMLDom
     */
    public function getProductList()
    {
        return $this->crawler->filter('.productLister > li');
    }
    
    /**
     * @return Product[] List of product objects
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * Append product into item list
     * @todo refactor into non dependable way or using injection
     * @param string $name Description
     * @param double $price Description
     * @param string $size Description
     */
    protected function addItem($name, $price, $size)
    {
        $item = ['name' => trim($name), 'price' => trim($price), 'size' => trim($size)];
        
        $this->items[] = new Product($item);
    }
    
    
    
    /**
     * Load items and append them into items
     */
    protected function loadItems()
    {
        
        $products = $this->getProductList();
        
        foreach($products as $product){
            $nodeHTML =  $product->ownerDocument->saveHTML($product);
            
            $product = new Crawler($nodeHTML);
            $name = $this->getProductName($product);
            $price = $this->getUnitPrice($product);
            $detailLink = $this->getDetailUrl($product);
            $size = $this->getPageSize($detailLink);
            
            $this->addItem($name, $price, $size);
            
        }
    }
}
