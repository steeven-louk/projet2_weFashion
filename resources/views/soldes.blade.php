@extends('layouts.clientLayout')

@section('content')

    <section class="solde mb-5">
        <header class="px-5">
            <div class="row">
                <div class="col-md-6 left">
                    <p class="text-start my-auto text-uppercase h4">
                        Profitez de nos soldes exceptionnels pour découvrir nos produits de qualité à prix réduits pour hommes et femmes. Trouvez votre prochain article tendance et faites des économies tout en ajoutant une touche de style à votre garde-robe.
                    </p>
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
                    <span>{{ $item->state }}</span>
                </div>

                <img class="card-img-top" height="450" src="{{asset('assets/images/' . $item->image)}}" alt="{{ $item->name }}">
                <div class="card-body">
                    <h4 class="card-title">{{ $item->name }}</h4>
                    <p class="card-text fw-semibold">{{ $item->price }} €</p>
                
                </div>
            </a>
            </div>
            @endforeach
        </div>
        <br>
  <div class="d-flex align-items-center justify-content-center mt-3">{{ $soldes->links() }}</div>  

@endsection
