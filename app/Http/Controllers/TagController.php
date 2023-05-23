<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string|max:25',
            'slug' => 'required|string|unique:tags,slug'
        ], [], $this->getAttributes())->validate();
        try {
            Tag::create([
                'title' => $request->title,
                'slug' => $request->slug
            ]);
            Alert::success(
                trans('categories.alert.create.title'),
                trans('categories.alert.create.message.success')
            );
            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('categories.alert.create.title'),
                trans('categories.alert.create.massage.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        //
    }

    private function getAttributes()
    {
        return [
            'title' => trans('tags.form_control.input.title.attribute'),
            'slug' => trans('tags.form_control.input.slug.attribute')
        ];
    }
}
