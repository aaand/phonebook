<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;

class ContactService
{
    public function index(Request $request)
    {
        $input = $request->all();
        $contacts = Contact::latest()->where('creater', $request->user()->id);
        if (isset($input['favorites'])) {
            $contacts = $contacts->where('favorites', $input['favorites']);
        }
        $contacts = $contacts->paginate(5);

        return $contacts;
    }

    public function indexApi(Request $request)
    {
        $contacts = Contact::where('creater', $request->user()->id)->get();

        return $contacts;
    }

    public function store(ContactFormRequest $request)
    {
        $input = $request->all();
        $input['creater'] = $request->user()->id;

        $contact = Contact::create($input);

        return $contact;
    }

    public function update(ContactFormRequest $request, Contact $contact)
    {
        $contact->update($request->all());
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
