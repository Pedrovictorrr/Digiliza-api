<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::orderBy('id', 'asc')->get();

        return response()->json($reservas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $mesa = $this->verifyMesa($request);
        $reserva = new Reserva;

        $reserva-> QTD_Pessoas = $request->input('QTDPessoas');
        $reserva->Data = $request->input('Data');
        $reserva->Name = $request->input('Nome') ." ". $request->input('Sobrenome');
        $reserva->Email = $request->input('Email');
        $reserva->Telefone = $request->input('Telefone');
        $reserva->Hora = $request->input('Hora');
        $reserva->Observacao = $request->input('Observacao');
        $reserva->Mesa_id = $mesa;
        $reserva->Status = 1;
        $reserva->User_id = Auth()->user()->id;
        
        $reserva->save();
    
        return response()->json(['message' => 'Reserva criada com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
    
        if (!$reserva) {
            return response()->json(['message' => 'Reserva não encontrada'], 404);
        }
    
        $mesa = $this->verifyMesa($request);
    
        $reserva->QTD_Pessoas = $request->input('QTD_Pessoas');
        $reserva->Data = $request->input('Data');
        $reserva->Name = $request->input('Nome') ." ". $request->input('Sobrenome');
        $reserva->Email = $request->input('Email');
        $reserva->Telefone = $request->input('Telefone');
        $reserva->Hora = $request->input('Hora');
        $reserva->Observacao = $request->input('Observacao');
        $reserva->Mesa_id = $mesa;
        $reserva->User_id = Auth()->user()->id;
        $reserva->Status = $request->input('Status');
    
        $reserva->save();
    
        return response()->json(['message' => 'Reserva atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return response()->json([
                'message' => 'Registro não encontrado'
            ], 404);
        }
    
        $reserva->delete();
    
        return response()->json([
            'message' => 'Registro deletado com sucesso'
        ], 200);
    }
    public function GetLasts()
    {
        $reservas = Reserva::latest()
            ->limit(10)
            ->get();

        return response()->json($reservas);
    }

    public function showReservasHrs(Request $request)
    {
        $hoje = $request->input('dia'); // data atual
        $horas_do_dia = range(18, 23); // array com as horas do dia
        $reservas_por_hora = [];
        foreach ($horas_do_dia as $hora) {
            $inicio_periodo = "{$hora}:00:00"; // data e hora de início do período
            $fim_periodo = " {$hora}:59:59"; // data e hora de fim do período

            $reservas_no_periodo = Reserva::where('Data' , $hoje)->whereBetween('Hora', [$inicio_periodo, $fim_periodo])
                ->count();

            if($reservas_no_periodo < 15){
                $status = 'Disponivel';
            }else{
                $status = 'Esgotado';  
            }

            $reservas_por_hora["{$hora}:00"] = ['total_reservas' => $reservas_no_periodo,'status' => $status ];
        }
        return response()->json($reservas_por_hora);
    }

    public function verifyMesa(Request $request)
    {
        $data = $request->input('Data'); // data atual
        $hora = $request->input('Hora');
        $hora = rtrim($hora, "00");
        $inicio_periodo = "{$hora}00:00"; // data e hora de início do período
        $fim_periodo = "{$hora}59:59"; // data e hora de fim do período 
        $reservas_no_periodo = Reserva::where('Data' , $data)->whereBetween('Hora',[$inicio_periodo, $fim_periodo])
                ->count();
        $numero_mesa = $reservas_no_periodo + 1;
        return $numero_mesa ;
    }

}
