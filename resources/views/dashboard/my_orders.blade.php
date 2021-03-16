@extends('my_layouts.deliveboo')
@section('content')
<div class="container">
  <div class="row">
  {{-- left menu --}}
    @include('dashboard.sidebar')

  {{-- right block --}}
    <div class="col-10">

      <div class="row orders-list d-flex flex-column">
        <h3>Ordini</h3>
        <ul class="d-flex nav-responsive justify-content-between d-lg-none list-inline">
            <li class="list-inline-item">
              <a class="btn btn-primary" href="{{asset('overview')}}">Overview</a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-primary" href="{{asset('my_orders')}}">Ordini</a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-primary" href="{{asset('foods')}}">Prodotti</a>
            </li>
        </ul>
        @if (count($data['orders']) > 0)
          @foreach($data['orders'] as $order)
          {{-- template orders --}}

          {{--closed row--}}
          <div class="col card">
            <div class="card-body d-flex align-items-baseline justify-content-between flex-wrap">
              <ul class="d-flex flex-wrap">
                <li>Ordine n.: <strong>{{$order->id}}</strong></li>
                <li>Cliente: <strong>{{$order->name_customer}}</strong></li>
                <li>Totale: <strong>€{{number_format($order->total_price, 2, '.', ',')}}</strong></li>
                <li>Creato il: <strong>{{$order->created_at->format('d M Y')}}</strong></li>
              </ul>
              <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#collapse{{$order->id}}" aria-expanded="false" aria-controls="collapse{{$order->id}}">Dettagli ordini</button>
              </div>
            </div>
          </div>
          {{--end closed row--}}

          {{-- open row --}}
          <div class="col card collapse" id="collapse{{$order->id}}">
            <div class="card-body d-flex flex-column ">
              <div class="order-details">
                <ul class="d-flex flex-column">
                  <li>Ordine numero: <strong>{{$order->id}}</strong></li>
                  <li>Cliente:<strong> {{$order->name_customer}} </strong>| email:<strong> {{$order->email}} </strong>| Telefono:<strong> {{$order->phone}}</strong></li>
                  <li>Indirizzo di consegna:<strong> {{$order->delivery_address}}</strong></li>
                  <li>Orario di consegna: <strong>{{$order->delivery_time}}h</strong></li>
                  <li>Note: <strong>{{$order->note}}</strong></li>
                  <li>Prodotti:
                      <div class="d-flex flex-column">

                        @foreach($order->getFood as $food)
                          @foreach($data['food'] as $menu)
                            @if($food->id == $menu->id)
                            <span class="order_food_details">{{$food->pivot->quantity}} | {{$menu->name_food}} ({{$menu->id}}) | €{{$menu->price}}</span>
                            @endif
                          @endforeach
                        @endforeach

                      </div>
                  </li>
                  <li>Totale ordini: <strong>€{{number_format($order->total_price, 2, '.', ',')}}</strong></li>
                </ul>
              </div>
              <div class="card-body d-flex flex-row-reverse">
                  <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapse{{$order->id}}" aria-expanded="false" aria-controls="collapse{{$order->id}}">Nascondi dettagli</button>
              </div>
            </div>
          </div>
          {{--end open row--}}
          @endforeach
        @else
           <h5>Il tuo ristorante non ha ancora ricevuto ordini!</h5>
        @endif

      </div>
    </div>
  </div>
</div>
@endsection
