<?php

namespace App\Http\Controllers\Helpers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class FilesController extends Controller
{
    //
    public function upload(Request $request)
    {
        try {
            DB::beginTransaction();

            $document = $request->shares->store('public/' . $request->username . '/' . $request->directory . '');

            DB::commit();
            $data = [
                'code' => 200,
                'status' => 'success',
                'url' => str_replace('public', 'storage', $document)
            ];
            return response()->json($data, $data['code']);


        } catch (FileException $f) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $f->getMessage()
            ], 500);
        }
    }
}
