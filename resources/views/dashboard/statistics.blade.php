@extends('my_layouts.deliveboo')
@section('content')
<div class="container-fluid">
    <div class="row">
    <!-- left menu -->
      @include('dashboard.sidebar')

      <div class="col-11 col-lg-9">

        <h4>Pagina in costruzione</h4>
        <canvas id="bar-chart" width="400" height="400"></canvas>



      </div>
    </div>
  </div>

  @endsection
