<?php
namespace App\Helpers\Parser;

use App\Helpers\Parser\ResourceAbstract;
use App\Helpers\Parser\Product;

/**
 * Class ResourceSomeOther
 * @package App\Helpers\Parser
 */
class ResourceSomeOther extends ResourceAbstract
{
    /**
     * @param string $keyword
     * @return Product
     */
    public function parse($keyword)
    {
        $product = new Product();
        $product->setTitle('aaaaaa');
        return $product;
    }
}