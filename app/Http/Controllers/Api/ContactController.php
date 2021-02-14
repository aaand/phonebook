<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Contact;
use Validator;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactFormRequest;

class ContactController extends BaseController
{
    protected $auth;

    /*public function __construct()
    {
        print_r(Auth::user());
        //print_r( Auth::guard('api')->user());
        print_r( '123');
        die();
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::where('creater', $request->user()->id)->get();

        return $this->sendResponse($contacts->toArray(), 'Contacts retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $input = $request->all();
        $input['creater'] = $request->user()->id;

        $contact = Contact::create($input);

        return $this->sendResponse($contact->toArray(), 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);

        if (is_null($contact)) {
            return $this->sendError('Contact not found.');
        }

        return $this->sendResponse($contact->toArray(), 'Contact retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactFormRequest $request, Contact $contact)
    {
        $input = $request->all();

        $contact->fio = $input['fio'];
        $contact->phone = $input['phone'];
        $contact->creater = $request->user()->id;
        $contact->save();

        return $this->sendResponse($contact->toArray(), 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return $this->sendResponse($contact->toArray(), 'Contact deleted successfully.');
    }
}
