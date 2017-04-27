<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request['dtinicial']) && isset($request['dfinal']))
        {

        $dtinicial = \Carbon\Carbon::createFromFormat('d/m/Y', $request['dtinicial']);
        $dtfinal= \Carbon\Carbon::createFromFormat('d/m/Y', $request['dfinal']);

            $events = Event::where('datainicial','>=',$dtinicial)
                           ->where('datafinal','<=',$dtfinal)
                         ->orderBy('datainicial','ASC')
                        ->paginate(10); 
                  
            return view('event.list',compact('events'))
                 ->with('i', ($request->input('page', 1) - 1) * 10);

        }else{

            return view('event.list');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $request['datainicial'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request['datainicial']);
     $request['datafinal'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request['datafinal']);
     $request['datafimdocfp'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request['datafimdocfp']);

         Event::create($request->only('name','datainicial','datafinal','datafimdocfp'));
        
        return redirect()
                ->route('event.create')
                 ->with(['success'=> 'Salvo com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $event = Event::find($id);
            
            $event->delete();
              return redirect()
                        ->route('event.index')
                        ->with(['success'=> 'Registro excluido com sucesso!']);
        
        
    }
}