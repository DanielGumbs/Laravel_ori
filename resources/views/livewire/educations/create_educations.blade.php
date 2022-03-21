<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white p-6">
                    <p class="text-center text-gray-700 text-sm font-bold mb-2 lg:text-2xl">{{$edit_make}}</p>
                        <div class="mb-4">
                            <label for="education"
                                   class="text-gray-700 text-sm font-bold mb-2">Opleiding</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="education" wire:model="education_name">
                            @error('education_name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="description"
                                   class="block text-gray-700 text-sm font-bold mb-2">Beschrijving</label>
                            <input type="text"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="description" wire:model="description">
                                    @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="category-veld"
                                   class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
                            <select name="category_id" wire:model="category_id" id="category-veld" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($categories ?? '' as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="block text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="teacher-veld"
                                class="block text-gray-700 text-sm font-bold mb-2">Docent</label>
                            <select name="teacher_id" wire:model="teacher_id" id="teacher-veld" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id') <span class="block text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="datum" class="block text-gray-700 text-sm font-bold mb-2">Datum</label>
                                <input type="date" id="datum" wire:model="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Datum:">
                            @error('date') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="starttime" class="block text-gray-700 text-sm font-bold mb-2">Starttijd</label>
                                <input type="time" id="starttime" wire:model="starttime" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Starttijd:">
                            @error('starttime') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="endtime" class="block text-gray-700 text-sm font-bold mb-2">Eindtijd</label>
                                <input type="time" id="endtime" wire:model="endtime" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Eindtijd:">
                            @error('endtime') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="people"
                                   class="block text-gray-700 text-sm font-bold mb-2">Bezetten plekken</label>
                            <input type="number"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="people" wire:model="people">
                            @error('people') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="amount"
                                   class="block text-gray-700 text-sm font-bold mb-2">Aantal plekken</label>
                            <input type="number"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="amount" wire:model="amount">
                            @error('amount') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <br>
                    <div class="flex space-x-4">
                        <button wire:click.prevent="store()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-orange-600 text-base font-bold text-white shadow-sm hover:bg-orange-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Opslaan
                        </button>
                        <button wire:click="closeModalPopover()" type="button"
                                class="inline-flex justify-center w-full rounded-md border border-orange-600 px-4 py-2 bg-white text-base leading-6 font-bold text-orange-600 shadow-sm hover:text-white hover:bg-orange-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Afsluiten
                        </button>
                    </div>
                    </div>
            </form>
        </div>
    </div>
</div>
