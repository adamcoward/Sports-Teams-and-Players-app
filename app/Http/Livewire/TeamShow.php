<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Player;

class TeamShow extends Component
{
    public $team;
    public $first_name = '';
    public $last_name = '';
    public $players = [];
    
    public function mount()
    {
        $this->players = Player::where('team_id', $this->team->id)
                             ->orderBy('first_name')
                             ->orderBy('last_name')
                             ->get()
                             ->toArray();
    }
    
    public function render()
    {
        return view('livewire.team-show');
    }
    
    public function delete($key)
    {
        $player = Player::find($this->players[$key]['id']);
        $player->delete();
        unset($this->players[$key]);
    }
    
    public function save($key)
    {
        $player = Player::find($this->players[$key]['id']);
        $player->first_name = $this->players[$key]['first_name'];
        $player->last_name = $this->players[$key]['last_name'];
        $player->save();
    }
    
    public function submit()
    {
        $player = new Player([
            'team_id' => $this->team->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
        ]);
        $player->save();
        $this->players[] = $player;
        usort($this->players, function ($a, $b) {
            $rdiff = strcasecmp($a['first_name'], $b['first_name']);
            if ($rdiff) {
                return $rdiff;
            }
            return strcasecmp($a['last_name'], $b['last_name']);
        });
        $this->first_name = '';
        $this->last_name = '';
    }
}
