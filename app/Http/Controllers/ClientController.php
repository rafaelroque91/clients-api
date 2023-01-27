<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewClientRequest;
use App\Http\Services\ClientService;
use App\Models\Client;

class ClientController extends BaseController
{
    public $clientService;

    protected $redirectTo = false;

    public function __construct()
    {
        $this->clientService = new ClientService();
    }

    public function listClients(){
        $clientsList = $this->clientService->listClients();    

        return $this->responseData($clientsList);         
    } 

    public function newClient(NewClientRequest $request){

        $validatedClient = $request->validated();

        $returnClient = $this->clientService->newClient($validatedClient);    

        return $this->responseData($returnClient);         
    } 

    public function deleteClient(Client $client){

        $returnClient = $this->clientService->deleteClient($client);    

        return $this->responseData($returnClient);         
    } 
}
