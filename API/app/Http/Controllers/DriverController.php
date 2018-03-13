<?php

namespace API\Http\Controllers;

use API\Driver;
use API\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class DriverController extends Controller {

    public function __construct() {
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only' => ['show', 'update', 'destroy']]);
    }
    public function find(Route $route) {
        $this->driver = Driver::find($route->getParameter('drivers'));
        # code...
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $Drivers = Driver::all();
        return response()->json($Drivers->toArray());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        Driver::create($request->all());
        return Response()->json(["message" => "Driver Created!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return response()->json($this->driver);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->driver->fill($request->all());
        $this->driver->save();
        return response()->json(["message" => "Driver Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $this->driver->delete();
        return response()->json(["message" => "Driver eliminated"]);
    }
}
