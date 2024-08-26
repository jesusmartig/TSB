<?php

namespace App\Http\Controllers\Helpers\VehicleClass;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleClass\VehicleClassRequest;
use App\Http\Resources\VehicleClass\VehicleClassCollection;
use App\Http\Resources\VehicleClass\VehicleClassResource;
use App\Models\VehicleClass;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): VehicleClassCollection
    {
        //
        $vehicleclass = DB::table('vehicle_class')->orderBy('vehicle_class.created_at', 'ASC')->get();

        return VehicleClassCollection::make($vehicleclass);
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
    public function store(VehicleClassRequest $request): VehicleClassResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $vehicleclas = VehicleClass::create([
                'activityCode' => $request->activityCode,
                'activity' => $request->activity,
            ]);

            // Commit de la transacción
            DB::commit();
            return VehicleClassResource::make($vehicleclas);

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
    public function show($id): VehicleClassResource
    {
        //
        $vehicleclas = DB::table('vehicle_class')->where('vehicle_class.id', $id)->first();

        return VehicleClassResource::make($vehicleclas);
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
    public function update(Request $request, $id): VehicleClassResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $vehicleclas = VehicleClass::findOrFail($id);

            $validatedData = $request->validated();

            $vehicleclas->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return VehicleClassResource::make($vehicleclas);


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
    public function destroy($id): VehicleClassResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $vehicleclas = VehicleClass::findOrFail($id);

            $vehicleclas->delete();

            // Commit de la transacción
            DB::commit();

            return VehicleClassResource::make($vehicleclas);

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
