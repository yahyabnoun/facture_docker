<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalsub=0;
        $tax=3;
        $deliver=58;
        $total=0;
        $commandes = DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->where('commandes.user_id', '=', (Auth::user()->id))
        ->orderBy('datebet', 'desc')
        ->get();
        foreach ($commandes as $commande) {
            $totalsub+=$commande->prixtotal;
        }
        $total=$totalsub-($totalsub*($tax/100))-$deliver;

        return view('home')->with([
            'commandes'=>$commandes,
            'totalsub'=>$totalsub,
            'tax'=>$tax,
            'deliver'=>$deliver,
            'total'=>$total,

        ]);
    }

    public function ajouter() {
        $produits = DB::table('produits')->get();
        return view('ajouter')->with([
            'produits'=>$produits
        ]);


     }
     public function ajouterProduit(Request $request) {
        $produits = DB::table('produits')->where('id', $request->produit_select)->get()[0];
        // return $produits;
        $prix= $produits->produit_prix;
        $prixtotal=$prix * $request->Quntite ;
        // echo $prix.' * '.$request->Quntite.' = '.$prixtotal;
         DB::table('commandes')->insert([
                 'user_id'=>(Auth::user()->id),
                 'produit_id'=>$request->produit_select,
                 'quntite'=>$request->Quntite,
                 'commande_prix'=>$prix,
                 'prixtotal'=>$prixtotal,
                 'datebet'=>now(),


             ]);
             return redirect('home');

     }
     public  function edit($id)
     {
        $commande = DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->where('commandes.user_id', '=', (Auth::user()->id))
        ->where('commandes.commande_id', '=',$id )
        ->get();
         return view('edit')->with([
             'commande'=>$commande
         ]);

     }
     public  function update(Request $request,$id)
    {

        DB::table('commandes')->where('commande_id',$id)->update([
            'quntite'=>$request->Quntite,
            'datebet'=>now()


        ]);
        return redirect('home');

    }

    public function destroy(Request $request) {
        DB::table('commandes')->where('commande_id',$request->id)->delete();
        return redirect('home');


     }
}
