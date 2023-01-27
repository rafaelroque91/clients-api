<?php
namespace App\Http\Repositories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository extends BaseRepository {

    public static function allClients() {   
        return self::paginateModel(new Client);        
    }

    public static function create(array $data) {   
        return Client::create($data);        
    }

    public static function delete(Client $client) {   
        return $client->delete();        
    }
}