<div>
    <x-slot name="pageTitle">Create Dealership</x-slot>
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-8">
                <flux:card>
                    <div class="space-y-5">
                        <flux:input wire:model="form.name" label="Name" badge="required" />
                        <flux:input wire:model="form.address" label="Address" />
                        <div class="grid grid-cols-3 gap-5">
                            <flux:input wire:model="form.city" label="City" />
                            <flux:select wire:model="form.state" label="State">
                                <flux:option></flux:option>
                                @foreach (App\Enum\State::cases() as $state)
                                    <flux:option :value="$state->value">{{ $state->label() }}</flux:option>
                                @endforeach
                            </flux:select>
                            <flux:input wire:model="form.zipCode" label="Zip Code" />
                        </div>
                        <div class="grid grid-cols-2 gap-5">
                            <flux:input
                                mask="999-999-9999"
                                placeholder="999-999-9999"
                                wire:model="form.phone"
                                label="Phone Number"
                            />
                            <flux:select wire:model="form.type" label="Type" badge="Required">
                                <flux:option></flux:option>
                                @foreach (App\Enum\Type::cases() as $type)
                                    <flux:option :value="$type->value">{{ $type->label() }}</flux:option>
                                @endforeach
                            </flux:select>
                            <flux:input wire:model="form.currentSolutionName" label="Current Solution Name" />
                            <flux:input wire:model="form.currentSolutionUse" label="Current Solution Use" />
                        </div>
                        {{-- <flux:textarea label="Notes" rows="auto" wire:model="form.notes" placeholder="Notes..." /> --}}
                        <flux:editor wire:model="form.notes" label="Notes" />
                    </div>
                </flux:card>
            </div>
            <div class="col-span-4">
                <flux:card>
                    <div class="space-y-5">
                        <flux:fieldset>
                            <flux:legend>Status</flux:legend>
                            <flux:switch
                                wire:model="form.dev"
                                label="In Development"
                                description="Turn on In Development when actively working on this dealership with the Sales Dev Rep."
                            />
                        </flux:fieldset>
                        <flux:separator class="my-5" variant="subtle" />
                        <flux:select
                            variant="listbox"
                            multiple
                            label="Consultants"
                            badge="required"
                            wire:model="form.selectedUsers"
                        >
                            @foreach ($this->users() as $user)
                                <flux:option :value="$user->id">{{ $user->name }}</flux:option>
                            @endforeach
                        </flux:select>
                        <flux:select label="Status" badge="required" wire:model="form.status">
                            <flux:option></flux:option>
                            @foreach (App\Enum\Status::cases() as $status)
                                <flux:option :value="$status->value">{{ $status->label() }}</flux:option>
                            @endforeach
                        </flux:select>
                        <flux:select label="Rating" badge="required" wire:model="form.rating">
                            <flux:option></flux:option>
                            @foreach (App\Enum\Rating::cases() as $rating)
                                <flux:option :value="$rating->value">{{ $rating->label() }}</flux:option>
                            @endforeach
                        </flux:select>
                        <div class="flex gap-x-2">
                            <flux:button type="submit" class="w-full" variant="primary">Create</flux:button>
                            <flux:button class="w-full">Cancel</flux:button>
                        </div>
                    </div>
                </flux:card>
            </div>
        </div>
    </form>
</div>
