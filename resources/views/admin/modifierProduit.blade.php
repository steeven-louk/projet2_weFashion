@extends('layouts.adminLayout')

@section('adminContent')

<div class="content-wrapper">
    @if (session()->has('success'))
    <div class="alert alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      {{ session()->get('success') }}
    </div>
@endif

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">modifier un produit</h4>

            <form action="{{ route('update',$Produit->id) }}" method="post" enctype="multipart/form-data" class="forms-sample">
                    @csrf

                <div class="form-group">
                <label for="nom">Name</label>
                <input type="text" name="name" value="{{ $Produit->name }}" class="form-control text-white" id="nom" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="prix">Price</label>
                <input type="text" name="price" class="form-control text-white" value="{{ $Produit->price }}" id="prix" placeholder="Price">
              </div>
              <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" name="reference" class="form-control text-white"  value="{{ $Produit->reference }}" id="reference" placeholder="Reference">
              </div>
              
              <div class="form-group">
                <label for="categorie">Categorie</label>
                  <select class="form-control text-white" name="categorie" id="categorie">
                    @foreach ($categorie as $item)
                        
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>
              </div>
              <div class="form-group  d-flex flex-column">
                <label>Old Image</label>

                <img src="{{ asset('assets/images/' .$Produit->image) }}" height="100" width="80" alt="old image">
              </div>
              <div class="form-group">
                <label>Image</label>
                <input type="file"  value="{{ $Produit->image }}" name="image" class="form-control d-block ">
           
              </div>
              <div class="form-group">
                <label >Sizes</label>
                           
                <div class="d-flex gap-2 align-items-baseline">

                  @foreach($taille as $taille)
                  <label for="{{ $taille->id }}">{{ $taille->name }}</label>
                      <input type="checkbox" name="tailles[]" id="{{ $taille->id }}" value="{{ $taille->id }}">
                   @endforeach

                </div>
              </select>
              </div>
              <div class="form-group">
                <label for="etat">State</label>
                <select class="form-control text-white" name="state" id="etat">
                        
                    <option value="{{ $Produit->state }}">{{ $Produit->state }}</option>
                    <option value="standard">standard</option>
                    <option value="en solde">en solde</option>
                 
                </select>
                
            </div>
            
            <div class="form-group">
                <label for="etat">Status</label>
                <select class="form-control text-white" name="status" id="statut">
                        
                    <option value="publie">publié</option>
                    <option value="non publie">non publié</option>
                 
                </select>                
            </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control text-white" name="description" placeholder="Description"  id="description" rows="4">{{ $Produit->description }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary me-2 float-end">Submit</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection