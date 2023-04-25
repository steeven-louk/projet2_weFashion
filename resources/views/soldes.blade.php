@extends('welcome')

@section('content')

    <section class="bg-danger my-3 p-5" style="height: 150px, width:100%">
        <div class="container">
            <h1 class="text-center fw-bold text-uppercase display-2">
                special deal
            </h1>
            <span>limited time offer</span>
        </div>
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
  <div class="mx-auto d-block">{{ $soldes->links() }}</div>  

@endsection
