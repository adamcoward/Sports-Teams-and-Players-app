<div class="md:container">
  <div class="p-2">
    <form wire:submit.prevent="submit">
      <input placeholder="Enter name" required type="text" wire:model="name">
      <button class="btn btn-blue">Add team</button>
    </form>
  </div>
  <div class="table border-spacing-2">
    @foreach ($teams as $key => $team)
      <div class="table-row">
        <div class="table-cell">
          <input type="text" wire:blur="save({{ $key }})" wire:keyup.enter="save({{ $key }})" wire:model="teams.{{ $key }}.name">
        </div>
        <div class="table-cell">
          <a class="btn btn-blue" href="{{ route('frontend.show', $team['id']) }}">Players</a>
        </div>
        <div class="table-cell">
          <a class="btn btn-red" href="#" wire:click.prevent="delete({{ $key }})">Delete</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
