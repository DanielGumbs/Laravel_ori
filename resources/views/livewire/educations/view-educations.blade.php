<div class="px-4 sm:px-6 lg:px-8">
    <div class="mt-8 flex flex-col p-20">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl">Overzicht opleiding</h2>
                </div>
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr class="divide-x divide-gray-200">
                            <th scope="col" class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6 ml-2">Opleiding</th>
                            <th scope="col" class="px-4 py-3.5 text-left text-sm font-semibold text-gray-900">{{$education->education_name}}</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">Docent</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{$education->teacher->name}}</td>
                        </tr>
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">Categorie</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{$education->category->category_name}}</td>
                        </tr>
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">Beschrijving</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{$education->description}}</td>
                        </tr>
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">Datum</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{Carbon\Carbon::parse($education->date)->isoFormat('LL') }}</td>
                        </tr>
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">Starttijd/Eindtijd</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{ Carbon\Carbon::parse($education->starttime)->format('H:i') }} / {{ Carbon\Carbon::parse($education->endtime)->format('H:i') }}</td>
                        </tr>
                        <tr class="divide-x divide-gray-200">
                            <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">Bezetten/Aantal plekken</td>
                            <td class="whitespace-nowrap p-4 text-sm text-gray-500">{{$education->people}} / {{$education->amount}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button wire:click="back_educations()" class="mt-6 my-3 inline-flex justify-center w-30 rounded-md border border-transparent px-4 py-2 bg-orange-600 text-base font-bold text-white shadow-sm hover:bg-orange-700">
                    Back
                </button>
            </div>
        </div>
    </div>
</div>
