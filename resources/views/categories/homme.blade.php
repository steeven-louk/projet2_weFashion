@extends('welcome')

@section('content')
 
<section class="homme mb-5">

    <header class="px-5">
        <div class="row">
            <div class="col-md-6 left justify-center d-flex align-content-center">
                <p class="text-start my-auto text-uppercase">
                    Adoptez un style élégant avec notre nouvelle collection de chemises pour homme. Fabriquées avec des matériaux de haute qualité, nos chemises sont parfaites pour le bureau ou une soirée décontractée. Découvrez notre gamme de couleurs et motifs pour trouver la chemise parfaite pour vous. À partir de $49,99 seulement.
                </p>
            </div>
            <div class="col-md-6 right">
                <img src="{{ asset('./assets/banners/banner-homme.png') }}" class="img-fluid" width="100%" alt="banner">
            </div> 
        </div>
    </header>
</section>

<span class="result my-3 text-capitalize text-end pe-5 d-block">result({{ $produitsHomme->count()}})</span>

<div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
    @foreach ($produitsHomme as $item)
        <div class="card col-md-3 p-0">
            <a href="produit/{{ $item->id }}">
            <img class="card-img-top " height="450" src="{{asset('assets/images/' . $item->image)}}" alt="">
            <div class="card-body">
                <h4 class="card-title">{{ $item->nom }}</h4>
                <p class="card-text fw-semibold">{{ $item->prix }} €</p>
            </div>
        </a>
        </div>
        @endforeach
</div>
    <br>
<div class="d-flex align-items-center justify-content-center mt-5">{{ $produitsHomme->links() }}</div> 

@endsection