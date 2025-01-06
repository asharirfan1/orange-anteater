<?php

namespace Teplokvartal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Teplokvartal\Briquette;
use Teplokvartal\Http\Requests;
use Teplokvartal\Http\Controllers\Controller;
use Teplokvartal\Http\Middleware\Authenticate;

class BriquettesController extends Controller
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
        $briquettes = Briquette::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.briquettes.index', compact('briquettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.briquettes.create');
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

        $briquette = Briquette::create($request->all());

        /*if ($request->file('image')) {
            $this->saveImage($request, $briquette);
        }*/

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Брикет успешно добавлен!'
        ]);

        return redirect('/admin/briquettes');
    }

    /*protected function saveImage(Request $request, Briquette $briquette, $replace = false)
    {
        $imageName = $briquette->id . '.' . $request->file('image')->getClientOriginalExtension();

        if ($replace) {
            \Storage::delete(public_path() . $briquette->image);
        }

        $request->file('image')->move(public_path() . '/images/uploads/', $imageName);
    
        $briquette->image = '/images/uploads/' . $imageName;
        $briquette->save();
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
    public function edit(Briquette $briquette)
    {
        return view('admin.briquettes.edit', compact('briquette'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Briquette $briquette)
    {
        $this->validate($request, [
            'name' => 'required',
            //'desc' => 'required',
            'content' => 'required',
            //'type' => 'required',
        ]);

        /*if ($request->file('image')) {
            $this->saveImage($request, $briquette, true);
        }*/

        $briquette->name = $request->name;
        $briquette->desc = $request->desc;
        $briquette->content = $request->content;
        $briquette->image = $request->image;
        //$briquette->type = $request->type;

        $briquette->save();

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Брикет успешно обновлен!'
        ]);

        return redirect('/admin/briquettes');
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
        Briquette::destroy($id); 

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Брикет успешно удален!',
        ]);

        return redirect('/admin/briquettes');
    }

    public function search(Request $request)
    {
        $briquettes = Briquette::search($request->queryString)->get();
        $searchCount    = count($briquettes);

        return view('admin.briquettes.index', compact('briquettes', 'searchCount'));
    }
}
