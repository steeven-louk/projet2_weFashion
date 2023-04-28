@extends('welcome')

@section('content')
 
<section class="femme bg-danger">
    <header class="container">
        <div class="row">
            <div class="col-md-6 left">
                <h1 class="text-start my-auto text-uppercase">
                    decouvrez les meilleurs produits femme du moment en solde
                </h1>
            </div>
            <div class="col-md-6 right">
                <img src="{{ asset('./assets/banners/banner-femme.png') }}" alt="">
            </div> 
        </div>
    </header>
</section>
<span class="result my-3 text-capitalize text-end pe-5 d-block">result({{ $produitsFemme->count()}})</span>


<div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
    @foreach ($produitsFemme as $item)
        <div class="card col-md-3 p-0">
            <a href="produit/{{ $item->id }}">
            <img class="card-img-top" height="450" src="{{asset('assets/images/' . $item->image)}}" alt="">
            <div class="card-body">
                <h4 class="card-title">{{ $item->nom }}</h4>
                <p class="card-text fw-semibold">{{ $item->prix }} €</p>
                
            </div>
        </a>
        </div>
        @endforeach
    </div>
    <br>
    <div class="d-flex align-items-center justify-content-center mt-5">{{ $produitsFemme->links() }}</div> 

@endsection