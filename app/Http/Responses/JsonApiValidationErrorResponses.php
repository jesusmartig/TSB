<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class JsonApiValidationErrorResponses extends JsonResponse
{

    public function __construct(ValidationException $exception)
    {

        $title = $exception->getMessage();

        $data = [
            'errors' => collect($exception->errors())
                ->map(function ($message, $field) use ($title) {
                    return [
                        'title' => $title,
                        'detail' => $message[0],
                        'source' => [
                            'pointer' => $field
                        ]
                    ];
                })->values()
        ];

        $headers = [
            'content-type' => 'application/json',
            'accept' => 'application/json',
        ];

        parent::__construct($data, 422, $headers);
    }
}
