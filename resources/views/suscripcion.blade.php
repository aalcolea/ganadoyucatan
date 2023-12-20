@extends('layout')

@section('content')
<div class="productTienda-section">
    <div class="container-product--Main">
        <div class="route">
            <p>Inicio<span>></span><p>Suscripción</p>
        </div>
        <div class="container-payment">
            <div class="container-vaquita">
                <p>Ganadero, estás a un paso de formar parte de esta plataforma y comenzar a ganar</p>
                <img src="{{url('/static/new/iconos/vecteezy_cow-png-with-ai-generated_24589338_145.png')}}" alt="">
            </div>
            <div class="suscription">
                <p>Suscripción</p>
                <p> $199.00</p>
            </div>
            <div class="payment-detail">
                <p style="margin: 1rem 0rem;">Detalles de pago</p>
                <p>Depósito en OXXO:</p>
                <hr>
                <div class="card-details">
                    <img width="100" height="100" src="https://img.icons8.com/ios/100/bank-card-back-side--v1.png" alt="bank-card-back-side--v1"/>
                    <p style="font-weight: bold;">4217-4700-0525-7791</p>
                </div>
                <hr>
                <p>Transferencias:</p>
                <hr>
                <div class="card-details">
                    <img width="100" height="100" src="https://img.icons8.com/ios/100/cell-phone.png" alt="cell-phone"/>
                    <div style="width: 100%;">
                        <p style="font-weight: bold;">646910146401888213</p>
                        <p>CLABE Interbancaria</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

@endsection