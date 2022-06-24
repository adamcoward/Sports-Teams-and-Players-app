<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Team;

class TeamIndex extends Component
{
    public $name = '';
    public $teams = [];
    
    public function mount()
    {
        $this->teams = Team::orderBy('name')
                       ->get()
                       ->toArray();
    }
    
    public function render()
    {
        return view('livewire.team-index');
    }
    
    public function delete($key)
    {
        $team = Team::find($this->teams[$key]['id']);
        $team->delete();
        unset($this->teams[$key]);
    }
    
    public function save($key)
    {
        $team = Team::find($this->teams[$key]['id']);
        $team->name = $this->teams[$key]['name'];
        $team->save();
    }
    
    public function submit()
    {
        $team = new Team([
            'name' => $this->name,
        ]);
        $team->save();
        $this->teams[] = $team;
        usort($this->teams, function ($a, $b) {
            return strcasecmp($a['name'], $b['name']);
        });
        $this->name = '';
    }
}
