<?php
namespace Controller;

use GuzzleHttp\Client,
    Symfony\Component\DomCrawler\Crawler,
    Sainsbury\Product\Html\Parser;

/**
 * Description of MainController
 *
 * @author Kamil Hurajt
 */
class MainController extends BaseController 
{
    //put your code here
    public function mainAction()
    {
        $url = $this->config->productUrl;
        
        $guzzle = new Client();
        $request = $guzzle->request('GET', $url);
        $page = (string) $request->getBody();
        
        $crawler = new Crawler($page);
        
        $parser = new Parser($crawler);
        
        $products = $parser->getItems();
        
        $this->view->setContent($products);
        
    }
}
