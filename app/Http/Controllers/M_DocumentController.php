<?php

namespace App\Http\Controllers;

use App\Models\M_Document;
use Illuminate\Http\Request;

class M_DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = M_Document::all();
        return view('pages.admin.reminder.document.index', compact('documents'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'expired' => 'required|date',
            'duration' => 'required|integer',
            'duration_type' => 'required|in:day,month,year'
        ]);

        $document = new M_Document();
        $document->name = $validatedData['name'];
        $document->expired = $validatedData['expired'];
        $document->duration = $validatedData['duration'];
        $document->duration_type = $validatedData['duration_type'];
        $document->save();

        return response()->json(['success' => true, 'message' => 'Proses tambah data berhasil!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = M_Document::find($id);
        return response()->json($document);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = M_Document::find($id);
        return response()->json($document);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     dd($request->all());
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'expired' => 'required|date',
    //         'duration' => 'required|integer',
    //         'duration_type' => 'required|in:day,month,year'
    //     ]);

    //     $document = M_Document::findOrFail($id);
    //     $document->update($validatedData);

    //     return response()->json($document);
    // }
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'expired' => 'required|date',
            'duration' => 'required|integer',
            'duration_type' => 'required|in:day,month,year'
        ]);

        // Find the document by ID and update it
        $document = M_Document::findOrFail($id);
        $document->update($validatedData);

        // Return the updated document as JSON response
        return response()->json($document);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = M_Document::find($id);
        $document->delete();
        return response()->json(['success' => 'Document deleted successfully']);
    }
}
