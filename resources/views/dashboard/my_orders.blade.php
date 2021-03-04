@extends('my_layouts.deliveboo')
@section('content')
<div class="container-fluid">
  <div class="row">
  {{-- left menu --}}
    @include('dashboard.sidebar')

  {{-- right block --}}
    <div class="col-11 col-lg-9">

      <div class="row orders-list d-flex flex-column">
        <h3>Ordini</h3>

        @foreach($data['orders'] as $order)
        {{-- template orders --}}

        {{--closed row--}}
        <div class="col card">
          <div class="card-body d-flex align-items-baseline justify-content-between flex-wrap">
            <ul class="d-flex flex-wrap">
              <li>Ordine n.: <strong>{{$order->id}}</strong></li>
              <li>Cliente: <strong>{{$order->name_customer}}</strong></li>
              <li>Totale: <strong>€{{$order->total_price}}</strong></li>
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
          <div class="d-flex flex-column">
            <div class="order-details">
              <ul class="d-flex flex-column">
                <li>Ordine numero: <strong>{{$order->id}}</strong></li>
                <li>Cliente:<strong> {{$order->name_customer}} </strong>| email:<strong> name@email.com </strong>| Telefono:<strong> {{$order->phone}}</strong></li>
                <li>Indirizzo di consegna:<strong> {{$order->delivery_address}}</strong></li>
                <li>Orario di consegna:<strong> {{$order->delivery_time}}h</strong></li>
                <li>Prodotti:
                    <ul class="d-flex flex-column">

                      @foreach($order->getFood as $food)
                        @foreach($data['food'] as $menu)
                          @if($food->id == $menu->id)
                          <li>{{$food->pivot->quantity}} | {{$menu->name_food}} ({{$menu->id}}) | €{{$menu->price}}</li>
                          @endif
                        @endforeach
                      @endforeach

                    </ul>
                </li>
                <li>Totale ordini:<strong> €{{$order->total_price}}</strong></li>
              </ul>
            </div>
            <div class="card-body d-flex align-items-baseline justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapse{{$order->id}}" aria-expanded="false" aria-controls="collapse{{$order->id}}">Nascondi dettagli</button>
            </div>
          </div>
        </div>
        {{--end open row--}}
        @endforeach


      </div>
    </div>
  </div>
</div>
@endsection
