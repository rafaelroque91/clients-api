<?php
namespace App\Http\Repositories;

use Illuminate\Support\Facades\Config;

class BaseRepository {

    public function paginateData($objData){
        return $objData->paginate(Config::get('api.PAGE_SIZE'));
    }
}
