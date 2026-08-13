@props(['type' => 'SUCCESS'])

@if ($type === 'ERROR')
    <div class="border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-700">
    <h1 class="text-lg text-red-500 font bold">Error</h1>
    <p class="text-red-500">{{ $slot }}</p>
    </div>
@elseif ($type === 'WARNING') 
    <div class="border border-yellow-200 bg-yellow-50 px-5 py-4 text-sm text-yellow-700">
    <h1 class="text-lg text-yellow-500 font bold">Warning</h1>
    <p class="text-yellow-500">{{ $slot }}</p>
    </div>
@elseif ($type === 'SUCCESS')
    <div class="border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">
    <h1 class="text-lg text-green-500 font bold">Success</h1>
    <p class="text-green-500">{{ $slot }}</p>
    </div>
@else
    <div class="border border-blue-200 bg-blue-50 px-5 py-4 text-sm text-blue-700">
    <h1 class="text-lg text-blue-500 font bold">Info</h1>
    <p class="text-blue-500">{{ $slot }}</p>
    </div>
@endif