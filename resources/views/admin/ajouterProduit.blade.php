@extends('layouts.adminLayout')

@section('adminContent')
    <div class="content-wrapper">
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session()->get('message') }}
            </div>
        @endif
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





        <div class="col-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ajouter un produit</h4>

                    <form action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <div class="form-group text-white">
                            <label for="nom">Name</label>
                            <input type="text" name="name" class="form-control text-white" id="nom" placeholder="Name">
                        </div>
                        <div class="form-group text-white">
                            <label for="prix">Price</label>
                            <input type="text" name="price" class="form-control text-white" id="prix" placeholder="Price">
                        </div>
                        <div class="form-group text-white">
                            <label for="reference">Reference</label>
                            <input type="text" name="reference" class="form-control text-white" id="reference"
                                placeholder="Reference">
                        </div>

                        <div class="form-group text-white">
                            <label for="categorie">Categorie</label>
                            <select class="form-control text-white" name="categorie" id="categorie">
                                @foreach ($categorie as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class=" d-block ">
                        </div>
                        <div class="form-group text-white">
                            <label >Sizes</label>
                           
                           <div class="d-flex gap-2 align-items-baseline">
         
                             @foreach($taille as $taille)
                             <label for="{{ $taille->id }}">{{ $taille->name }}</label>
                                 <input type="checkbox" name="tailles[]" id="{{ $taille->id }}" value="{{ $taille->id }}">
                              @endforeach
          
                           </div>
                        </div>
                        <div class="form-group text-white">
                            <label for="etat">State</label>
                            <select class="form-control text-white" name="state" id="etat">

                                <option value="en solde">en solde</option>
                                <option value="standard">standard</option>

                            </select>

                        </div>
                        <div class="form-group text-white">
                            <label for="etat">Status</label>
                            <select class="form-control text-white" name="status" id="statut">

                                <option value="publie">publié</option>
                                <option value="non publie">non publié</option>

                            </select>

                        </div>
                        <div class="form-group text-white">
                            <label for="description">Description</label>
                            <textarea class="form-control text-white" placeholder="description" name="description" id="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-end me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
