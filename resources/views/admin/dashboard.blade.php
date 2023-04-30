@extends('layouts.adminLayout')

@section('adminContent')
    <div class="content-wrapper">

        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $getWomenProductCount }}</h3>
                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal">Total de produit pour femme</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $getMenProductCount }}</h3>
                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal">Total de produit pour homme</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ $getProdoductSoldCount }}</h3>
                                </div>
                            </div>

                        </div>
                        <h6 class="text-muted font-weight-normal">Total de solde pour homme</h6>
                    </div>
                </div>
            </div>
           
        </div>

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
                        <h4 class="card-title">Produits</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> id</th>
                                        <th> Name </th>
                                        <th> Price </th>
                                        <th> Image </th>
                                        <th> Status </th>
                                        <th> State </th>
                                        <th> Reference </th>
                                        <th colspan="2"> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td> {{ $item->id }}</td>
                                            <td> {{ $item->name }}</td>
                                            <td> {{ $item->price }} €</td>
                                            <td> {{ $item->image }}</td>
                                            <td> {{ $item->status }} </td>
                                            <td> {{ $item->state }} </td>
                                            <td> {{ $item->reference }} </td>
                                            <td>
                                                <a href="{{ route('edit', $item->id) }}"
                                                    class="badge badge-outline-success">Editer</a>
                                            </td>
                                            <td>
                                              <button class="badge badge-outline-danger" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">delete</button>
                                                    <!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir supprimer ce produit ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <form method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{  $data->links() }} --}}
        </div>
    </div>
@endsection
