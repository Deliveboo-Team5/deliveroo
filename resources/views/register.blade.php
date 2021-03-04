@extends('my_layouts.deliveboo')
@section('content')
<form action="{{ route('register') }}" method="post">
    @csrf
    <div class="mb-4">
        <label for="name" class="">Name</label>
        <input type="text" name="name" id="name" placeholder="Your name">
    </div>

    <div class="mb-4">
        <label for="email" class="">email</label>
        <input type="email" name="email" id="email" placeholder="Your email">
    </div>
    <div class="mb-4">
        <label for="password" class="">Password</label>
        <input type="password" name="password" id="password" placeholder="Your password">
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class=""> confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Your password_confirmation">
    </div>
    <div class="mb-4">
        <label for="name_restaurant" class="">name_restaurant</label>
        <input type="text" name="name_restaurant" id="name_restaurant" placeholder="Your name_restaurant">
    </div>
    <div class="mb-4">
        <label for="img" class="">img</label>
        <input type="text" name="img" id="img" placeholder="Your img">
    </div>
    <div class="mb-4">
        <label for="phone" class="">phone</label>
        <input type="text" name="phone" id="phone" placeholder="Your phone">
    </div>
    <div class="mb-4">
        <label for="address" class="">address</label>
        <input type="text" name="address" id="address" placeholder="Your address">
    </div>
    <div class="mb-4">
        <label for="VAT" class="">vat</label>
        <input type="text" name="VAT" id="VAT" placeholder="Your VAT">
    </div>
    <button type="submit">register</button>
</form>

@endsection