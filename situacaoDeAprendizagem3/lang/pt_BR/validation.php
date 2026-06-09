<?php
 return [

    'custom' => [
        'nomeProduto' => [
            'required' => 'O nome do produto é obrigatório.',
            'max' => 'O nome do produto deve ter no máximo :max caracteres.',
        ],

        'materia' => [
            'required' => 'A matéria-prima é obrigatória.',
            'max' => 'A matéria-prima deve ter no máximo :max caracteres.',
        ],

        'dataFabricacao' => [
            'required' => 'A data de fabricação é obrigatória.',
            'date' => 'O campo data de fabricação deve ser uma data válida.',
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