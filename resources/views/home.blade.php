@extends('layouts.app')

@section('content')
<div class="page w-sm-100" size="A4">
    <div class="p-5">
        <section class="top-content bb d-flex justify-content-between">
            <div class=" col-7 ">

                <h1>Facture</h1>
            </div>


            <div class="top-left">
                <div class="graphic-path">
                    <p></p>
                </div>
                <div class="position-relative">
                    <p> Facture</p>
                </div>
            </div>
        </section>

        <section class="store-user mt-5">
            <div class="col-10">
                <div class="row bb pb-3">
                    <div class="col-7 me-5 me-sm-4 me-md-5 col-sm-6 col-md-6 col-xl-6">

                        <h2>{{ Auth::user()->name }}</h2>
                        <p class="address"> {{ Auth::user()->adresse }},  </p>
                        <div class="txn mt-2">Tel: {{ Auth::user()->number }}</div>
                    </div>
                    <div class=" border p-3 col-5 col-sm-5 mt-4 ">
                        <h4>Mode de Paiment</h4>
                        <p>Payment Method: <span>cash</span></p>
                         <p> Date: <span>{{now()}}</span></p>

                    </div>



                </div>
                <div class="row extra-info pt-3">
                    <div class="col-7">
                        <h5>gestion des factures</h5>
                        <a class="themeColorBtn btn" style="   text-decoration: none" href ="{{ url('/ajouter') }}">ajouter un command</a>

                    </div>

                </div>
            </div>
        </section>

        <section class="product-area mt-4">
            <table class="table table-hover   ">
                <thead>
                    <tr>

                        <td >Nom</td>
                        <td >Prix</td>
                        <td >Quntite</td>
                        <td >Prix total</td>
                        <td >Date</td>
                        <td  >Actions</td>
                    </tr>
                </thead>
                <tbody>

                        @foreach ($commandes as $commande)
                          <tr>

                              <td>{{$commande->name_produits}}</td>
                              <td>{{$commande->commande_prix}}</td>
                              <td>{{$commande->quntite}}</td>
                              <td>{{$commande->prixtotal}}</td>
                              <td>{{$commande->datebet}}</td>
                              <td >


                                <a class="text-light btn btn-success" style="text-decoration: none" href ='{{route('edit',$commande->commande_id)}}' > <i   class="bi bi-pencil-fill"></i></a>


                                  <a class="text-light btn-danger btn" style="text-decoration: none" href = '{{route('destroy',$commande->commande_id)}}'><i  class="bi bi-trash-fill"></i></a>

                              </td>
                            </tr>

                      @endforeach


                </tbody>
            </table>
        </section>

        <section class="balance-info">
            <div class="row">
                <div class="p-6 col-8">
                    <p class="  mt-5 font-weight-bold"> Note: </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In delectus, adipisci vero est dolore praesentium.</p>
                </div>
                <div class="col-4">
                    <table class="table border-0 table-hover">
                        <tr>
                            <td>Sub Total:</td>
                            <td>{{$totalsub}} DH</td>
                        </tr>
                        <tr>
                            <td>Tax:</td>
                            <td>{{$tax}} DH</td>
                        </tr>
                        <tr>
                            <td>Deliver:</td>
                            <td>{{$deliver}} DH</td>
                        </tr>
                        <tfoot>
                            <tr>
                                <td>Total:</td>
                                <td>{{$total}} DH</td>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- Signature -->
                    <div class="col-12">
                        <img src="signature.png" class="img-fluid" alt="">
                        <p class="text-center m-0"> Director Signature </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cart BG -->
        <img src="cart.jpg" class="img-fluid cart-bg" alt="">

        {{-- <footer>
            <hr>
            <p class="m-0 text-center">
                View THis Invoice Online At - <a href="#!">  </a>
            </p>
            <div class="social pt-3">
                <span class="pr-2">
                    <i class="fas fa-mobile-alt"></i>
                    <span>0123456789</span>
                </span>
                <span class="pr-2">
                    <i class="fas fa-envelope"></i>
                    <span>me@saburali.com</span>
                </span>
                <span class="pr-2">
                    <i class="fab fa-facebook-f"></i>
                    <span>/sabur.7264</span>
                </span>
                <span class="pr-2">
                    <i class="fab fa-youtube"></i>
                    <span>/abdussabur</span>
                </span>
                <span class="pr-2">
                    <i class="fab fa-github"></i>
                    <span>/example</span>
                </span>
            </div> --}}
        </footer>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                    {{-- {{ __('You are logged in!') }} --}}
                    {{-- {{ Auth::user()->name }}   {{ Auth::user()->adresse }} --}}
                    {{-- {{ $commandes }} --}}

                    {{-- <a class="text-light btn-success  btn" style="text-decoration: none" href ="{{ url('/ajouter') }}">ajouter</a> --}}



                  </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
