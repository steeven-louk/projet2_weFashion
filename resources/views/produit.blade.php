 @extends('layouts.clientLayout')

 @section('content')
<section class="ProductDetail bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-semibold">
              <li class="breadcrumb-item"><a class="underline" href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
          </nav>
        <div class="row">
            <div class="col-md-6 left">
                <img class="rounded img-fluid" src="{{ asset('assets/images/' .$product->image) }}" alt="{{ $product->name}}">
            </div>
            <div class="col-md-6 right p-5 d-flex flex-column text-start">
                <span class="reference fw-semibold ">référence : <em class="text-uppercase">{{ $product->reference }}</em></span>
                <h1 class="text-capitalize my-3">{{ $product->name}}</h1>
                <span class="fw-semibold prix">{{ $product->price}} €</span>
                <p>{{ $product->description}}</p>
                <div class="form-group d-flex">
                    <button class="btn">add to card</button>
                    
                    <select name="size">
                        <option>Size</option>
                        @foreach ($product->sizes as $item)
                            <option class="text-dark" value="{{ $item->id }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

@endsection
