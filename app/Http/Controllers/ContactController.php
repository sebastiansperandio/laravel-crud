<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\Relations;

class ContactController extends Controller
{
    /**
     * give a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::with('phones')->get()->toArray();
        //$contacts = Contact::all();
        return response($contacts, 201);
	    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        return view('frontend.contact.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.contact.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $fields = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|unique:contacts,email',
        ]);
        
        
        $contact = Contact::create([
            'name' => $fields['name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
        ]);
        
        if(count($request->phones) > 0){
            $phones = [];
            foreach ($request->phones as $phone){
                $phones[]= new Phone(['phone' => $phone]);
            }
            $contact->phones()->saveMany($phones);
        }
        return response(['message' => 'ok'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Contact::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $fields = $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
        ]);

        $contact = Contact::find($id);
        
        $contact->update([
            'name' => $fields['name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
        ]);

        $newPhones=[];
        foreach ($request->phones as $phone){
            if( !is_null($phone['phone'])){
                $phoneEntity = Phone::find($phone['id']);
                if($phoneEntity){
                    $phoneEntity->update([
                        "phone" => $phone['phone']
                    ]);
                }else{
                    $newPhones[] = new Phone(['phone' => $phone['phone']]);
                }
            }
        }
        if(count($newPhones) > 0){
            $contact->phones()->saveMany($newPhones);
        }

        return response(['message' => 'ok'], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Contact::destroy($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $contact = Contact::with('phones')->where('contacts.id',$id)->get()->first();
        return view('frontend.contact.edit', compact('contact'));
    }

    /**
     * get info of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {   
        $contact = Contact::with('phones')->where('contacts.id',$id)->get()->first();
        return response($contact, 201);
    }
    
}
