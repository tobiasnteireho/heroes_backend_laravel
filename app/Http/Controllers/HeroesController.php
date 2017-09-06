<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HeroesController extends Controller
{
    //
    public function index(){
      return Hero::all();
    }

    public function show($hero){

      return Hero::findorFail($hero);
    }

    // TODO: Everything below either needs csrf protection or auth guard.

    public function create(Request $req, $name){
      //NOTE: Just like django
      $hero = new Hero();
      $hero->name = $name;
      $hero->save();

      return response()->json($hero, 201);
    }

    public function update(Request $req, $id){

      $hero = Hero::find($id);
      $reqBody = $req->json()->all();
      if ($hero)
        $hero->name = $reqBody['name'];
      else{
        $hero = new Hero();
        $hero->id = $id;
        $hero->name = $reqBody['name'];
      }

      $hero->save();

      return response()->json($hero, 200); //This is not super clean... but does work
                                          //maybe try catch block?
    }

    public function delete(Request $req, $id){

      $hero = Hero::findorFail($id);
      if ($hero)
        $hero->delete();

      return response()->json($hero, 204); //This is not super clean... 1
                                          //maybe try catch block?


    }


}


//TODO: Why doesn't implicit modeling (below) work?
//At least above is like django
// NOTE: don't need to save model? Automagic updates to db? That's nice.

/*
class HeroesController extends Controller
{
    //
    public function index(){
      return Hero::all();
    }

    public function show(Hero $hero){

      return $hero;
    }

    public function create(Request $req){
      $hero = Hero::create($req->all());

      return response()->json($hero, 201);
    }

    public function update(Request $req){
      $hero->update($req->all());

      return response()->json($hero, 200);
    }


}
*/
