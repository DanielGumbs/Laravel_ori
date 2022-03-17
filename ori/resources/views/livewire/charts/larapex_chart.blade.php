<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        </head>
        <div class="flex justify-between items-center">
            <h2 class="text-2xl mb-5">Overzicht Grafieken Larapex</h2>
        </div>
        <div class="flex items-center mb-2 justify-start">
            <div class="mb-4">
                <label for="category_grafiek" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
                <select name="category_id" wire:model="category_grafiek" id="category_grafiek" class="block shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><option value="">Alle categorieën</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="w-1/2 p-4 bg-white rounded shadow mr-4">{!! $chart_teacher->container() !!}</div>
            <div class="w-1/2 p-4 bg-white rounded shadow ml-4">{!! $chart_education->container() !!}</div>
        </div>
    </div>
    <script src="{{ $chart_teacher->cdn() }}" wire:ignore></script>
    {{ $chart_teacher->script() }}

    <script src="{{ $chart_education->cdn() }}" wire:ignore></script>
    {{ $chart_education->script() }}
</div>
