@extends('layout')

@section('content')
    <div class="row mt-5">
        <form method="get" action="{{route('orders')}}">
            <div class="form-group mt-3">
                <label for="password">Zəhmət olmasa şifrənizi girin</label>
                <input type="password" required name="password" class="form-control @if(session('login') === false) is-invalid @endif" id="password" placeholder="menecer şifrəsi">
                <div class="invalid-feedback">
                   Şifrəniz yalnışdır
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Check</button>
        </form>
    </div>
@endsection
