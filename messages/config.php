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
    'removeUnused' => false,
    'markUnused' => true,
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
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

    //'db' => 'db',
    //'sourceMessageTable' => '{{%source_message}}',
    //'messageTable' => '{{%message}}',
    //'catalog' => 'messages',
    //'ignoreCategories' => [],
    //'phpFileHeader' => '',
    //'phpDocBlock' => null,
];
