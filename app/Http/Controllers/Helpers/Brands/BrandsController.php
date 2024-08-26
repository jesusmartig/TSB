<?php

namespace App\Http\Controllers\Helpers\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brands\BrandsRequest;
use App\Http\Resources\Banks\BanksResource;
use App\Http\Resources\Brands\BrandsCollection;
use App\Http\Resources\Brands\BrandsResource;
use App\Models\Brands;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): BrandsCollection
    {
        //
        $brands = DB::table('brands')->orderBy('brands.created_at', 'ASC')->get();

        return BrandsCollection::make($brands);
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
    public function store(BrandsRequest $request): brandsResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $brands = Brands::create([
                'name' => $request->name
            ]);

            // Commit de la transacción
            DB::commit();
            return BrandsResource::make($brands);

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
    public function show($id): BrandsResource
    {
        //
        $brands = DB::table('brands')->where('brands.id', '=', $id)->first();

        return BanksResource::make($brands);
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
    public function update(BrandsRequest $request, $id): BrandsResource
    {
        //
        try {
            DB::beginTransaction();

            $brands = Brands::findOrFail($id);

            $validatedData = $request->validated();

            $brands->update($validatedData);

            DB::commit();

            return BrandsResource::make($brands);


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
    public function destroy($id): BrandsResource
    {
        //
        try {
            DB::beginTransaction();

            $brands = Brands::findOrFail($id);

            $brands->delete();

            DB::commit();

            return BrandsResource::make($brands);

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
