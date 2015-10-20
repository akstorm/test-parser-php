<?php
namespace App\Helpers\Parser;

use App\Helpers\Parser\Product;

/**
 * Interface ResourceInterface
 * @package App\Helpers\Parser
 */
interface ResourceInterface
{
    /**
     * @param string $keyword
     * @return \App\Helpers\Parser\Product
     */
    public function parse($keyword);
}