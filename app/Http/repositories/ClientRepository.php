<?php
namespace App\Http\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository extends BaseRepository {

    public static function allClients() {   
        return self::paginateData(new Client);        
    }

    public static function create(array $data) {   
        return Client::create($data);        
    }

    public static function delete(Client $client) {   
        return $client->delete();        
    }

    public static function filter(array $data,array $columnsLike = []) {   

        $collection = Client::where(
            function($query) use ($data,$columnsLike) {
                foreach($data as $key => $d) {
                    $useLike = in_array($key,$columnsLike);
                    $query = $query->where($key, ($useLike ? "LIKE" : '=') , ($useLike ? "%".$d."%" : $d));
                }
                return $query;
             });  

        return self::paginateData($collection);                                      
    }
}