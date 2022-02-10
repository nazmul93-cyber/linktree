<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinksController extends Controller
{
    public function index()
    {
        $links = auth()->user()
                ->links()
                ->withCount('visits')
                ->with('latest_visit')
                ->get();
        // return $links;       // check out name of the new column for count
        return view('links.index', ['links' => $links]);
    }

    public function create()
    {
        return view('links.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:255',
            'link' => 'required|url',
        ]);


        // $link = Link::create([
        //     'user_id' => auth()->id(),
        //     'name' => request()->name,
        //     'link' => request()->link,
        // ]);
        // alt . code
        $link = auth()->user()->links()->create(request()->only(['name', 'link']));
        if ($link) {
            return redirect()->to('/dashboard/links');
        } else {
            return redirect()->back();
        }
    }

    public function edit(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(404);
        }
        return view('links.edit', [
            'link' => $link,
        ]);
    }

    public function update(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }
        request()->validate([
            'name' => 'required|max:255',
            'link' => 'required|url',
        ]);

        $link->update(request()->only(['name', 'link']));
        return redirect()->to('/dashboard/links');
    }

    public function destroy(Link $link)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }
        $link->delete(); 
        return redirect()->to('/dashboard/links');

    }
}
