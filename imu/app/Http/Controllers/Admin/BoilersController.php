<?php

namespace Teplokvartal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Teplokvartal\Boiler;
use Teplokvartal\Http\Requests;
use Teplokvartal\Http\Controllers\Controller;
use Teplokvartal\Http\Middleware\Authenticate;

class BoilersController extends Controller
{
    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boilers = Boiler::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.boilers.index', compact('boilers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.boilers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            //'desc' => 'required',
            'content' => 'required',
            //'type' => 'required',
        ]);

        $boiler = Boiler::create($request->all());

        /*if ($request->file('image')) {
            $this->saveImage($request, $boiler);
        }*/

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Котел успешно добавлен!'
        ]);

        return redirect('/admin/boilers');
    }

    /*protected function saveImage(Request $request, Boiler $boiler, $replace = false)
    {
        $imageName = $boiler->id . '.' . $request->file('image')->getClientOriginalExtension();

        if ($replace) {
            \Storage::delete(public_path() . $boiler->image);
        }

        $request->file('image')->move(public_path() . '/images/uploads/', $imageName);
    
        $boiler->image = '/images/uploads/' . $imageName;
        $boiler->save();
    }*/


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
    public function edit(Boiler $boiler)
    {
        return view('admin.boilers.edit', compact('boiler'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boiler $boiler)
    {
        $this->validate($request, [
            'name' => 'required',
            //'desc' => 'required',
            'content' => 'required',
            //'type' => 'required',
        ]);

        /*if ($request->file('image')) {
            $this->saveImage($request, $boiler, true);
        }*/

        $boiler->name = $request->name;
        $boiler->desc = $request->desc;
        $boiler->content = $request->content;
        $boiler->image = $request->image;
        //$boiler->type = $request->type;

        $boiler->save();

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Котел успешно обновлен!'
        ]);

        return redirect('/admin/boilers');
    }

    protected function flashData(Request $request, $data = [])
    {
        foreach ($data as $key => $value) {
            $request->session()->flash($key, $value);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Boiler::destroy($id); 

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Котел успешно удален!',
        ]);

        return redirect('/admin/boilers');
    }

    public function search(Request $request)
    {
        $boilers = Boiler::search($request->queryString)->get();
        $searchCount    = count($boilers);

        return view('admin.boilers.index', compact('boilers', 'searchCount'));
    }
}
