<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Kaze\Transformers\BasicTransformer;

class TechnicalController extends Controller
{
    protected $transformer = null;

    /**
     * TagController constructor.
     *
     * @param BasicTransformer $transformer
     */
    public function __construct(BasicTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    protected function respond($data, $statusCode = 200, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }

    public function ping()
    {
        return $this->respond('pong');
    }
}
