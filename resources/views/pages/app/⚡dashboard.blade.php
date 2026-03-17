<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use App\Models\Donot;

new #[Title('All to don\'ts')] class extends Component {
    #[Computed]
    public function lists()
    {
        return Donot::all();
    }

    public function sortItem($item, $position) {}
};
?>

<div>
    <flux:heading level="1" size="xl">To Don't List</flux:heading>
    <flux:heading level="2" size="lg">{{ today() }}</flux:heading>


    <ul class="grid grid-cols-1 md:grid-cols-3 gap-4" wire:sort="sortItem">
        @island(lazy: true)
            @placeholder
                @foreach ($this->lists as $list)
                    <flux:skeleton animation="pulse" class="h-20"></flux:skeleton>
                @endforeach
            @endplaceholder
            @foreach ($this->lists as $list)
                <li wire:key="{{ $list['id'] }}" class="border p-2 rounded-md space-y-1 group relative"
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
                    }" x-init="difficulty('{{ $list['difficulty'] }}')" wire:sort:item="{{ $list['id'] }}">
                    <div class="absolute animate-time w-full h-full -z-1 top-0 left-0"
                        style="animation-duration: {{ $list['time'] * 60000 }}ms;" x-bind:class="color">
                    </div>
                    <div class="flex justify-between" x-data="{ check: false, toggleCheck() { this.check = !this.check } }">
                        <flux:heading level="2" size="lg">{{ $list['title'] }}</flux:heading>
                        <flux:checkbox class="lg:invisible lg:group-hover:visible" x-bind:class="check ? 'lg:visible' : ''"
                            x-on:click="toggleCheck">
                        </flux:checkbox>
                    </div>
                    <flux:text size="sm">{{ $list['description'] }}</flux:text>
                    <div class="flex justify-between">
                        <flux:text variant="strong">{{ $list['difficulty'] }}</flux:text>
                        <flux:text variant="strong">{{ $list['time'] }} mins</flux:text>
                    </div>


                </li>
            @endforeach
        @endisland
    </ul>
</div>

<script>
    console.log('Yow');
</script>
