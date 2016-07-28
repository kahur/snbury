<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

/**
 * Description of BaseController
 *
 * @author Kamil Hurajt
 */
class BaseController implements \Sainsbury\Controller\ControllerInterface 
{
    /**
     * @var \Sainsbury\View\ViewInterface
     */
    protected $view;
    protected $config;
    
    public function __construct()
    {
        //simulate config
        $config = new \stdClass();
        $config->productUrl = 'http://hiring-tests.s3-website-eu-west-1.amazonaws.com/2015_Developer_Scrape/5_products.html';
        $this->config = $config;
    }
    
    public function setView(\Sainsbury\View\ViewInterface $view) 
    {
        $this->view = $view;
    }
}
