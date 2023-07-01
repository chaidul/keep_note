<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class Note extends Controller
{
    function addNew(Request $req){
        $note = new Notes;
        $note->title=$req->title;
        $note->note=$req->note;
        $note->ip=$_SERVER["REMOTE_ADDR"];
        $note->color=$req->color;
        return $note->save();
    }
    function getNotes(){
        return Notes::where("ip","=",$_SERVER["REMOTE_ADDR"])->get();
    }
    function deleteNote(Request $req){
        Notes::find($req->id)->delete();
        return redirect("/");
    }
}
