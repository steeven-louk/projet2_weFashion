
@extends('welcome')

@section('content')
    

<section class="homePage">
    <header class="">
        <h1 class=" mx-auto fw-semibold text-uppercase">
            we know how large objects will act, but things on a small scale just do not act that way.
        </h1>
        <button class="btn btn-outline-success text-uppercase">shop now</button>
    </header>
    <span class="result my-3 text-capitalize text-end pe-5 d-block">result({{ $product->count()}})</span>

    <div class="articleContainer px-2">
        <div class="card-deck row gap-4 mx-auto justify-content-center align-items-center">
            @foreach ($product as $item)
                <div class="card col-md-3 p-0">
                    <a href="produit/{{ $item->id }}">
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
      <div class="mx-auto d-block">{{ $product->links() }}</div>  
    </div>
</section>


@endsection