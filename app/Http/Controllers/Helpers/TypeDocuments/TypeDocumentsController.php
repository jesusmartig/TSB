<?php

namespace App\Http\Controllers\Helpers\TypeDocuments;

use App\Http\Controllers\Controller;
use App\Http\Requests\TypeDocuments\TypeDocumentsRequest;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\TypeDocuments\TypeDocumentsCollection;
use App\Http\Resources\TypeDocuments\TypeDocumentsResource;
use App\Models\TypeDocuments;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): TypeDocumentsCollection
    {
        //
        $typedocuments = DB::table('type_documents')->orderBy('type_documents.created_at', 'ASC')->get();

        return TypeDocumentsCollection::make($typedocuments);
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
    public function store(TypeDocumentsRequest $request): TypeDocumentsResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $typedocuments = TypeDocuments::create([
                'name' => $request->name,
                'prefix' => $request->prefix,
            ]);

            // Commit de la transacción
            DB::commit();
            return TypeDocumentsResource::make($typedocuments);

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
    public function show($id): TypeDocumentsResource
    {
        //
        $typedocuments = DB::table('type_documents')->where('type_documents.id', $id)->first();

        return TypeDocumentsResource::make($typedocuments);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TypeDocumentsRequest $request, $id): TypeDocumentsResource
    {
        //
        try {
            DB::beginTransaction();

            $typedocuments = TypeDocuments::findOrFail($id);

            $validatedData = $request->validated();

            $typedocuments->update($validatedData);

            DB::commit();

            return TypeDocumentsResource::make($typedocuments);


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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): TypeDocumentsResource
    {
        //
        try {
            DB::beginTransaction();

            $typedocuments = TypeDocuments::findOrFail($id);

            $typedocuments->delete();

            DB::commit();

            return TypeDocumentsResource::make($typedocuments);

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
