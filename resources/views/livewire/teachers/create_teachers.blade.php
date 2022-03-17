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
                        <label for="name"
                               class="block text-gray-700 text-sm font-bold mb-2">Docent</label>
                        <input type="text"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="name" wire:model="name">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="created_at" class="block text-gray-700 text-sm font-bold mb-2">Aangemaakt op</label>
                        <input type="date" id="created_at" wire:model="created_at" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Datum:">
                        @error('created_at') <span class="text-red-500">{{ $message }}</span>@enderror
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
