<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Cars;
use App\Traits\Common;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     */
    use Common;
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


    public function store(Request $request)
    {


        $meaasges = $this->messages();
        $request->validate([
            'carTitle' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ], $meaasges);

        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;
        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('assets/images', $fileName);


        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']);
        $data['image'] = $fileName;

        Cars::create($data);
        return 'done';
    }

    public function update(Request $request, string $id)
    {
        // Cars::where('id', $id)->update($request->only($this->columns));

        $data = $request->only($this->columns);


        $meaasges = $this->messages();
        $request->validate([
            'carTitle' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ], $meaasges);
        $data['published'] = isset($data['published']) ? true : false;


        // update image if new file selected
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image'] = $fileName;
        }


        // return dd($data);
        // Cars::where('id', $id)->update($request->only($this->columns));
        Cars::where('id', $id)->update($data);
        return 'Updated';
    }

    public function messages()
    {
        return [
            'carTitle.required' => 'Title is required ',
            'description.required' => 'Should be requires ',
            'image.required' => 'required',
            'price.required' => 'required',
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Cars::where('id', $id)->forceDelete();
        return redirect('cars');
    }
    public function delete(string $id): RedirectResponse
    {
        Cars::where('id', $id)->delete();
        return redirect('cars');
    }

    public  function trashed()
    {
        $cars = Cars::onlyTrashed()->get();
        return view('carTrashed', compact('cars'));
    }
    public  function restore(string $id): RedirectResponse
    {
        Cars::where('id', $id)->restore();
        return redirect('cars');
    }
}
