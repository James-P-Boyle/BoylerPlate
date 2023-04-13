@props(['name', 'value' => '', 'rows' => 3])

<textarea
    name="{{ $name }}"
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'px-2 bg-transparent text-left text-xl border rounded-lg focus:border-ci-yellow focus:ring-0 focus:outline-none focus:ring-offset-0 ']) }}
>{{ old($name, $value) }}</textarea>