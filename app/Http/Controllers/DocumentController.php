<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentRequest;
use App\Models\Address;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Address $address, StoreDocumentRequest $request)
    {
        $file = $request->file('file');
        $name = $file->hashName();

        // Upload file
        Storage::put("documents", $file);

        // Save to database
        $address->documents()->create([
            'name' => $name,
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'path' => "documents/$name",
            'size' => $file->getSize(),
        ]);

        return back()->with('toast_success', 'Document uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return response()->download(storage_path("/app/$document->path"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return back()->with('toast_info', 'Document deleted successfully');
    }
}
