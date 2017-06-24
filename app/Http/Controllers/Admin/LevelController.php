<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\Level;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Level::orderby('id')->paginate(5);
        return view('admin/level/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin/level/create_level');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $arr = $request->all();
            $arr['discount'] = $arr['discount'].'%';
            if (Level::create($arr)) {
                return redirect('admin/level');
            } else {
                return back()->withInput();
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Level::find($id);

        return view('/admin/level/level_edit', compact('data'));
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
        return DB::table('level')->delete($id);
    }

    public function ajax (Request $request)
    {
        $name = $request->get('level_name');
        //$name = $_POST['uname'];
        $data = DB::table('level')->select('level_name')->get();
        $arr = array();

        foreach ($data as $k => $v) {
            $arr[$k] = $v->level_name;
        }

        if (in_array($name, $arr)) {
            return 1;
        } else {
            return 2;
        };
    }

    public function edit_ajax()
    {

    }
}
