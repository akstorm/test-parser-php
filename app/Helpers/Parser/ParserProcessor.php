<?php
namespace App\Helpers\Parser;

use App\Helpers\Parser\ResourceAbstract;
use App\Helpers\Parser\Product;

class ParserProcessor
{
    const RESOURCE_AMAZON = 'amazon';
    const RESOURCE_SOME_OTHER = 'some_other';

    /**
     * @param string $resource
     * @return ResourceAbstract
     * @throws \Exception
     */
    public function getParser($resource)
    {
        switch($resource)
        {
            case self::RESOURCE_AMAZON:
                return new \App\Helpers\Parser\ResourceAmazon();
                break;

            case self::RESOURCE_SOME_OTHER:
                return new \App\Helpers\Parser\ResourceSomeOther();
                break;

            default:
                throw new \Exception('Invalid resource name '.$resource);
        }
    }
}