<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Extend news importer',
    'description' => 'Care about additional import fields',
    'category' => 'be',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'company' => 'ringer.it',
    'shy' => '',
    'priority' => '',
    'module' => '',
    'state' => 'alpha',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'modify_tables' => '',
    'clearCacheOnLoad' => 1,
    'lockType' => '',
    'version' => '1.0.2',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.4-8.99.99',
            'news' => '3.0.0-5.5.0',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);