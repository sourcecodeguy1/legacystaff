<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\NineGradeTaskModel;
use Exception;
use Illuminate\Support\Facades\DB;

class NineGradeTasksController extends Controller
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
        //NineGradeTaskModel::create($request->all());
        //return redirect('9th_grade');
        try{

             $insert = NineGradeTaskModel::create($request->all());

            return response()->json(['status' => 200, 'allData' => $insert ]);
        }
        catch (Exception $e){
            $arr = ['status' => 'BAD'];
            return response()->json($arr);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->edit_id;

        try{
            $edit_task = NineGradeTaskModel::findorFail($id);

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
            $update_task = NineGradeTaskModel::findorFail($id);

            $update_task->update($request->all());

            return response()->json(['status' => 200]);
        }
        catch (Exception $e){
            $arr = ['status' => "BAD"];
            return response()->json($arr);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->delete_id;

        try{
            $delete_task = NineGradeTaskModel::findorFail($id);

            $delete_task->delete($request->all());

            return response()->json(['status' => 200]);
        }
        catch (Exception $e){
            $arr = ['status' => 'BAD'];
            return response()->json($arr);
        }
    }
}
