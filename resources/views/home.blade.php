
@extends('welcome')

@section('content')
    

<div class="container">
    <header class="p-5 bg-success">
        <h1 class="display-2 mx-auto fw-semibold text-uppercase">ceci est le header du site de vente</h1>
    </header>
    <span class="result my-3 text-capitalize text-end d-block">result({{ $product->count()}})</span>

    <div class="articleContainer px-2">
        <div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
            @foreach ($product as $item)
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
      <div class="mx-auto d-block">{{ $product->links() }}</div>  
    </div>
</div>


@endsection