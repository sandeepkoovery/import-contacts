<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|unique:contacts'
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|unique:contacts,phone,' . $contact->id
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xml'
        ]);

        $xmlData = simplexml_load_file($request->file('file'));

        foreach ($xmlData as $entry) {
            Contact::updateOrCreate(
                ['phone' => (string) $entry->phone],
                ['name' => (string) $entry->name]
            );
        }

        return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully');
    }

    public function showImportForm()
    {
        return view('contacts.import');
    }

}
