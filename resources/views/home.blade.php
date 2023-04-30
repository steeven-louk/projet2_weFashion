@extends('layouts.clientLayout')

@section('content')
    <section class="homePage">
        <header>
            <h1 class=" mx-auto fw-semibold text-uppercase">
                Profitez d'une expérience de shopping en ligne exceptionnelle avec des prix
                compétitifs, une livraison rapide et un service client disponible pour répondre à toutes vos questions.
            </h1>
            <button href="#produit" class="btn btn-outline-success text-uppercase">shop now</button>
        </header>
        <span class="result my-3 text-capitalize text-end pe-5 d-block">result({{ $product->count() }})</span>

        <div class="articleContainer px-2">
            <div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
                @foreach ($product as $item)
                    <div class="card col-md-3 p-0" id="produit">
                        <a href="produit/{{ $item->id }}">
                            <img class="card-img-top" height="450" src="{{ asset('assets/images/' . $item->image) }}"
                                alt="{{ $item->name }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->name }}</h4>
                                <p class="card-text fw-semibold">{{ $item->price }} €</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex align-items-center justify-content-center mt-5">{{ $product->links() }}</div>
        </div>
    </section>
@endsection
