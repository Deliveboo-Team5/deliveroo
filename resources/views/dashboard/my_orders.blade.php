@extends('layouts.main')
@section('content')
<div class="container-fluid">
  <div class="row">
  <!-- left menu -->
    @include('dashboard.sidebar')

    <div class="col-11 col-lg-9">

      <!-- orders received -->
      <div class="row orders-list d-flex flex-column">
        <h3>Nuovi ordini</h3>

        <!-- template new orders -->

        <!-- open row -->

        <div class="col card">
          <div class="d-flex flex-column">
            <div class="card-body d-flex align-items-baseline justify-content-end">
                <button type="button" class="btn btn-secondary">Nascondi detagli</button>
            </div>
            <div class="order-details">
              <ul class="d-flex flex-column">
                <li>Ordine numero: <strong>01</strong></li>
                <li>Cliente:<strong> Name </strong>| email:<strong> name@email.com </strong>| Telefono:<strong> 63536373737</strong></li>
                <li>Indirizzo di consegna:<strong> Address, 2, City, etc</strong></li>
                <li>Orario di consegna:<strong> 17.00</strong></li>
                <li>Prodotti:
                    <ul class="d-flex flex-column">
                      <li><strong>1x | Product Name (id) | $8.00 </strong></li>
                      <li><strong>3x | Product Name (id) | $24.00 </strong></li>
                      <li><strong>2x | Product Name (id) | $16.00 </strong></li>
                      <li><strong>1x | Product Name (id) | $8.00 </strong></li>
                    </ul>
                </li>
                <li>Totale ordini:<strong> $56.00</strong></li>

                <li>Extra: <br>
                <strong>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </strong>
              </li>
              </ul>
            </div>
            <div class="card-body d-flex align-items-baseline justify-content-end">
                <button type="button" class="btn btn-primary">In preparazione</button>
            </div>

          </div>
        </div>

        <!-- closed row -->
        <div class="col card">
          <div class="card-body d-flex align-items-baseline justify-content-between">
            <ul>
              <li>01</li> <!-- id in orders -->
              <li>Name Here</li> <!-- customer's name in orders -->
              <li>Address</li> <!-- customer's address in orders -->
            </ul>
            <div>
              <button type="button" class="btn btn-secondary">Detagli ordini</button>
              <button type="button" class="btn btn-primary">In preparazione</button>
            </div>
          </div>
        </div>

      </div>

      <!-- orders preparation progress -->
      <div class="row orders-list d-flex flex-column">
        <h3>Ordini in Preparazione</h3>

        <!-- template new orders -->
        <div class="col card">
          <div class="card-body d-flex align-items-baseline justify-content-between">
            <ul>
              <li>01</li> <!-- id in orders -->
              <li>Name Here</li> <!-- customer's name in orders -->
              <li>Address</li> <!-- customer's address in orders -->
            </ul>
            <div>
              <button type="button" class="btn btn-secondary">Detagli ordini</button>
              <button type="button" class="btn btn-primary">In consegna</button>
            </div>
          </div>
        </div>
      </div>

      <!-- orders in delivey -->
      <div class="row orders-list d-flex flex-column">
        <h3>Ordini in consegna</h3>

        <!-- template new orders -->
        <div class="col card">
          <div class="card-body d-flex align-items-baseline justify-content-between">
            <ul>
              <li>01</li> <!-- id in orders -->
              <li>Name Here</li> <!-- customer's name in orders -->
              <li>Address</li> <!-- customer's address in orders -->
            </ul>
            <div>
              <button type="button" class="btn btn-secondary">Detagli ordini</button>
              <button type="button" class="btn btn-danger">Rider Name</button>
            </div>
          </div>
        </div>


      </div>



    </div>
  </div>
</div>

@endsection
