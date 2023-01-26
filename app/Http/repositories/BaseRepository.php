<?php
namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class BaseRepository {

    public function paginateModel(Model $model){
        return $model->paginate(Config::get('api.PAGE_SIZE'));
    }
}
