<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Pole :attribute musi być zaznaczone.',
    'active_url' => ':attribute nie jest prawidłowym adresem URL.',
    'after' => ':attribute musi być datą po dacie :date.',
    'after_or_equal' => ':attribute musi być datą po lub równą dacie :date.',
    'alpha' => ':attribute może tylko zawierać litery.',
    'alpha_dash' => ':attribute może tylko zawierać litery, numery, ukośniki i twardą spacje.',
    'alpha_num' => ':attribute może tylko zawierać litery i numery.',
    'array' => ':attribute musi być zbiorem.',
    'before' => ':attribute musi być datą przed datą :date.',
    'before_or_equal' => ':attribute musi być datą przed lub równą dacie :date.',
    'between' => [
        'numeric' => ':attribute musi być pomiędzy :min a :max.',
        'file' => ':attribute musi być pomiędzy :min a :max kilobajtów.',
        'string' => ':attribute musi mieć pomiędzy :min a :max znaków.',
        'array' => ':attribute musi mieć pomiędzy :min a :max elementami.',
    ],
    'boolean' => ':attribute musi być prawdą lub fałszem.',
    'confirmed' => ':attribute potwierdzenie się nie zgadza.',
    'date' => ':attribute nie jest prawidłową datą.',
    'date_equals' => ':attribute musi być równe dacie :date.',
    'date_format' => ':attribute nie jest w wymaganym formacie: :format.',
    'different' => ':attribute i :other muszą być różne od siebie.',
    'digits' => ':attribute muszą być :digits cyframi.',
    'digits_between' => ':attribute musi być cyframi pomiędzy :min i :max.',
    'dimensions' => ':attribute ma nieprawidłowe wymiary.',
    'distinct' => ':attribute jest duplikatem.',
    'email' => ':attribute musi być prawidłowym adresem e-mail.',
    'ends_with' => ':attribute musi kończyć się jedną z wartości: :values',
    'exists' => 'Wybrany :attribute nie jest prawidłowy.',
    'file' => ':attribute musi być plikiem.',
    'filled' => 'Pole :attribute musi być wypełnione.',
    'gt' => [
        'numeric' => ':attribute musi być większe od :value.',
        'file' => ':attribute musi mieć więcej niż :value kilobajtów.',
        'string' => ':attribute musi mieć więcej niż :value znaków.',
        'array' => ':attribute musi mieć więcej niż :value elementów.',
    ],
    'gte' => [
        'numeric' => ':attribute musi być większe od lub równe :value.',
        'file' => ':attribute musi mieć więcej lub równo :value kilobajtów.',
        'string' => ':attribute musi mieć więcej lub równo :value znaków.',
        'array' => ':attribute musi mieć :value lub więcej elementów.',
    ],
    'image' => ':attribute musi być obrazem.',
    'in' => 'wybrany :attribute nie jest prawidłowy.',
    'in_array' => ':attribute nie jest zawarte w zbiorze :other.',
    'integer' => ':attribute musi być liczbą.',
    'ip' => ':attribute musi być adresem IP.',
    'ipv4' => ':attribute musi być adresem IPv4.',
    'ipv6' => ':attribute musi być adresem IPv6.',
    'json' => ':attribute musi być prawidłowym ciągiem w formacie JSON.',
    'lt' => [
        'numeric' => ':attribute musi być mniejsze :value.',
        'file' => ':attribute musi mieć mniej niż :value kilobajtów.',
        'string' => ':attribute musi mieć mniej niż :value znaków.',
        'array' => ':attribute musi mieć mniej niż :value elementów.',
    ],
    'lte' => [
        'numeric' => ':attribute musi być mniejsze lub równe :value.',
        'file' => ':attribute musi mieć mniej lub równo :value kilobajtów.',
        'string' => ':attribute musi mieć mniej lub równo :value znaków.',
        'array' => ':attribute musi mieć mniej lub równo :value elementów.',
    ],
    'max' => [
        'numeric' => ':attribute nie może być większe niż :max.',
        'file' => ':attribute nie może być większe niż :max kilobajtów.',
        'string' => ':attribute nie może mieć więcej niż :max znaków.',
        'array' => ':attribute nie może mieć więcej niż :max elementów.',
    ],
    'mimes' => ':attribute musi być formatu: :values.',
    'mimetypes' => ':attribute musi być w jednym z formatów: :values.',
    'min' => [
        'numeric' => ':attribute musi być większe lub równe od :min.',
        'file' => ':attribute musi mieć więcej lub równo :min kilobajtów.',
        'string' => ':attribute musi mieć conajmniej :min znaków.',
        'array' => ':attribute musi mieć conajmniej :min elementów.',
    ],
    'not_in' => 'Wybrany :attribute nie jest prawidłowy.',
    'not_regex' => ':attribute ma zły format.',
    'numeric' => ':attribute musi być numerem.',
    'present' => ':attribute musi być obecny.',
    'regex' => ':attribute ma zły format.',
    'required' => ':attribute jest wymagane.',
    'required_if' => ':attribute jest wymagane gdy :other jest równe :value.',
    'required_unless' => ':attribute jest wymagane gdy :other ma wartość: :values.',
    'required_with' => ':attribute jest wymagane gdy :values jest obecne.',
    'required_with_all' => ':attribute jest wymagane gdy :values jest obecne.',
    'required_without' => ':attribute jest wymagane gdy :values nie jest obecne.',
    'required_without_all' => ':attribute jest wymagane gdy któryś z :values jest obecne.',
    'same' => ':attribute i :other muszą być równe.',
    'size' => [
        'numeric' => ':attribute musi być równe :size.',
        'file' => ':attribute musi mieć :size kilobajtów.',
        'string' => ':attribute musi mieć :size znaków.',
        'array' => ':attribute musi zawierać :size elementów.',
    ],
    'starts_with' => ':attribute musi mieć jeden z przedrostków: :values',
    'string' => ':attribute musi być ciągiem znaków.',
    'timezone' => ':attribute musi być prawidłową strefą czasową.',
    'unique' => ':attribute jest już zajęte.',
    'uploaded' => ':attribute nie zostało wgrane poprawnie.',
    'url' => ':attribute ma zły format.',
    'uuid' => ':attribute nie jest prawidłowym UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],
];
