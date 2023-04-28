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
                <h3 class="mb-0">$12.34</h3>
                <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Potential growth</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$17.34</h3>
                <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Revenue current</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$12.34</h3>
                <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-danger">
                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Daily Income</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$31.53</h3>
                <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Expense current</h6>
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
              @foreach ($data as $item)
              <tr>
                <td>{{ $item->id }}</td>
                <td>
                  {{ $item->nom }}
                </td>
                <td> {{ $item->prix }} $</td>
                <td> {{ $item->image }}</td>
                <td> {{ $item->statut }} </td>
                <td> {{ $item->etat }} </td>
                <td> {{ $item->reference }} </td>
                <td>
                  <div class="badge badge-outline-success">Editer</div>
                </td>
                <td><a href="{{ route('admin.produitsDelete', $item->id) }}" class="badge badge-outline-danger">supprimer</a> </td>
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