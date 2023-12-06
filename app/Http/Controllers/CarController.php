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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $car = new Cars;
        // $car->carTitle = $request->carTitle;
        // $car->price =  $request->price;
        // $car->description =  $request->description;
        // if (isset($request->published)) {
        //     $car->published = true;
        // } else {
        //     $car->published = false;
        // }
        // $car->save();

        $meaasges = [
            'carTitle.required' => 'Title is required ',
            'description.required' => 'Should be requires ',
            'image.required' => 'required',
            'price.required' => 'required',
        ];
        $request->validate([
            'carTitle' => 'required|string|max:50',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required',
        ], $meaasges);

        $fileName = time() . '.' . $request->image->extension();
        $request->image->storeAs('assets/images', $fileName);


        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']);
        $data['image'] = $fileName;
        // $file = $request
        //     ->image;
        // $path = 'assets/images';
        // $fileName = $this->uploadFile($file, $path);
        // $data['image'] = $fileName;
        // return dd($data);
        Cars::create($data);
        return 'done';
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
        // echo $data['image'];
        // $fileName = '';

        // if (isset($data['image'])) {
        //     $fileName = time() . '.' . $data['image']->extension();
        //     $data['image']->storeAs('images/assets/', $fileName);
        // } else {
        //     $fileName = '';
        // }


        // $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'assets/images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        } else {
            unset($data['image']);
        }



        Cars::where('id', $id)->update($data);
        return "UPDATED";
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
