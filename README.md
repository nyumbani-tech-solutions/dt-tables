# nyumbani/dt-tables

Searchable, sortable data tables for Laravel. Write a `Table` class, render it with `<x-data-table>`, and the package serves the rows, the search and the DataTables assets. Tables page in the browser, or on the server for large sets (`ServerSideTable`) or from a remote API (`ApiTable`). It requires only Laravel.

## Requirements

- PHP 8.3 or newer and Laravel 12 or 13

## Install

1. Require it:

```
composer require nyumbani/dt-tables
```

Laravel discovers the service provider on its own. The package injects its own scripts and styles into pages that render a table, so there is nothing to import.

2. Optionally publish the configuration. The package works with its defaults, so skip this until you change one:

```
cp vendor/nyumbani/dt-tables/config/dt-tables.php config/dt-tables.php
```

In an app with `nyumbani/essentials`, `php artisan vendor:publish --tag=dt-tables-config` does the same, and `php artisan ui:install` then sets an untouched copy to the Tailwind theme.

3. Create a table and render it:

```
php artisan make:data-table CustomerTable
```

```blade
<x-data-table :payload="$table" />
```

For tables that should page, search and sort in the database, create it with `php artisan make:data-table CustomerTable --server-side`, and for rows from a remote API, with `--api`.

## Configuration

| Key | Purpose |
| --- | --- |
| `settings.theme` | `bootstrap` (default) or `tailwind` |
| `settings.behaviour.page_length` | Rows per page |
| `themes.*` | The classes each theme gives buttons, inputs and selects |
| `server_side` | Limits and endpoints of server-side tables |

## Docs

The full docs are served at `/nyumbani-dt-tables/docs`, in the `local` environment only, by `nyumbani/docs` (`composer require --dev nyumbani/docs`). The package works without it.
