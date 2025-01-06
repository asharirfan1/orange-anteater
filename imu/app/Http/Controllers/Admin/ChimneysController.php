<?php

namespace Teplokvartal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Teplokvartal\Chimney;
use Teplokvartal\Http\Controllers\Controller;
use Teplokvartal\Http\Middleware\Authenticate;

class ChimneysController extends Controller
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
        $chimneys = Chimney::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.chimneys.index', compact('chimneys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chimneys.create');
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
            'desc' => 'required',
            // 'content' => 'required',
            'type' => 'required',
        ]);

        $chimney = Chimney::create($request->all());

        /*if ($request->file('image')) {
        $this->saveImage($request, $chimney);
        }*/

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Дымоход успешно добавлен!',
        ]);

        return redirect('/admin/chimneys');
    }

    /*protected function saveImage(Request $request, Chimney $chimney, $replace = false)
    {
    $imageName = $chimney->id . '.' . $request->file('image')->getClientOriginalExtension();

    if ($replace) {
    \Storage::delete(public_path() . $chimney->image);
    }

    $request->file('image')->move(public_path() . '/images/uploads/', $imageName);

    $chimney->image = '/images/uploads/' . $imageName;
    $chimney->save();
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
    public function edit(Chimney $chimney)
    {
        return view('admin.chimneys.edit', compact('chimney'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chimney $chimney)
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            // 'content' => 'required',
            'type' => 'required',
        ]);

        /*if ($request->file('image')) {
        $this->saveImage($request, $chimney, true);
        }*/

        $chimney->name = $request->name;
        $chimney->desc = $request->desc;
        // $chimney->content = $request->content;
        $chimney->type = $request->type;
        $chimney->image = $request->image;

        $chimney->save();

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Дымоход успешно обновлен!',
        ]);

        return redirect('/admin/chimneys');
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
        Chimney::destroy($id);

        $this->flashData($request, [
            'type' => 'success',
            'message' => 'Дымоход успешно удален!',
        ]);

        return redirect('/admin/chimneys');
    }

    public function search(Request $request)
    {
        $chimneys = Chimney::search($request->queryString)->get();
        $searchCount = count($chimneys);

        return view('admin.chimneys.index', compact('chimneys', 'searchCount'));
    }
}
