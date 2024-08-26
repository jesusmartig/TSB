<?php

namespace App\Http\Controllers\Helpers\Cities;

use App\Http\Controllers\Controller;
use App\Http\Requests\Citie\CitieRequest;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\Banks\BanksResource;
use App\Http\Resources\Citie\CitieCollection;
use App\Http\Resources\Citie\CitieResource;
use App\Models\Activity;
use App\Models\Cities;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): CitieCollection
    {
        //
        $cities = DB::table('cities')->orderBy('cities.created_at', 'ASC')->get();

        return CitieCollection::make($cities);

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
    public function store(CitieRequest $request): CitieResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $cities = Cities::create([
                'cities' => $request->cities,
                'department' => $request->department,
            ]);

            // Commit de la transacción
            DB::commit();
            return CitieResource::make($cities);

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
    public function show($id): CitieResource
    {
        //
        $cities = DB::table('cities')->where('cities.id', '=', $id)->first();

        return CitieResource::make($cities);
    }

    public function showCities($id): CitieCollection
    {
        //
        $cities = DB::table('cities')->where('cities.id', '=', $id)->get();

        return CitieCollection::make($cities);
    }

    public function department($id): CitieCollection
    {
        //
        $cities = DB::table('cities')->where('cities.department', '=', $id)->get();

        return CitieCollection::make($cities);
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
    public function update(CitieRequest $request, $id): CitieResource
    {
        //
        try {
            DB::beginTransaction();

            $cities = Cities::findOrFail($id);

            $validatedData = $request->validated();

            $cities->update($validatedData);

            DB::commit();

            return CitieResource::make($cities);


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
    public function destroy($id): CitieResource
    {
        //
        try {
            DB::beginTransaction();

            $cities = Cities::findOrFail($id);

            $cities->delete();

            DB::commit();

            return CitieResource::make($cities);

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
