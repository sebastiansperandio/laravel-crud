@extends('frontend.layouts.app')

@section('title', __('Contact list'))

@section('content')
@if($errors->has('email'))
    <span class="error">{{ $errors->get('email') }}</span>
@endif
<div class="container">
  <legend class="mt-5 mb-2">Edit Contact</legend>
  <form action="" id="create_form">
    <input type="hidden" name="user_id" id="user-id" data-user-id="{{ $contact->id }}">
    <div class="form-group">  
      <label for="name">Name</label>  
      <input type="text" name="name" class="form-control" value="{{ isset($contact->name) ? $contact->name : old('name') }}" id="name" >
    </div>

    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" class="form-control" value="{{ isset($contact->last_name) ? $contact->last_name : old('last_name') }}" id="last_name" >
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control" value="{{ isset($contact->email) ? $contact->email : old('email') }}" id="email" >
    </div>

    <div class="form-group">
      <label for="phone1">Phone 1</label>
      <input type="text" name="phones.0.phone" data-phone-id="{{ isset($contact->phones[0]->id) ? $contact->phones[0]->id : 0 }}" class="form-control" value="{{ isset($contact->phones[0]->phone) ? $contact->phones[0]->phone : old('phone') }}" id="phone1" >
    </div>
    <div class="form-group">
      <label for="phone2">Phone 2</label>
      <input type="text" name="phones.1.phone" data-phone-id="{{ isset($contact->phones[1]->id) ? $contact->phones[1]->id : 0 }}" class="form-control" value="{{ isset($contact->phones[1]->phone) ? $contact->phones[1]->phone : old('phone') }}" id="phone2" >
    </div>
    <div class="form-group">
      <label for="phone3">Phone 3</label>
      <input type="text" name="phones.2.phone" data-phone-id="{{ isset($contact->phones[2]->id) ? $contact->phones[2]->id : 0 }}" class="form-control" value="{{ isset($contact->phones[2]->phone) ? $contact->phones[2]->phone : old('phone') }}" id="phone3" >
    </div>
    
    <button type="submit" class="btn btn-primary" id="btn-create">EDIT</button>

  </form>
</div>
@endsection
@push('scripts')
  <script src="{{ mix('js/edit_contact.js') }}" type="module"></script> 
@endpush