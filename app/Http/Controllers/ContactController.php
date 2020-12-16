<?php
/**********************************/
/* Created By Jitendra Prajapati  */
/**********************************/

namespace App\Http\Controllers;

use App\Model\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::orderBy("created_at","DESC")->paginate(10);
        return view("admin.contact.list",compact('contacts'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(contact $contact)
    {
        //
    }


    public function edit(contact $contact)
    {
        //
    }


    public function update(Request $request, contact $contact)
    {
        //
    }

    public function destroy(contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('contacts.index')->withSuccess("Contact deleted successfully.!");
        }catch (\Exception $e){
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
