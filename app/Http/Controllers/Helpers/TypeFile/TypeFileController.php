<?php

namespace App\Http\Controllers\Helpers\TypeFile;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeFile\TypeFileRequest;
use App\Http\Resources\Activity\ActivityCollection;
use App\Http\Resources\TypeFile\TypeFileCollection;
use App\Http\Resources\TypeFile\TypeFileResource;
use App\Models\TypeFile;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TypeFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): TypeFileCollection
    {
        //
        $typefiles = DB::table('type_files')->orderBy('type_files.created_at', 'ASC')->get();

        return TypeFileCollection::make($typefiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TypeFileRequest $request): TypeFileResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $activity = TypeFile::create([
                'activityCode' => $request->activityCode,
                'activity' => $request->activity,
            ]);

            // Commit de la transacción
            DB::commit();
            return TypeFileResource::make($activity);

        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        } catch (ModelNotFoundException $x) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Registro no encontrado'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): TypeFileResource
    {
        //
        $typefile = DB::table('type_files')->where('type_files.id', $id)->first();

        return TypeFileResource::make($typefile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): TypeFileResource
    {
        //
        try {
            DB::beginTransaction();

            $typefile = TypeFile::findOrFail($id);

            $typefile->delete();

            DB::commit();

            return TypeFileResource::make($typefile);

        } catch (QueryException $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        } catch (ModelNotFoundException $x) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Registro no encontrado'
            ], 404);
        }
    }
}
