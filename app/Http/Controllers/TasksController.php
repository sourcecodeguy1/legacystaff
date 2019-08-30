<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use Exception;
use PhpParser\Node\Expr\AssignOp\Concat;

use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Carbon;
use DateTime;

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
        $title = $request->title;
        $color = $request->color;

        $start_hour = $request->start_hour;
        $start_minute = $request->start_minute;
        $start_am_pm = $request->start_am_pm;

        $end_hour = $request->end_hour;
        $end_minute = $request->end_minute;
        $end_am_pm = $request->end_am_pm;


        /*echo " start ".$start_hour.$start_minute." ".$start_am_pm;
        echo "<br />";
        echo " end ".$end_hour.$end_minute." ".$end_am_pm;
        exit();*/

        $startTime = $start_hour.$start_minute." ".$start_am_pm;
        $startDateTime = DateTime::createFromFormat('g:i A', trim($startTime));
        $newFormattedStartTime = $startDateTime->format('H:i');

        $endTime = $end_hour.$end_minute." ".$end_am_pm;
        $endDateTime = DateTime::createFromFormat('g:i A', trim($endTime));
        $newFormattedEndTime = $endDateTime->format('H:i');

        $startDate = DateTime::createFromFormat('m/d/Y', trim($request['start']));
        $newConvertedStartDate = $startDate->format('Y-m-d');

        $endDate = DateTime::createFromFormat('m/d/Y', trim($request['end']));
        $newConvertedEndDate = $endDate->format('Y-m-d');



        /*echo $newConvertedStartDate." ".$newFormattedStartTime." - ".$newConvertedEndDate." ".$newFormattedEndTime;
        exit();*/

        /*$insert = DB::insert("INSERT INTO tasks (id, title, color, start, end ) VALUES (?,?,?,?,?)", [null, $title, $color, $newConvertedStartDate." ".$newFormattedStartTime, $newConvertedEndDate." ".$newFormattedEndTime]);
        echo  $insert;*/
        //echo $start." ".$end." ".$start_hour.":".$start_minute." - ".$end_hour.":".$end_minute;
        try{

            $insert = DB::insert("INSERT INTO tasks (id, title, color, start, end ) VALUES (?,?,?,?,?)", [null, $title, $color, $newConvertedStartDate." ".$newFormattedStartTime, $newConvertedEndDate." ".$newFormattedEndTime]);

            $getAllData = Task::all();

            return response()->json(['status' => 200, 'allData' => $getAllData ]);
        }
        catch (Exception $e){
            $arr = ['status' => $e];
            return response()->json($arr);
        }
        /*try{

            $insert = Task::create($request->all());

            return response()->json(['status' => 200, 'allData' => $insert ]);
        }
        catch (Exception $e){
            $arr = ['status' => $e];
            return response()->json($arr);
        }*/

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
