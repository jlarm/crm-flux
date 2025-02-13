<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class DealershipForm extends Form
{
    public string $name = '';
    public string $address = '';
    public string $city = '';
    public $state;
    public string $zipCode;
    public string $phone;
    public bool $dev = false;
    public $type;
    public $status;
    public $rating;
    public string $currentSolutionName = '';
    public string $currentSolutionUse = '';
    public $notes = '';
    public array $selectedUsers = [];

    protected function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:dealerships,name',
            'address' => ['nullable', 'string', 'min:3', 'max:255'],
            'city' => ['nullable', 'string', 'min:3', 'max:255'],
            'state' => ['nullable'],
            'zipCode' => ['nullable', 'string', 'min:3', 'max:255'],
            'phone' => ['nullable', 'string', 'min:3', 'max:255'],
            'dev' => ['nullable', 'boolean'],
            'type' => ['required'],
            'status' => ['required'],
            'rating' => ['required'],
            'currentSolutionName' => ['nullable', 'string', 'min:3', 'max:255'],
            'currentSolutionUse' => ['nullable', 'string', 'min:3', 'max:255'],
            'notes' => ['nullable', 'string', 'min:3', 'max:255'],
            'selectedUsers' => ['required', 'array'],
        ];
    }
}
