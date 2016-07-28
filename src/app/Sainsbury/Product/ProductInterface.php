<?php
namespace Sainsbury\Product;

/**
 *
 * @author Kamil Hurajt
 */
interface ProductInterface {
    public function getName();
    public function getUnitPrice();
    public function getSize();
}
