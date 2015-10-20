<?php
namespace App\Helpers\Parser;

/**
 * Class ResourceAbstract
 * @package App\Helpers\Parser
 */
abstract class ResourceAbstract implements ResourceInterface
{
    /**
     * @param string $keyword
     * @return \App\Helpers\Parser\Product
     */
    abstract public function parse($keyword);

    /**
     * @param string $value
     * @return string
     */
    protected function _cleanHtmlValue($value)
    {
        return preg_replace(['/(^\s+)|(\s+$)/', '/(\\n|\\t)/', '/\s{2,}/'], ['', "\n", "\n"], strip_tags($value));
    }

    /**
     * @param string $html
     * @return \PHPHtmlParser\Dom
     */
    protected function _parseHtml($html)
    {
        /** @var \PHPHtmlParser\Dom $dom */
        $dom = \App::make('HtmlParserProcessor');
        $dom->load($html);
        return $dom;
    }

    /**
     * @param string $url
     * @return string
     * @throws \Exception
     */
    protected function _getHtmlByUrl($url)
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true
        ]);

        $err = curl_error($ch);


        $response = curl_exec($ch);

        $info = curl_getinfo($ch);

        if ($err) {
            throw new \Exception($err);
        }

        curl_close($ch);

        if ($info['size_download'] == 0) {
            throw new \Exception('No data received');
        }

        if ($info['http_code'] != 200) {
            throw new \Exception('Invalid server response code: '.$info['http_code']);
        }

        return $response;
    }
}