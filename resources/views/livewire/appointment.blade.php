<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dental Appointment (Laravel 8 Livewire CRUD with Jetstream & Tailwind CSS - ALJ)
        </h2>
    </x-slot>

    <div class="mt-10 sm:mt-0">
        @include('livewire.sample-livewire.testing')
    </div> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                      <div class="flex">
                        <div>
                          <p class="text-sm">{{ session('message') }}</p>
                        </div>
                      </div>
                    </div>
                @endif
                <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Post</button>
                {{-- @if($isOpen)
                    @include('livewire.create')
                @endif --}}

                
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">Appt ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Service Type</th>
                            <th class="px-4 py-2">Date of Appt</th>
                            <th class="px-4 py-2">Time of Appt</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointment as $post)
                        <tr>
                            <td class="border px-4 py-2">{{ $post->id }}</td>
                            <td class="border px-4 py-2">{{ $post->name }}</td>
                            <td class="border px-4 py-2">{{ $post->service_type }}</td>
                            <td class="border px-4 py-2">{{ $post->date_appt }}</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($post->time_appt)->format('H:i:s')  }}</td>
                            <td class="border px-4 py-2">
                            <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button type="button" wire:click="deleteId({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-toggle="modal" data-target="#exampleModal">Delete</button>
    
                            
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>


            </div>
        </div>
    </div>
</div>
