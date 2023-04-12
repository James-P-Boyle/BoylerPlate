@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-ci-yellow dark:text-ci-yellow']) }}>
        {{ $status }}
    </div>
@endif
