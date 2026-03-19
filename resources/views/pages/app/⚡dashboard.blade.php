<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use App\Models\Donot;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Flux\Flux;

new #[Title('All to don\'ts')] class extends Component {
    #[Validate('required|min:5|max:20')]
    public $title = '';

    #[Validate('required|min:4')]
    public $difficulty = 'easy';

    #[Validate('required:min:1')]
    public $time = 5;

    #[Validate('required|min:5|max:20')]
    public $description = '';

    public function mount()
    {
        if ($this->lists()->where('difficulty', 'easy')->count() >= 3) {
            $this->difficulty = 'intermediate';
            $this->time = 20;
        }
        if ($this->lists()->where('difficulty', 'intermediate')->count() >= 2) {
            $this->difficulty = 'hard';
            $this->time = 35;
        }

        if ($this->lists()->where('difficulty', 'hard')->count() >= 1) {
            $this->difficulty = 'easy';
            $this->time = 10;
        }

        if ($this->lists()->count() > 6) {
            $this->difficulty = '';
            $this->time;
        }
    }

    //Create a new list
    public function save()
    {
        $validated = $this->validate();
        Donot::create([
            'user_id' => Auth::user()->id,
            'title' => $validated['title'],
            'difficulty' => $validated['difficulty'],
            'time' => $validated['time'],
            'description' => $validated['description'],
            'position' => count(Auth::user()->donots) + 1,
        ]);

        Flux::modal('create-list')->close();
    }

    #[Computed]
    public function lists()
    {
        return Auth::user()->donots->sortBy('position');
    }

    public function updatePosition($item, $position)
    {
        $tasks = $this->lists()->except($item);
        $task = $this->lists()->findOrFail($item);

        $tasks->splice($position, 0, [$task]);

        foreach ($tasks as $index => $task) {
            $task->update(['position' => $index]);
        }
    }
};
?>

<div>
    <div class="flex justify-between">
        <div>
            <flux:heading level="1" size="xl">To Don't List</flux:heading>
            <flux:heading level="2" size="lg">{{ today() }}</flux:heading>
        </div>
        <flux:modal.trigger name="create-list">
            <flux:button variant="primary" color="blue">Add new list</flux:button>
        </flux:modal.trigger>
    </div>

    <flux:modal name="create-list" flyout variant="floating" class="not-md:w-full">
        <flux:heading level="2" size="lg">Create a to don't list</flux:heading>
        <form wire:submit="save" class="space-y-4">
            @csrf
            <flux:input label="Title" type="text" wire:model.self="title" placeholder="Task Name" />

            {{-- Difficulty --}}
            <flux:radio.group wire:model.self.live="difficulty" label="Difficulty" variant="segmented">
                <flux:radio value="easy" label="Easy"
                    wire:bind:disabled="{{ $this->lists()->where('difficulty', 'easy')->count() >= 3 }}" />
                <flux:radio value="intermediate" label="Intermediate"
                    wire:bind:disabled="{{ $this->lists()->where('difficulty', 'intermediate')->count() >= 2 }}" />
                <flux:radio value="hard" label="Hard"
                    wire:bind:disabled="{{ $this->lists()->where('difficulty', 'hard')->count() >= 1 }}" />
            </flux:radio.group>

            {{-- Due time --}}
            @if ($difficulty == 'easy')
                <flux:radio.group wire:model.self.live="time" label="Due Time"
                    wire:bind:disabled="{{ $this->lists()->where('difficulty', 'easy')->count() >= 3 }}">
                    <flux:radio value="5" label="5 mins" />
                    <flux:radio value="10" label="10 mins" />
                    <flux:radio value="15" label="15 mins" />
                </flux:radio.group>
            @endif

            @if ($difficulty == 'intermediate')
                <flux:radio.group wire:model.self.live="time" label="Due Time"
                    wire:bind:disabled="{{ $this->lists()->where('difficulty', 'intermediate')->count() >= 2 }}">
                    <flux:radio value="20" label="20 mins" checked />
                    <flux:radio value="25" label="25 mins" />
                    <flux:radio value="30" label="30 mins" />
                </flux:radio.group>
            @endif

            @if ($difficulty == 'hard')
                <flux:radio.group wire:model.self.live="time" label="Due Time"
                    wire:bind:disabled="{{ $this->lists()->where('difficulty', 'hard')->count() >= 1 }}">
                    <flux:radio value="35" label="35 mins" checked />
                    <flux:radio value="40" label="40 mins" />
                    <flux:radio value="45" label="45 mins" />
                </flux:radio.group>
            @endif

            {{-- Description --}}
            <flux:textarea label="Description" type="text" wire:model.self="description" rows="2"
                resize="none" />
            <div class="flex gap-4">
                <flux:button class="w-full" x-on:click="$flux.modal('create-list').close()">Cancel</flux:button>
                @if ($this->lists()->count() < 6)
                    <flux:button type="sumbit" class="w-full" variant="primary" color="blue">Add
                        New</flux:button>
                @else
                    <flux:button class="w-full" variant="primary" color="blue">List completed</flux:button>
                @endif
            </div>
        </form>
    </flux:modal>

    <ul class="grid grid-cols-1 md:grid-cols-3 gap-4" wire:sort="updatePosition">
        @island(lazy: true)
            @placeholder
                @foreach ($this->lists as $list)
                    <flux:skeleton animation="pulse" class="h-20"></flux:skeleton>
                @endforeach
            @endplaceholder
            @foreach ($this->lists as $list)
                <li wire:key="{{ $list->id }}" class="border p-2 rounded-md space-y-1 group relative"
                    x-data="{
                        color: 'easy',
                        difficulty(mode) {
                            if (mode == 'easy') {
                                return this.color = 'bg-green-200'
                            }
                            if (mode == 'intermediate') {
                                return this.color = 'bg-yellow-200'
                            }
                            if (mode == 'hard') {
                                return this.color = 'bg-red-200'
                            }
                        }
                    }" x-init="difficulty('{{ $list->difficulty }}')" wire:sort:item="{{ $list->id }}">
                    <div class="absolute animate-time w-full h-full -z-1 top-0 left-0"
                        style="animation-duration: {{ $list->time * 60000 }}ms;" x-bind:class="color">
                    </div>
                    <div class="flex justify-between" x-data="{ check: false, toggleCheck() { this.check = !this.check } }">
                        <flux:heading level="2" size="lg">{{ $list->title }}</flux:heading>
                        <flux:checkbox class="lg:invisible lg:group-hover:visible" x-bind:class="check ? 'lg:visible' : ''"
                            x-on:click="toggleCheck">
                        </flux:checkbox>
                    </div>
                    <flux:text size="sm">{{ $list->description }}</flux:text>
                    <div class="flex justify-between">
                        <flux:text variant="strong">{{ $list->difficulty }}</flux:text>
                        <flux:text variant="strong">{{ $list->time }} mins</flux:text>
                    </div>


                </li>
            @endforeach
        @endisland
    </ul>
</div>

<script>
    console.log('Yow');
</script>
