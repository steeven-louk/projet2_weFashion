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

    <section class="bg-danger my-3 p-5" style="height: 150px, width:100%">
        <div class="container">
            <h1 class="text-center text-uppercase">
                decouvrez les meilleurs produits du moment en solde
            </h1>
        </div>
    </section>


    @include('components.card')


    @include('components.footer')
</body>
</html>