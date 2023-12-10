<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Explore;

class ExploreController extends Controller
{

    private $columns = ['title', 'content', 'exp_from', 'exp_to', 'image', 'rate', 'price'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('addExplore');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = [
            'title.required' => 'Title is required ',
            'contnet.required' => 'Should be required ',
            'price.required' => 'required',
        ];
        // $request->validate([
        //     'title' => 'required|string',
        //     'content' => 'required|string',
        //     'price' => 'required|float',
        // ], $messages);




        $data = $request->only($this->columns);
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('assets/images', $fileName);


        $data = $request->only($this->columns);
        $data['image'] = $fileName;

        Explore::create($data);
        return 'done';

        // return  dd($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
