<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;


class FolderController extends Controller
{
    public function index()
    {
        return view('admin.folder.list', ['details' => []]);
    }

    public function store(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create', Folder::class);

        return view('admin.folder.create', ['data' => []]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit()
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy()
    {
    }
}
