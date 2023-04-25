<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('modules._module')

</head>
<body>
    @include('components.navbar')


<section>
    <div class="container">
        <div class="my-2  text-uppercase fw-semibold"><span><a href="/">home</a> / produit/ {{ $product->nom}}</span></div>

        <div class="row">
            <div class="col-md-6">
                <img class="rounded img-fluid" src="{{ asset('assets/images/' .$product->image) }}" alt="{{ $product->nom}}">
            </div>
            <div class="col-md-6 justify-content-center align-items-center d-flex flex-column text-start">
                <h1 class="text-capitalize">{{ $product->nom}}</h1>
                <span class="fw-semibold">{{ $product->prix}}$</span>
                <p>{{ $product->description}}</p>
                <button class="btn btn-primary">add to cart</button>
            </div>
        </div>
    </div>
</section>
    @include('components.footer')
</body>
</html>