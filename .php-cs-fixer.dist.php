<?php

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@PHP70Migration' => true,
        '@PHP71Migration' => true,
        '@PHP73Migration' => true,
        '@PHP74Migration' => true,
        '@PHP80Migration' => true,
        '@PHP81Migration' => true,
        '@PHP82Migration' => true,
        '@Symfony:risky' => true,
        'array_syntax' => ['syntax' => 'short'],
        'blank_line_after_opening_tag' => true,
        'concat_space' => false,
        'linebreak_after_opening_tag' => true,
        'no_extra_blank_lines' => false,
        'multiline_whitespace_before_semicolons' => false,
        'no_mixed_echo_print' => ['use' => 'print'],
        'types_spaces' => ['space' => 'single'],
        'ordered_imports' => true,
        'phpdoc_align' => false,
        'phpdoc_summary' => false,
        'simplified_null_return' => false,
        'self_accessor' => false,
        'ordered_class_elements' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(['src/', 'tests/'])
    )
;
