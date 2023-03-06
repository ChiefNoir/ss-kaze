<?php

namespace App\Kaze\Transformers;
use App\Kaze\Transformers\Transformer;

class BasicTransformer extends Transformer
{
    public function transform($data)
    {
        return $data;
    }
}
