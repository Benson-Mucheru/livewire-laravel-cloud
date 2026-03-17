<?php

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Models\Donot;

new #[Title('Add a to don\'t list')] class extends Component {
    #[Validate('required|min:5|max:20')]
    public $title = '';

    #[Validate('required')]
    public $difficulty = 'easy';

    #[Validate('required')]
    public $time = 5;

    #[Validate('required|min:5|max:20')]
    public $description = '';

    public function save()
    {
        $validated = $this->validate();
        Donot::create($validated);
        $this->redirect('/dashboard', true);
    }
};
?>

<div>
    <flux:heading level="2" size="lg">Create a to don't list</flux:heading>
    <form wire:submit="save" class="space-y-4 md:w-1/2">
        @csrf
        <flux:input label="Title" type="text" wire:model="title" placeholder="Task Name" />

        {{-- Difficulty --}}
        <flux:radio.group wire:model.live="difficulty" label="Difficulty" variant="pills">
            <flux:radio value="easy" label="Easy" />
            <flux:radio value="intermediate" label="Intermediate" />
            <flux:radio value="hard" label="Hard" />
        </flux:radio.group>

        {{-- Due time --}}
        @if ($difficulty == 'easy')
            <flux:radio.group wire:model.live="time" label="Due Time">
                <flux:radio value="5" label="5 mins" />
                <flux:radio value="10" label="10 mins" />
                <flux:radio value="15" label="15 mins" />
            </flux:radio.group>
        @endif

        @if ($difficulty == 'intermediate')
            <flux:radio.group wire:model.live="time" label="Due Time">
                <flux:radio value="20" label="20 mins" />
                <flux:radio value="25" label="25 mins" />
                <flux:radio value="30" label="30 mins" />
            </flux:radio.group>
        @endif

        @if ($difficulty == 'hard')
            <flux:radio.group wire:model.live="time" label="Due Time">
                <flux:radio value="35" label="35 mins" />
                <flux:radio value="40" label="40 mins" />
                <flux:radio value="45" label="45 mins" />
            </flux:radio.group>
        @endif
        </flux:radio.group>

        <p>{{ $difficulty }}</p>
        <p>{{ $time }}</p>
        {{-- Description --}}
        <flux:textarea label="Description" type="text" wire:model="description" rows="2" resize="none" />
        <div class="flex gap-4">
            <flux:button class="w-full" href="{{ route('dashboard') }}" wire:navigate>Cancel</flux:button>
            <flux:button type="sumbit" class="w-full" variant="primary" color="blue">Add New</flux:button>
        </div>
    </form>
</div>
