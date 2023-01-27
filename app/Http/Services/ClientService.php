<?php
namespace App\Http\Services;

use App\Http\Repositories\ClientRepository;
use App\Models\Client;
use Exception;

class ClientService {

    public function listClients()  {
        try {    
            $clients = ClientRepository::allClients();

            if ($clients) {
                return ["success" => true, "result" => $clients,"message" => "Clientes consultados com sucesso"];
            }
            return ["success" => false, "message" => "Não foi possível consultar os clientes"]; 

        } catch (Exception $e) {    
            return ["success" => false, "message" => "Erro ao tentar buscar Clientes. " . $e->getMessage()];      
        }  
    }

    public function newClient(array $clientData) : array {
        try {           
            $newUser = ClientRepository::create($clientData);
            if ($newUser){
                return ["success" => true, "result" => $newUser,"message" => "Usuário cadastrado com sucesso"];     
            }     
            return ["success" => false, "message" => "Não foi possível cadastrar o cliente."];              
           
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Erro ao tentar cadastrar o Cliente. " . $e->getMessage()];      
        }         
    }     

    public function deleteClient(Client $client) : array {
        try {           
            $deleteUser = ClientRepository::delete($client);
            if ($deleteUser){
                return ["success" => true, "message" => "Cliente excluído com sucesso"];     
            }     
            return ["success" => false, "message" => "Não foi possível excluir o cliente."];              
           
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Erro ao tentar excluir o Cliente. " . $e->getMessage()];      
        }         
    }  

    public function filterClient(array $filterData) : array {
        try {           
            $filteredUsers = ClientRepository::filter($filterData,["name"]);
            if ($filteredUsers){
                return ["success" => true, "result" => $filteredUsers, "message" => "Clientes filtrados com sucesso"];     
            }     
            return ["success" => false, "message" => "Não foi possível filtrar os clientes."];              
           
        } catch (Exception $e) {    
            return ["success" => false, "message" => "Erro ao tentar filtrar Clientes. " . $e->getMessage()];      
        }         
    }  
}
