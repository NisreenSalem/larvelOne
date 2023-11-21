<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        // Validate the form data
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'price' => 'required|int|max:255',
        //     'description' => 'required|string|max:255',
        //     'published' => 'required|boolean',

        // ]);

        // Redirect to the thank-you route with form data as URL parameters
        return redirect()->route('thank.you', [
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'published' => $request->input('published'),
        ]);
    }

    public function thankYou(Request $request)
    {
        // Retrieve form data from URL parameters
        $title = $request->input('title');
        $price = $request->input('price');
        $description = $request->input('description');
        $published = $request->input('published');

        return view('thank-you', compact('title', 'price', 'description', 'published'));
    }
}
