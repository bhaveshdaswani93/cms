<?php

namespace Statamic\GraphQL;

use Illuminate\Support\ServiceProvider as LaravelProvider;
use Statamic\GraphQL\Queries\CollectionQuery;
use Statamic\GraphQL\Queries\CollectionsQuery;
use Statamic\GraphQL\Queries\EntriesQuery;
use Statamic\GraphQL\Queries\EntryQuery;
use Statamic\GraphQL\Queries\PingQuery;

class ServiceProvider extends LaravelProvider
{
    public function boot()
    {
        $this->app->booted(function () {
            $this->setDefaultSchema();
        });
    }

    private function setDefaultSchema()
    {
        $schema = [
            'query' => [
                'ping' => PingQuery::class,
                'entries' => EntriesQuery::class,
                'entry' => EntryQuery::class,
                'collections' => CollectionsQuery::class,
                'collection' => CollectionQuery::class,
            ],
            'mutation' => [],
            'middleware' => [],
            'method' => ['get', 'post'],
        ];

        config(['graphql.schemas.default' => $schema]);
    }
}