@extends('layouts.deliveboo')
@section('content')
<div class="container-fluid">
  <div class="row">
  {{-- left menu --}}
    @include('dashboard.sidebar')

  {{-- right block --}}
    <div class="col-11 col-lg-9">

      <div class="row orders-list d-flex flex-column">
        <h3>Piatti</h3>
        <button type="button" class="btn btn-primary">New</button>


        {{-- template foods --}}

        <div class="col card">
          <div class="card-body d-flex align-items-baseline justify-content-between flex-wrap">
            <ul class="d-flex flex-wrap">
              <li>ID: <strong>01</strong></li>
              <li>Nome: <strong>Piatto </strong></li>
              <li>Prezzo: <strong>€10</strong></li>
            </ul>
            <div>
              <button type="button" class="btn btn-primary">Details</button>
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
@endsection
