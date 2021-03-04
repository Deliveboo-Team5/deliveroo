@extends('my_layouts.deliveboo')
@section('content')
<div class="container-fluid">
  <div class="row">
  <!-- left menu -->
    @include('dashboard.sidebar')

    <div class="col-11 col-lg-9 dashboard-main">

      <!-- orders received -->
      <div class="row dashboard d-flex flex-column">
        <div class="col">
          <h3>Dashboard</h3>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-between flex-wrap">
            <div class="card text-dark bg-light mb-3 text-center flex-grow-1">
              <div class="card-header">Nuovi Ordini</div>
              <div class="card-body">
                <h1 class="card-title">Sei bellissimo</h5>
                <p class="card-text"><a href="#">Controla gli Ordini</a></p>
              </div>
            </div>

            <div class="card text-dark bg-light mb-3 text-center flex-grow-1">
              <div class="card-header">Ordini di Oggi</div>
              <div class="card-body">
                <h1 class="card-title">{{$data['day_order']}}</h5>
                <p class="card-text">{{$data['daily_earnings']}}€ totali</p>
              </div>
            </div>

            <div class="card text-dark bg-light mb-3 text-center flex-grow-1">
              <div class="card-header">Totali Ordini</div>
              <div class="card-body">
                <h1 class="card-title">{{$data['total_order']}}</h5>
                <p class="card-text">{{$data['total_earnings']}}€ totali</p>
              </div>
            </div>

            <div class="card text-dark bg-light mb-3 text-center flex-grow-1">
              <div class="card-header">Totali Clienti</div>
              <div class="card-body">
                <h1 class="card-title">{{$data['total_customer']}}</h5>
                  <p class="card-text"><a href="#">Statistiche Clienti</a></p>
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col stat-data d-flex justify-content-center align-items-center">
            <h1>Image with general view of statistics data</h1>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>

@endsection
