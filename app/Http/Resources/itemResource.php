<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class itemResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function with($request){
        return [
            'version' => 'v1.0.0',
            'developer' => 'https://github.com/soulaimaneyahya'
        ];
    }
}
