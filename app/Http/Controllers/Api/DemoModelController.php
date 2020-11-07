<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DemoModel;
use Illuminate\Http\Request;
use App\Repository\Eloquent\DemoRepository;
use App\Http\Requests\Demo\StoreRequest;
use App\Http\Requests\Demo\UpdateRequest;
class DemoModelController extends Controller
{

    private $demoRepository;

    public function __construct(DemoRepository $demoRepository)
    {
        $this->demoRepository=$demoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['demos'=>$this->demoRepository->getAllUser()],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->demoRepository->createDemo($request);
        return response()->json(['message' => 'Demo data created successfully','variant' => 'success'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DemoModel  $demoModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['demo'=>$this->demoRepository->showDemo($id)],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DemoModel  $demoModel
     * @return \Illuminate\Http\Response
     */
    public function edit(DemoModel $demoModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DemoModel  $demoModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request,$id)
    {
        $this->demoRepository->updateDemo($request,$id);
        return response()->json(['message' => 'Demo data updated successfully','variant' => 'warning'],200);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DemoModel  $demoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->demoRepository->deleteDemo($id);
        return response()->json(['message' => 'Demo data deleted successfully','variant' => 'danger'],200);
    }
}
