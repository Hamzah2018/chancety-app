<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        // return parent::toArray($request);
        $options = view('admin.customers.partials.options' , ['instance' => $this])->render();
        $image = view('admin.customers.partials.image' , ['instance' => $this])->render();
        $active = view('admin.customers.partials.active', ['instance' => $this])->render();

        return [
                'id' => $this->id,
                'fname' => $this->fname,
                'lname' => $this->lname,
                'password' => $this->mobile,
                'user_type' => 'customer',
                'email' => $this->email,
                'second_email' => $this->second_email,
                'activate' => $active,
                'options' => $options,
        ];

    }
}
