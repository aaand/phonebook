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
use App\Services\ContactService;

class ContactController extends BaseController
{
    protected $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = $this->service->indexApi($request);

        return $this->sendResponse($contacts->toArray(), 'Contacts retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactFormRequest $request)
    {
        $contact = $this->service->store($request);

        return $this->sendResponse($contact->toArray(), 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);

        return $this->sendResponse($contact->toArray(), 'Contact retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactFormRequest $request, Contact $contact)
    {
        $this->authorize('update', $contact);

        $this->service->update($request, $contact);

        return $this->sendResponse($contact->toArray(), 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);

        $this->service->destroy($contact);

        return $this->sendResponse($contact->toArray(), 'Contact deleted successfully.');
    }
}
