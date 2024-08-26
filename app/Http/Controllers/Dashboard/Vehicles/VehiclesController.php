<?php

namespace App\Http\Controllers\Dashboard\Vehicles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vehicles\VehiclesRequest;
use App\Http\Resources\VehicleClass\VehicleClassCollection;
use App\Http\Resources\Vehicles\VehiclesCollection;
use App\Http\Resources\Vehicles\VehiclesResource;
use App\Models\Vehicle;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): VehiclesCollection
    {
        //
        $vehicles = DB::table('vehicles')->select('vehicles.*','brands.name as brandsName','vehicle_class.*', 'type_documents.prefix','type_documents.name',)
            ->join('vehicle_class', 'vehicles.vehicleClass', '=', 'vehicle_class.id')
            ->join('brands', 'vehicles.brand', '=', 'brands.id')
            ->join('type_documents', 'vehicles.documentType', '=', 'type_documents.id')
            ->orderBy('vehicles.created_at', 'ASC')->get();

        return VehiclesCollection::make($vehicles);
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
     * @return \Illuminate\Http\Response
     */
    public function store(VehiclesRequest $request)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $vehicles = Vehicles::create([
                'vehiclePlate' => $request['vehiclePlate'],
                'transitLicense' => $request['transitLicense'],
                'typeService' => $request['typeService'],
                'vehicleClass' => $request['vehicleClass'],
                'brand' => $request['brand'],
                'line' => $request['line'],
                'model' => $request['model'],
                'color' => $request['color'],
                'serialNumber' => $request['serialNumber'],
                'engineNumber' => $request['engineNumber'],
                'chassisNumber' => $request['chassisNumber'],
                'vinNumber' => $request['vinNumber'],
                'cylinderCapacity' => $request['cylinderCapacity'],
                'bodyType' => $request['bodyType'],
                'fuelType' => $request['fuelType'],
                'initialRegistrationDate' => $request['initialRegistrationDate'],
                'transitAuthority' => $request['transitAuthority'],
                'doors' => $request['doors'],
                'LoadingCapacity' => $request['LoadingCapacity'],
                'vehicleGrossWeight' => $request['vehicleGrossWeight'],
                'seatedPassengerCapacity' => $request['seatedPassengerCapacity'],
                'numberAxles' => $request['numberAxles'],
                'proprietor' => $request['proprietor'],
                'documentType' => $request['documentType'],
                'numDocument' => $request['numDocument'],
                'usId' => $request['usId'],
            ]);

            // Commit de la transacción
            DB::commit();

            return VehiclesResource::make($vehicles);

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
                'message' => $x->getMessage()
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): VehiclesResource
    {
        //
        $vehicles = DB::table('vehicles')->select('vehicles.*','brands.name as brandsName','vehicle_class.*', 'type_documents.prefix','type_documents.name',)
            ->join('vehicle_class', 'vehicles.vehicleClass', '=', 'vehicle_class.id')
            ->join('brands', 'vehicles.brand', '=', 'brands.id')
            ->join('type_documents', 'vehicles.documentType', '=', 'type_documents.id')
            ->where('vehicles.id', '=', $id)->first();

        return VehiclesResource::make($vehicles);
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
    public function update(VehiclesRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $vehicles = Vehicles::findOrFail($id);

            $validatedData = $request->validated();

            $vehicles->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return VehiclesResource::make($vehicles);

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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): VehiclesResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $vehicles = Vehicle::findOrFail($id);

            $vehicles->delete();

            // Commit de la transacción
            DB::commit();

            return VehiclesResource::make($vehicles);

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
