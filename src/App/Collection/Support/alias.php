<?php

$aliases = [
    App\Collection\Contracts\Support\Arrayable::class => Illuminate\Contracts\Support\Arrayable::class,
    App\Collection\Contracts\Support\Jsonable::class => Illuminate\Contracts\Support\Jsonable::class,
    App\Collection\Contracts\Support\Htmlable::class => Illuminate\Contracts\Support\Htmlable::class,
    App\Collection\Support\Arr::class => Illuminate\Support\Arr::class,
    App\Collection\Support\Collection::class => Illuminate\Support\Collection::class,
    App\Collection\Support\Enumerable::class => Illuminate\Support\Enumerable::class,
    App\Collection\Support\HigherOrderCollectionProxy::class => Illuminate\Support\HigherOrderCollectionProxy::class,
    App\Collection\Support\HigherOrderWhenProxy::class => Illuminate\Support\HigherOrderWhenProxy::class,
    App\Collection\Support\LazyCollection::class => Illuminate\Support\LazyCollection::class,
    App\Collection\Support\Traits\EnumeratesValues::class => Illuminate\Support\Traits\EnumeratesValues::class,
];

foreach ($aliases as $collect => $illuminate) {
    if (! class_exists($illuminate) && ! interface_exists($illuminate) && ! trait_exists($illuminate)) {
        class_alias($collect, $illuminate);
    }
}