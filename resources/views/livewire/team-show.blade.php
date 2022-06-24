<div class="md:container">
  <div class="p-2">
    <p class="mb-4"><a href="{{ route('frontend.index') }}">‹ Back to teams</a></p>
    <h1 class="text-4xl mb-4">{{ $team->name }}</h1>
    <form wire:submit.prevent="submit">
      <input placeholder="Enter first name" required type="text" wire:model="first_name">
      <input placeholder="Enter last name" required type="text" wire:model="last_name">
      <button class="btn btn-blue">Add player</button>
    </form>
  </div>
  <div class="table border-spacing-2">
    @foreach ($players as $key => $player)
      <div class="table-row">
        <div class="table-cell">
          <input type="text" wire:blur="save({{ $key }})" wire:keyup.enter="save({{ $key }})" wire:model="players.{{ $key }}.first_name">
          <input type="text" wire:blur="save({{ $key }})" wire:keyup.enter="save({{ $key }})" wire:model="players.{{ $key }}.last_name">
        </div>
        <div class="table-cell">
          <a class="btn btn-red" href="#" wire:click.prevent="delete({{ $key }})">Delete</a>
        </div>
      </div>
    @endforeach
  </div>
</div>
