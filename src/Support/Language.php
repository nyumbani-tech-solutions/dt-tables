<?php

namespace Nyumbani\DtTables\Support;

class Language
{
    /**
     * Every text a table shows, as the English sentence, which is also its translation key
     */
    protected const DEFAULTS = [
        'searchPlaceholder' => 'Type to search',
        'filterPlaceholder' => 'Search...',
        'showAll' => 'Show All',
        'info' => 'Showing _START_ to _END_ of _TOTAL_ entries',
        'infoEmpty' => 'Showing 0 to 0 of 0 entries',
        'infoFiltered' => '(filtered from _MAX_ total entries)',
        'emptyTable' => 'No data available in table',
        'zeroRecords' => 'No matching records found',
        'loadingRecords' => 'Loading...',
        'processing' => 'Processing...',
        'first' => 'First',
        'last' => 'Last',
        'next' => 'Next',
        'previous' => 'Previous',
        'copy' => 'Copy',
        'excel' => 'Excel',
        'hideColumns' => 'Hide Columns',
        'restoreColumns' => 'Restore',
        'generatedAt' => 'Generated at',
        'reloadPage' => 'Reload page',
        'tryAgain' => 'Try again',
        'sessionExpiredTitle' => 'Session expired',
        'sessionExpiredText' => 'Your session has expired. Reload the page to continue.',
        'signInRequiredTitle' => 'Sign in required',
        'signInRequiredText' => 'You need to sign in to see this data.',
        'accessDeniedTitle' => 'Access denied',
        'accessDeniedText' => 'You are not allowed to see this data.',
        'loadErrorTitle' => 'Could not load data',
        'loadErrorText' => 'Something went wrong while loading the table.',
    ];

    /**
     * Get every text of a table in the app's language: the defaults, then the config and table overrides, each translated
     *
     * @author Alvin G. Kaburu <geekaburu@nyumbanitech.co.ke>
     */
    public static function lines(array $tableOverrides = []): array
    {
        //  Layer the overrides over the defaults, ignoring keys the package does not know
        $lines = array_replace(
            self::DEFAULTS,
            array_intersect_key((array) config('dt-tables.language', []), self::DEFAULTS),
            array_intersect_key($tableOverrides, self::DEFAULTS),
        );

        //  Translate each text, keyed by its English sentence
        return array_map(fn (string $line) => __($line), $lines);
    }

    /**
     * Arrange the texts the way DataTables reads its language option
     *
     * @author Alvin G. Kaburu <geekaburu@nyumbanitech.co.ke>
     */
    public static function forDataTables(array $lines): array
    {
        //  Return the nested structure DataTables expects
        return [
            'info' => $lines['info'],
            'infoEmpty' => $lines['infoEmpty'],
            'infoFiltered' => $lines['infoFiltered'],
            'emptyTable' => $lines['emptyTable'],
            'zeroRecords' => $lines['zeroRecords'],
            'loadingRecords' => $lines['loadingRecords'],
            'processing' => $lines['processing'],
            'paginate' => [
                'first' => $lines['first'],
                'last' => $lines['last'],
                'next' => $lines['next'],
                'previous' => $lines['previous'],
            ],
            'buttons' => [
                'colvisRestore' => $lines['restoreColumns'],
            ],
        ];
    }
}
