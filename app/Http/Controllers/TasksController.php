<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){
        //$name = "Jernej";
        //$lastName = "Strazisar";
        /*$tasks = [
            "Do it",
            "Just do it",
            "Go do it man",
        ];*/

        //$tasks = DB::table('tasks')->get(); //get the contents of a table from database
        $tasks = Task::all(); //Eloquent model usage
        //return $tasks; //Returns JSON object array

        //return view('welcome', ['name' => 'Jernej']); //define
        //return view('welcome', compact('name', 'lastName')); //passes variables $name and $lastName
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task){
        //dd($id); //Dump and die - dumps the variable and ends execution
        //$task = DB::table('tasks')->find($id); //get the table row where id == $id
        //$task = Task::find($id);
        return view('tasks.show', compact('task'));
    }
}
