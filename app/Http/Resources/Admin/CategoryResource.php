<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $options = view('admin.category.partials.options' , ['instance' => $this])->render();
        $image = view('admin.category.partials.image' , ['instance' => $this])->render();
        $active = view('admin.category.partials.active', ['instance' => $this])->render();

        return [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                // 'active' =>  $this->active,
                'activate' => $active,
                'options' => $options,
        ];

    }
}
