<?php
/**
 * Configuration file for 'yii message/extract' command.
 *
 * It contains parameters for source code messages extraction.
 */
return [
    //'color' => null,
    //'interactive' => true,
    //'help' => null,
    'sourcePath' => __DIR__ . DIRECTORY_SEPARATOR . '..',
    'messagePath' => __DIR__,
    'languages' => ['sk'],
    'translator' => 'Faq::t',
    'sort' => true,
    'overwrite' => true,
    'removeUnused' => true,
    'markUnused' => false,
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/vendor',
        '/BaseYii.php',
    ],
    'only' => [
        '*.php',
    ],
    'format' => 'php',
    /*
    // Message categories to ignore
    'ignoreCategories' => [
        'yii',
    ],
     */
];
