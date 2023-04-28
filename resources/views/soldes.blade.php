@extends('welcome')

@section('content')

    <section class="bg-danger solde mb-5">
        <header class="container">
            <div class="row">
                <div class="col-md-6 left">
                    <h1 class="text-start my-auto text-uppercase">
                        decouvrez les meilleurs produits femme du moment en solde
                    </h1>
                </div>
                <div class="col-md-6 right">
                    <img src="{{ asset('./assets/banners/banner-solde.png') }}" alt="banner">
                </div> 
            </div>
        </header>
    </section>


    <div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
        @foreach ($soldes as $item)
            <div class="card col-md-3 p-0">
                <a href="produit/{{ $item->id }}">
                <div class="state">
                    <span>{{ $item->etat }}</span>
                </div>

                <img class="card-img-top" height="450" src="{{asset('assets/images/' . $item->image)}}" alt="">
                <div class="card-body">
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
  <div class="d-flex align-items-center justify-content-center mt-3">{{ $soldes->links() }}</div>  

@endsection
