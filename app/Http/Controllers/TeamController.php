<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index(){
        $teams=Team::latest()->get();
        return view('admin/team/team',[
            'teams'=>$teams,
            'team'=>new Team()
        ]);
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'position'=>'required',
            'image'=>'nullable',
        ]);

        if($request->hasFile('image')){
            $data['image']=$request->file('image')->store('team','public');
        }
        Team::create($data);

        return redirect()->back()->with('success',"New team member created");
    }

    public function edit(Team $team){
        $teams=Team::latest()->get();
        return view('admin/team/team',[
            'teams'=>$teams,
            'team'=>$team
        ]);
    }

    public function update(Request $request, Team $team){
        $data=$request->validate([
            'name'=>'required',
            'position'=>'required',
            'image'=>'nullable',
        ]);

        if($request->hasFile('image')){
            if($team->image){
                Storage::delete($team->image);
            }
            $data['image']=$request->file('image')->store('team','public');
        }

        $team->update($data);

        return redirect()->route('team.index')->with('success',"Selected team member updated");
    }

    public function destroy(Team $team){
         if($team->image){
                Storage::delete($team->image);
            }
            $team->delete();

             return redirect()->route('team.index')->with('success',"Selected  team member removed");
    }

}
