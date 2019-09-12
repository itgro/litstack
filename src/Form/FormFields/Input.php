<?php

namespace AwStudio\Fjord\Form\FormFields;

class Input
{
    const TRANSLATABLE = true;

    // TODO: 'type' => 'string' / 'type' => ['string', 'array']
    const REQUIRED = [
        'type',
        'id',
        'title',
    ];

    const DEFAULTS = [
        'translatable' => false
    ];
}