<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use Exception;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect('dashboard/#calendar');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->edit_id;

        try{
            $edit_task = Task::findorFail($id);

            $edit_task->update($request->all());

            return response()->json(['status' => 200]);
        }
        catch (Exception $e){
            $arr = ['status' => 'BAD'];
            return response()->json($arr);
        }
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
        $id = $request->id;

        try{
            $update_task = Task::findorFail($id);

            $update_task->update($request->all());

            return response()->json(['status' => 200]);
        }
        catch (Exception $e){
            $arr = ['status' => 'BAD'];
            return response()->json($arr);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->delete_id;

        try{
            $delete_task = Task::findorFail($id);

            $delete_task->delete($request->all());

            return response()->json(['status' => 200]);
        }
        catch (Exception $e){
            $arr = ['status' => 'BAD'];
            return response()->json($arr);
        }
    }
}
