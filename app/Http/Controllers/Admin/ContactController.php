<?php

namespace App\Http\Controllers\Admin;

use Excel;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contact::orderBy('created_at', 'DESC')->get();
        return view('admin.contact.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $contact->update([
            'read_by' => auth()->id()
        ]);

        return view('admin.contact.update', ['data' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $data = $contact->delete();

        session()->flash('sukses', trans('admin.message.success'));

        return redirect(route('admin.contact.index'));
    }

    public function export()
    {
        $filename = "Contacts.xlsx";

        return Excel::download(new ContactExport(), $filename);
    }
}
