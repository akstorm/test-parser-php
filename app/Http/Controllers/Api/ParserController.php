<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Parser\ParserProcessor;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    /**
     * @param string $resource
     * @param string $keyword
     */
    public function parse($resource, $keyword)
    {
        /** @var ParserProcessor $parserProcessor */
        $parserProcessor = \App::make('ParserProcessor');
        $resourceParser = $parserProcessor->getParser($resource);
        $product = $resourceParser->parse($keyword);
        return response()->json($product->toArray());
    }
}
