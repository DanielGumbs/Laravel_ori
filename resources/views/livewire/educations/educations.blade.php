<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-2xl">Overzicht opleidingen</h2>
        </div>
<div class="flex items-center justify-between">
    <div class="flex items-center mb-2 justify-start">
        <div class="mb-4 mr-3">
            <label for="Opleiding" class="block text-gray-700 text-sm font-bold mb-2">Opleiding</label>
            <input wire:model="search" type="search" placeholder="Zoek op opleiding..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4 mr-3">
            <label for="teacher_dropdown" class="block text-gray-700 text-sm font-bold mb-2">Docent</label>
            <select name="teacher_id" wire:model="teacher_dropdown" id="teacher_dropdown" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><option value="">Alle docenten</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="category_dropdown" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
            <select name="category_id" wire:model="category_dropdown" id="category_dropdown" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><option value="">Alle categorieën</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <button wire:click="create()" class="w-60 my-3 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-orange-600 text-base font-bold text-white shadow-sm hover:bg-orange-700">Maak opleiding aan</button>
    </div>
</div>
        <div class="">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session(' message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if($isModalOpen)
                @include('livewire.educations.create_educations')
            @endif
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-4 lg:-mx-4">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-4 lg:px-4">
                            <div class="shadow overflow-hidden border-b border-gray-300 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th  scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Naam</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categorie</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Docent</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Inschrijvingen</th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                            <span class="sr-only">Delete</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach($educations as $education)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                            <td class="px-6 py-4s whitespace-nowrap text-sm text-gray-900">{{$education->education_name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $education->category->category_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $education->teacher->name}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{Carbon\Carbon::parse($education->date)->isoFormat('LL') }}
                                                <br>
                                                {{ Carbon\Carbon::parse($education->starttime)->format('H:i') }}
                                                -
                                                {{ Carbon\Carbon::parse($education->endtime)->format('H:i') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$education->people}} / {{$education->amount}}</td>
                                            <td>
                                                <button wire:click="edit({{ $education->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg></button>
                                                <button wire:click="delete({{ $education->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg></button>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="p-6 mt-2 bg-white rounded shadow mt-8">{{ $educations->links() }}</div>
        </div>
    </div>
</div>
