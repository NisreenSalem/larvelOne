<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\News;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    private $columns = ['title', 'content', 'author', 'published'];

    public function index()
    {
        $news = News::get();
        return view('news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addnews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $new = new News;
        // $new->title = $request->title;
        // $new->content =  $request->content;


        // if (isset($request->published)) {
        //     $new->published = true;
        // } else {
        //     $new->published = false;
        // }
        // $new->author =  $request->author;

        // $new->save();
        // return "new data added sucessfully";

        $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:150',
            'author' => 'required|string',
        ]);

        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;

        News::create($data);
        return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('newsDetails', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return view('updatenews');
        $new = News::findOrFail($id);
        return view('updatenews', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;
        News::where('id', $id)->update($data);

        return "UPDATED";
    }

    /**
     * Remove the specified resource from storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        News::where('id', $id)->forceDelete();
        return redirect('news');
    }
    public function delete(string $id): RedirectResponse
    {
        News::where('id', $id)->delete();
        return redirect('news');
    }

    public  function trashed()
    {
        $news = News::onlyTrashed()->get();
        return view('newsTrashed', compact('news'));
    }
    public  function restore(string $id): RedirectResponse
    {
        News::where('id', $id)->restore();
        return redirect('news');
    }
}
