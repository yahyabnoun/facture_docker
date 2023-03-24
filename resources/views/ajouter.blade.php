@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-success mx-3 " ><a style="text-decoration: none"  class="text-light" href="{{url('/home')}}">afficher</a></button>
                    <div class="m-3 col-4" style="margin: auto 10px">
                        <form action="{{route('ajouterProduit')}}" method="post">
                          @csrf
                          <label for="produits">Choose a produit:</label>

                            <select name="produit_select" id="produits">
                                @foreach ($produits as $produit)

                                    <option name="{{$produit->id}}" value="{{$produit->id}}">{{$produit->name_produits}}</option>

                                @endforeach
                            </select>
                            <br>

                          <label for="Quntite">Quntite</label><br>
                          <input type="number" min="1" max="1000" id="Quntite" name="Quntite" class="w-100"><br><br>

                          <input type="submit" value="Submit" class="btn btn-success">
                        </form>
                      </div>

                  </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
