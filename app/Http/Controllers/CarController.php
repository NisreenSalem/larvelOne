<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Cars;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     */

    private $columns = ['carTitle', 'price', 'description', 'published'];

    public function index()
    {
        $cars = Cars::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $car = new Cars;
        $car->carTitle = $request->title;
        $car->description =  $request->description;

        if (isset($request->published)) {
            $car->published = true;
        } else {
            $car->published = false;
        }

        $car->save();
        return "Car data added sucessfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Cars::findOrFail($id);
        return view('carDetails', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Cars::findOrFail($id);
        return view('updatecar', compact('car'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cars::where('id', $id)->update($request->only($this->columns));
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;
        Cars::where('id', $id)->update($data);
        // return redirect('clients');
        return "UPDATED";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,  string $id): RedirectResponse
    {

        Cars::where('id', $id)->delete();
        return redirect('cars');
        // return "Deleted Page";
    }
}
