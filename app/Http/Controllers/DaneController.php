<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class DaneController extends Controller
{
    public function index(){

        $data=Person::all();
        return view('dane',['data'=>$data]);
    }

    public function zaplacone(){

        $data=Person::where('zaplata',1)->get();
        return view('dane',['data'=>$data]);
    }
    public function dodane_2019()
    {
      $data=Person::where("dodano",2019)->get();
      return view('dane',['data'=>$data]);
    }

    public function dodane_2020()
    {
      $data=Person::where('dodano',2020)->get();
      return view('dane',['data'=>$data]);
    }

    public function add(Request $request){

      $data=["imie"=>$request->input('imie'),
             "nazwisko"=>$request->input('nazwisko'),
             "wiek"=>$request->input('wiek'),
             "email"=>$request->input('email'),
             "plec"=>$request->input('plec'),
             "dodano"=>$request->input('dodano'),
             "zaplata"=>$request->input('zaplata'),
             "komentarz"=>$request->input('komentarz')];
      Person::create($data);
      return  redirect('dane');
        
    }

    public function person($id)
    {
      $data=Person::find($id);;

      return view('person',['data'=>$data]);
    }

    public function edit(Request $request){

      $data=['zaplata'=>$request->zaplata,
             'imie'=>$request->imie,
             'nazwisko'=>$request->nazwisko,
             'email'=>$request->email,
             'wiek'=>$request->wiek,
             'plec'=>$request->plec,
             'dodano'=>$request->dodano,
             'komentarz'=>$request->komentarz];
      Person::where('id',$request->id)->update($data);
      echo $request->id;
    }
    public function delete(Request $request){

      Person::where('id',$request->id)->delete();
      echo $request->id;

    }
}
