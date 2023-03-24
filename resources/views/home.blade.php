@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    {{ Auth::user()->name }}   {{ Auth::user()->adresse }}
                    {{-- {{ $commandes }} --}}

                    <a class="text-light btn-success  btn" style="text-decoration: none" href ="{{ url('/ajouter') }}">ajouter</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th >id</th>
                            <th >Nom</th>
                            <th >Prix</th>
                            <th >Quntite</th>
                            <th >Prix total</th>
                            <th >Date</th>
                            <th  >Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                      @foreach ($commandes as $commande)
                          <tr>

                              <td>{{$commande->commande_id}}</td>
                              <td>{{$commande->name_produits}}</td>
                              <td>{{$commande->commande_prix}}</td>
                              <td>{{$commande->quntite}}</td>
                              <td>{{$commande->prixtotal}}</td>
                              <td>{{$commande->datebet}}</td>
                              <td >
                                  <a class="text-light btn btn-success" style="text-decoration: none" href ='{{route('edit',$commande->commande_id)}}' >modifier</a>


                                  <a class="text-light btn-danger btn" style="text-decoration: none" href = '{{route('destroy',$commande->commande_id)}}'>Delete</a>
                              </td>
                                                          {{-- <td>
                                  <a class="text-light btn btn-success" style="text-decoration: none" href ='{{route('edit',$stagiaire->id)}}'>modifier</a>
                                <form action="delete/{{ $stagiaire->id }}" method="POST">
                                    @method('delete')
                                  <a class="text-light btn-danger btn" style="text-decoration: none" href = '{{route('destroy',$stagiaire->id)}}'>Delete</a>
                                </form>
                              </td> --}}
                            </tr>

                      @endforeach
                  </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
