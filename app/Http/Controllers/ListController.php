<?php

namespace App\Http\Controllers;

use App\Model\ToDoList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function showAllAuthors()
    {
        return response()->json(ToDoList::all(), 200);
    }

    public function showOneAuthor($id)
    {
        return response()->json(ToDoList::find($id));
    }

    public function create(Request $request)
    {
        $author = ToDoList::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = ToDoList::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        ToDoList::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
