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


<section class="ProductDetail">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-semibold">
              <li class="breadcrumb-item"><a class="underline" href="/">Home</a></li>
              <li class="breadcrumb-item"><a class="underline" href="/produit">Produit</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $product->nom }}</li>
            </ol>
          </nav>
        <div class="row">
            <div class="col-md-6 left">
                <img class="rounded img-fluid" src="{{ asset('assets/images/' .$product->image) }}" alt="{{ $product->nom}}">
            </div>
            <div class="col-md-6 right p-5 d-flex flex-column text-start">
                <span class="reference fw-semibold ">référence : <em class="text-uppercase">{{ $product->reference }}</em></span>
                <h1 class="text-capitalize my-3">{{ $product->nom}}</h1>
                <span class="fw-semibold prix">{{ $product->prix}}$</span>
                <p>{{ $product->description}}</p>
                <div class="form-group d-flex">
                    <button class="btn">add to card</button>
                    
                    <select name="size">
                        <option>Size</option>
                        @foreach ($tailles as $item)
                            <option value="{{ $item->id }}">{{ $item->tailles }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
    @include('components.footer')
</body>
</html>