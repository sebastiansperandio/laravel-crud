@extends('frontend.layouts.app')

@section('title', __('Contact list'))

@section('content')
@if($errors->has('email'))
    <span class="error">{{ $errors->get('email') }}</span>
@endif
<div class="container">
  <legend class="mt-5 mb-2">Create new Contact</legend>
  <form action="" id="create_form">
    
    <div class="form-group">  
      <label for="name">Name</label>  
      <input type="text" name="name" class="form-control" id="name" >
    </div>

    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" name="last_name" class="form-control" id="last_name" >
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name="email" class="form-control" id="email" >
    </div>

    <div class="form-group">
      <label for="phone1">Phone 1</label>
      <input type="text" name="phones.0.phone" class="form-control" id="phone1" >
    </div>
    <div class="form-group">
      <label for="phone2">Phone 2</label>
      <input type="text" name="phones.1.phone" class="form-control" id="phone2" >
    </div>
    <div class="form-group">
      <label for="phone3">Phone 3</label>
      <input type="text" name="phones.2.phone" class="form-control" id="phone3" >
    </div>
    
    <button type="submit" class="btn btn-primary" id="btn-create">CREATE</button>

  </form>
</div>
@endsection
@push('scripts')
  <script src="{{ mix('js/create_contact.js') }}" type="module"></script> 
@endpush