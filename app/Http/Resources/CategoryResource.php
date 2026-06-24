<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{



    public function toArray(Request $request): array
    {
        return [
      "id"=>$this->id,
      "image"=>$this->cate_image,
      "title"=>$this->title_en,
      "title_ar"=>$this->title_ar,
      "description"=>$this->description_en,
      "description_ar"=>$this->description_ar,
        ];
}
}
