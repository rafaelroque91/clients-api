<?php

namespace App\Http\Controllers;
use App\Http\Services\ClientService;


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
}
