<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use Sainsbury\Product\ProductInterface;
/**
 * Description of Product
 *
 * @author Kamil Hurajt
 */
class Product implements ProductInterface
{
    public $name;
    public $size;
    public $price;
    
    public function __construct(array $productData = null)
    {
        if($productData){
            $this->assign($productData);
        }
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function getSize() 
    {
        return $this->size;
    }

    public function getUnitPrice() 
    {
        return $this->price;
    }
    
    public function assign(array $productInfo)
    {
        foreach($productInfo as $name => $value){
            if(property_exists($this, $name)){
                $this->{$name} = $value;
            }
        }
    }
    
    public function __toString() {
        return (array) $this;
    }

}
