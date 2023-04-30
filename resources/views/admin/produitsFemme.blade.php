@extends('layouts.adminLayout')

@section('adminContent')

<div class="content-wrapper">
           
  <div class="row ">
    <div class="col-12 grid-margin">
        @if (session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          {{ session()->get('message') }}
        </div>
    @endif
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produits Femme</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Nom </th>
                  <th> Prix </th>
                  <th> Image </th>
                  <th> Statut </th>
                  <th> Etat </th>
                  <th> Reference </th>
                  <th> Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($produitFemme as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td> {{ $item->nom }} </td>
                <td> {{ $item->prix }} €</td>
                <td> {{ $item->image }}</td>
                <td> {{ $item->statut }} </td>
                <td> {{ $item->etat }} </td>
                <td> {{ $item->reference }} </td>
                <td>
                  <a href="{{ route('edit', $item->id) }}"
                      class="badge badge-outline-success">Editer</a>
              </td>
                <td><a href="{{ route('admin.produitsDelete', $item->id) }}" class="badge badge-outline-danger">supprimer</a></td>
              </tr>
              @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{ $produitFemme->links() }}
  </div>  
@endsection