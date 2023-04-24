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

<span class="my-5">home/produit/habit 15</span>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/femmes/1.jpg') }}" alt="">
            </div>
            <div class="col-md-6 justify-content-center align-items-center d-flex flex-column text-start">
                <h1 class="text-capitalize">T-SHIRT nom du produit</h1>
                <span class="fw-semibold">40.00$</span>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque consectetur ipsa iste quas sunt quisquam facere eveniet voluptatibus minus voluptatum.</p>
                <button class="btn btn-primary">add to cart</button>
            </div>
        </div>
    </div>
</section>
    @include('components.footer')
</body>
</html>