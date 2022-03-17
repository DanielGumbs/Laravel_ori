<x-slot name="header">
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl">Overzicht docenten</h2>
            <button wire:click="create()"
                    class="w-80 my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-orange-600 text-base font-bold text-white shadow-sm hover:bg-orange-700">
                Maak docent aan
            </button>
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if($isModalOpen)
                @include('livewire.teachers.create_teachers')
            @endif
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-4 lg:-mx-4">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-4 lg:px-4">
                        <div class="shadow overflow-hidden border-b border-gray-300 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Docent</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gecreëerd op</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                                </thead>
                                @foreach($teachers as $teacher)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4s whitespace-nowrap text-sm text-gray-900">{{$teacher->id}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $teacher->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{Carbon\Carbon::parse($teacher->created_at)->isoFormat('LL')}}
                                        <td><button wire:click="edit({{ $teacher->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg></button>
                                            <button wire:click="delete({{ $teacher->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg></button></td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{ $teachers->links() }}
    </div>
</div>
</div>
