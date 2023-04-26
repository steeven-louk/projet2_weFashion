
@extends('welcome')

@section('content')
    

<section class="homePage">
    <header class="">
        <h1 class=" mx-auto fw-semibold text-uppercase">
            we know how large objects will act, but things on a small scale just do not act that way.
        </h1>
        <button href="#produit" class="btn btn-outline-success text-uppercase">shop now</button>
    </header>
    <span class="result my-3 text-capitalize text-end pe-5 d-block">result({{ $product->count()}})</span>

    <div class="articleContainer px-2">
        <div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
            @foreach ($product as $item)
                <div class="card col-md-3 p-0" id="produit">
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
            <div class="d-flex align-items-center justify-content-center mt-5">{{ $product->links() }}</div> 
        </div>
</section>


@endsection