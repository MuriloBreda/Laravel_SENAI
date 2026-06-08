<?php
 return [

    'custom' => [
        'nomeSetor' => [
            'required' => 'O nome é obrigatório.',
            'max' => 'O nome deve ter no máximo :max caracteres.',
        ],

        'numCorredor' => [
            'required' => 'O número é obrigatório.',
            'numeric' => 'O número do setor deve ser um número.',
            'max' => 'O número do setor não pode ser maior que :max.',
        ],

        'quantidade' => [
            'required' => 'O campo quantidade é obrigatório.',
            'numeric' => 'O campo quantidade aceita apenas números.',
            'max' => 'O número de produtos não pode ser maior que :max.',
        ],

        'preco' => [
            'required' => 'É obrigatório informar o valor do produto.',
            'numeric' => 'O campo preço deve ser um número.',
        ],
    ],
];