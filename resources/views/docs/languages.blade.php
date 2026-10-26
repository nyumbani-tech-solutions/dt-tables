@extends('docs::layout')

@section('page', 'Languages')
@section('lead', 'Every text a table shows goes through __(). The package ships Chinese, and an app adds any other language itself.')

@section('content')
    <x-docs::section id="how" title="How it works">
        <p>Each text is the English sentence itself, run through <code>__()</code> when the table renders, so it follows the language the app has set for the request. English needs no setup, because the defaults are the words DataTables itself uses, and the package ships <code>lang/zh.json</code>, so a Chinese app needs no setup either. For any other language, or to change a Chinese text, add the English sentence as the key in the app's own <code>lang/{code}.json</code>; the app's file wins over the package's.</p>
        <x-docs::code lang="json" title="lang/sw.json (an app adding Swahili)">
            {
                "No data available in table": "Hakuna data kwenye jedwali",
                "Showing _START_ to _END_ of _TOTAL_ entries": "Inaonyesha _START_ hadi _END_ ya _TOTAL_",
                "Next": "Inayofuata"
            }
        </x-docs::code>
        <p>Keep the <code>_START_</code>, <code>_END_</code>, <code>_TOTAL_</code> and <code>_MAX_</code> tokens in the translation; DataTables fills them in.</p>
    </x-docs::section>

    <x-docs::section id="texts" title="The texts">
        <x-docs::table :columns="['Key', 'English text']" :rows="[
            ['searchPlaceholder', 'Type to search'],
            ['filterPlaceholder', 'Search...'],
            ['showAll', 'Show All'],
            ['info', 'Showing _START_ to _END_ of _TOTAL_ entries'],
            ['infoEmpty', 'Showing 0 to 0 of 0 entries'],
            ['infoFiltered', '(filtered from _MAX_ total entries)'],
            ['emptyTable', 'No data available in table'],
            ['zeroRecords', 'No matching records found'],
            ['loadingRecords', 'Loading...'],
            ['processing', 'Processing...'],
            ['first, last, next, previous', 'First, Last, Next, Previous'],
            ['copy, excel, hideColumns, restoreColumns', 'Copy, Excel, Hide Columns, Restore'],
            ['generatedAt', 'Generated at (in the Excel title)'],
            ['reloadPage, tryAgain', 'Reload page, Try again'],
            ['sessionExpiredTitle, sessionExpiredText', 'Session expired and its explanation'],
            ['signInRequiredTitle, signInRequiredText', 'Sign in required and its explanation'],
            ['accessDeniedTitle, accessDeniedText', 'Access denied and its explanation'],
            ['loadErrorTitle, loadErrorText', 'Could not load data and its explanation'],
        ]" />
        <p>The loader message (<code>settings.loader.message</code>) and the column titles in your table markup are your own text: wrap them in <code>__()</code> yourself, or translate them the same way, since the loader message is also run through <code>__()</code>.</p>
    </x-docs::section>

    <x-docs::section id="override" title="Replace a text">
        <p>To change a text for every table, set it under <code>language</code> in <code>config/dt-tables.php</code>. To change it for one table, put a <code>language</code> object in that table's <code>settings</code> in <code>resources/data-tables/{table}.json</code>. The order is the table's own, then the config, then the English default, and the result is translated.</p>
        <x-docs::code lang="php" title="config/dt-tables.php">
            'language' => [
                'emptyTable' => 'Nothing here yet',
            ],
        </x-docs::code>
        <x-docs::code lang="json" title="resources/data-tables/customers-table.json">
            {
                "settings": {
                    "language": { "emptyTable": "No customers yet" }
                }
            }
        </x-docs::code>
    </x-docs::section>
@endsection
