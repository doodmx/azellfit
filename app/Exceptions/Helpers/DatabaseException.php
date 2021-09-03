<?php

namespace App\Exceptions\Helpers;

use Exception;

class DatabaseException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'errors' => [
                'code'   => 500,
                'title'  => 'Hubo un error al guardar el recurso',
                'detail' => 'Revise su formulario.'
            ]
        ], 500);

    }
}
