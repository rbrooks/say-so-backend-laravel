<?php

namespace App\SaySo\Transformers;

class TagTransformer extends Transformer
{
    protected $resourceName = 'tag';

    public function transform($data)
    {
        return $data;
    }
}