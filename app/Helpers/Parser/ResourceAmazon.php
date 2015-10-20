<?php
namespace App\Helpers\Parser;

use App\Helpers\Parser\ResourceAbstract;
use App\Helpers\Parser\Product;

/**
 * Class ResourceAmazon
 * @package App\Helpers\Parser
 */
class ResourceAmazon extends ResourceAbstract
{
    const SEARCH_URL = 'http://www.amazon.com/s/ref=nb_sb_noss_2?url=search-alias%3Daps&field-keywords=%s';

    /**
     * @param string $keyword
     * @return \App\Helpers\Parser\Product
     * @throws \Exception
     */
    public function parse($keyword)
    {
        $html = $this->_getHtmlByUrl(self::SEARCH_URL . urlencode($keyword));

        $dom = $this->_parseHtml($html);

        $productUrl = $dom->find('#result_0 a.s-access-detail-page', 0)->getAttribute('href');
        if (empty($productUrl)) {
            throw new \Exception('Product url not found');
        }


        $html = $this->_getHtmlByUrl($productUrl);
        $dom = $this->_parseHtml($html);
        $productDom = $dom->find('.a-container', 0);

        $product = new Product();
        $product->setTitle($this->_cleanHtmlValue($dom->find('#productTitle', 0)));

        $tmp = $dom->find('#priceblock_saleprice', 0);
        if (is_object($tmp)) {
            $product->setPrice($this->_cleanHtmlValue($tmp));
        } else {
            $tmp = $dom->find('#priceblock_ourprice', 0);
            if (is_object($tmp)) {
                $product->setPrice($this->_cleanHtmlValue($tmp));
            }
        }

        $product->setImage($productDom->find('li.image img', 0)->getAttribute('src'));
        $product->setDescription($this->_cleanHtmlValue($productDom->find('#productDescription', 0)));

        return $product;
    }
}