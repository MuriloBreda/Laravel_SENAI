<?php

return [

    'custom' => [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'max' => 'O nome deve ter no máximo :max caracteres.',
        ],

        'num_corredor' => [
            'required' => 'O número do corredor é obrigatório.',
            'numeric' => 'O número do corredor deve ser numérico.',
            'max' => 'O número do corredor não pode ser maior que :max.',
        ],

        'quantidade' => [
            'required' => 'A quantidade é obrigatória.',
            'numeric' => 'A quantidade deve ser numérica.',
            'max' => 'A quantidade não pode ser maior que :max.',
        ],

        'preco' => [
            'required' => 'O preço é obrigatório.',
            'numeric' => 'O preço deve ser numérico.',
            'min' => 'O preço deve ser pelo menos :min.',
        ],
    ],

];