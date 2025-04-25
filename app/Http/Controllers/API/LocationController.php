<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\emergencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LocationController extends Controller
{
    // Listar todas as localizações
    public function index()
    {
        return Location::with('user')->get();
    }

    // Criar uma nova localização
    public function store($lat, $lon, $user, $alert)
    {
        $data = [
            'latitude' => $lat,
            'longitude' => $lon,
            'users_id' => $user
        ];
        $validator = Validator::make($data, [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'users_id' => 'required|exists:users,id',
        ]);
    
        if ($validator->fails()||!($alert>0)) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
       $emergencia= emergencia::create( [
            'alert_type'=> $alert%2==0? 'Fora da zona segura':'Ameaça ou mal estar',
            'message'=> $alert%2==0? 'A sua criança "nome" saiu da zona segura':'A sua criança sente-se ameaçada ou com problemas',
            'users_id'=>$user,
        ]);

        $location = Location::create($data);
    
        return response()->json(['Localização'=>$location,'Emergencia criada'=>$emergencia], 201);
    }

    // Mostrar uma localização específica
    public function show($id)
    {
        $location = Location::with('user')->findOrFail($id);

        return response()->json($location);
    }

}
