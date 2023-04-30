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
                <input type="text" name="name" value="{{ $Produit->nom }}" class="form-control" id="nom" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="prix">Price</label>
                <input type="text" name="price" class="form-control" value="{{ $Produit->prix }}" id="prix" placeholder="Price">
              </div>
              <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" name="reference" class="form-control"  value="{{ $Produit->reference }}" id="reference" placeholder="Reference">
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
                <input type="file"  value="{{ $item->image }}" name="image" class=" d-block ">
                <div class="input-group col-xs-12">
                  <input type="text" name="image[]" class="form-control file-upload-info"  placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="tailles">Size</label>
                <select class="form-control" name="taille" id="tailles">
                  @foreach ($taille as $item)
                      
                  <option value="{{ $item->id }}">{{ $item->tailles }}</option>
                  @endforeach
               
              </select>
              </div>
              <div class="form-group">
                <label for="etat">State</label>
                <select class="form-control" name="state" id="etat">
                        
                    <option value="{{ $Produit->etat }}">{{ $Produit->etat }}</option>
                    <option value="standard">standard</option>
                    <option value="en solde">en solde</option>
                 
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
                <textarea class="form-control" name="description" placeholder="Description"  id="description" rows="4">{{ $Produit->description }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary me-2">Submit</button>
              <button class="btn btn-dark">Cancel</button>
            </form>
          </div>
        </div>
      </div>
</div>

@endsection