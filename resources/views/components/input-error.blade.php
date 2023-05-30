@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'border border-red-400 text-red-700 text-xs uppercase bg-red-200 text-center mt-2']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
