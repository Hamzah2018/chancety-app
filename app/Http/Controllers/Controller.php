<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function filterDataTable($items, $request,$take = null,$resource = null)
    {
        if ($items->count() <= 0) {
            $data['recordsTotal'] = 0;
            $data['recordsFiltered'] = 0;
            $data['data'] = [];
            return $data;
        }

        if (!$resource) {
            $resource = $items->first()->resource;
        }
        if (isset($take)) {
            $items = $items->take($take)->get();
            $data = $resource->collection($items);
            return $data;
        }
        $per_page = isset($request->length) ? $request->length : 10;
        $page = isset($request->start) ? $request->start : 1;
        if ($per_page == -1 || $per_page == null) {
            $per_page = 10;
        }
        $itemsCount = $items->count();
        $items = $items->take($per_page)->skip($page)->get();
        $data['recordsTotal'] = $itemsCount;
        $data['recordsFiltered'] = $itemsCount;
        $data['data'] = $resource::collection($items);
        return $data;
    }
}
