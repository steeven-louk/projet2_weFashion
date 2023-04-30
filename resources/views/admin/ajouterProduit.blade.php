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

                    <form action="{{ route('create') }}" method="post" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label for="nom">Name</label>
                            <input type="text" name="name" class="form-control" id="nom" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="prix">Price</label>
                            <input type="text" name="price" class="form-control" id="prix" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="reference">Reference</label>
                            <input type="text" name="reference" class="form-control" id="reference"
                                placeholder="Reference">
                        </div>

                        <div class="form-group">
                            <label for="categorie">Categorie</label>
                            <select class="form-control" name="categorie" id="categorie">
                                @foreach ($categorie as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class=" d-block ">
                            <div class="input-group col-xs-12">
                                <input type="text" name="image[]" class="form-control file-upload-info"
                                    placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Sizes</label>
                           
                           <div class="d-flex gap-2 align-items-baseline">
         
                             @foreach($taille as $taille)
                             <label for="{{ $taille->id }}">{{ $taille->name }}</label>
                                 <input type="checkbox" name="tailles[]" id="{{ $taille->id }}" value="{{ $taille->id }}">
                              @endforeach
                        {{-- @endforeach --}}
          
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="etat">State</label>
                            <select class="form-control" name="state" id="etat">

                                <option value="en solde">en solde</option>
                                <option value="standard">standard</option>

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="etat">Status</label>
                            <select class="form-control" name="status" id="statut">

                                <option value="publie">publié</option>
                                <option value="non publie">non publié</option>

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" placeholder="description" name="description" id="description" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
