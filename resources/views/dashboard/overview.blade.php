<!-- @extends('layouts.main')
@include('header')
@section('content') -->
<div class="container-fluid">
  <div class="row">
  <!-- left menu -->
    @include('sidebar')

    <div class="col-11 col-lg-9">

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
                <h1 class="card-title">02</h5>
                <p class="card-text"><a href="#">Controla gli Ordini</a></p>
              </div>
            </div>

            <div class="card text-dark bg-light mb-3 text-center flex-grow-1">
              <div class="card-header">Ordini di Oggi</div>
              <div class="card-body">
                <h1 class="card-title">15</h5>
                <p class="card-text">$376 totali</p>
              </div>
            </div>

            <div class="card text-dark bg-light mb-3 text-center flex-grow-1">
              <div class="card-header">Totali Ordini</div>
              <div class="card-body">
                <h1 class="card-title">345</h5>
                <p class="card-text">$2376 totali</p>
              </div>
            </div>

            <div class="card text-dark bg-light mb-3 text-center flex-grow-1">
              <div class="card-header">Totali Clienti</div>
              <div class="card-body">
                <h1 class="card-title">245</h5>
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

<!-- @endsection
@incluse('footer') -->
