<?php

use Livewire\Component;
use Livewire\Attributes\Layout;

new class extends Component {
    public $title = '';
    public $description = '';
    public $time = '';
};
?>

<div>
    <flux:heading level="2" size="lg">Create a to don't list</flux:heading>
    <flux:input name="title" type="text"></flux:input>
    <flux:input name="description" type="text"></flux:input>
    <flux:select>

    </flux:select>
</div>
