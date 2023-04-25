@extends('welcome')

@section('content')
 
<section class="bg-danger my-3 p-5" style="height: 150px, width:100%">
    <div class="container">
        <h1 class="text-center text-uppercase">
            decouvrez les meilleurs produits femme du moment en solde
        </h1>
    </div>
</section>
<span class="result my-3 text-capitalize text-end d-block">result({{ $produitsFemme->count()}})</span>


<div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
    @foreach ($produitsFemme as $item)
        <div class="card col-md-3 p-0">
            <a href="produit/{{ $item->id }}">
            <img class="card-img-top objectFit-cover" height="450" src="{{asset('assets/images/' . $item->image)}}" alt="">
            <div class="card-body bg-secondary">
                <h4 class="card-title">{{ $item->nom }}</h4>
                <p class="card-text fw-semibold">{{ $item->prix }} €</p>
                <ul class="nav gap-3">
                    <li class="p-2 rounded text-semibold bg-danger"><span>{{ $item->tailles }}</span></li>
                </ul>
            </div>
        </a>
        </div>
        @endforeach
    </div>
    <br>
<div class="mx-auto d-block">{{ $produitsFemme->links() }}</div>  

@endsection