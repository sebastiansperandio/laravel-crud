@extends('frontend.layouts.app')

@section('title', __('Contact list'))

@section('content')
<div class="container">
  <div class="row">
    <a href="{{ url('contact/create') }}" class="btn btn-primary mt-5 mb-2"><i class="fa fa-plus"></i> CONTACT</a>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-bordered mb-0">
        <thead class="thead-dark">
          <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phones</th>
            <th>Actions</th>
          </tr>
          </thead>
          <tbody id="table-body">
          <!-- Contacts -->
          </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="contactIndoModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="contactIndoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="contact-name"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contact-info">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Listo</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
  <script src="{{ mix('js/list_contacts.js') }}" type="module"></script> 
  <script src="{{ mix('js/actions_functions.js') }}" type="module"></script> 
@endpush

