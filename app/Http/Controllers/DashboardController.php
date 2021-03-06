<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dashboard;
use App\Task;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = "dashboard";
        $data = Dashboard::all();
        $tasks = Task::all();

        //return $data;
        return view('dashboard/dashboard')->with(['data' => $data, 'tasks' => $tasks, 'url' => $url]);
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
        //
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
        $dashboard_edit = Dashboard::findOrFail($id);

        /*if(!$id){
            abort('404', 'Not found');
        } else {
            return view('dashboard/edit')->with('id', $id);
        }*/
        return view('dashboard/edit')->with('dashboard_edit', $dashboard_edit);

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
        /*dd($request->all());
        exit();*/

        $dashboard_post = Dashboard::find($id);

        $dashboard_post->update($request->all());

        if ($dashboard_post->wasChanged()) {
            return redirect('dashboard')->with(['success' => 'Changes were successfully saved.']);

        } else {
            return redirect('dashboard/' . $id . '/edit')->with(['error' => 'No changes made.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
