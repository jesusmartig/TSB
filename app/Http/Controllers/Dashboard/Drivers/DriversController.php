<?php

namespace App\Http\Controllers\Dashboard\Drivers;

use App\Http\Controllers\Controller;
use App\Http\Resources\DriverLicense\DriverLicenseCollection;
use App\Http\Resources\Drivers\DriversResource;
use App\Models\Driveraffiliations;
use App\Models\DriverLicense;
use App\Models\Drivers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): DriverLicenseCollection
    {
        //
        $activities = DB::table('drivers')
            ->join('type_documents', 'drivers.typeDocument', '=', 'type_documents.id')
            ->join('departments', 'drivers.departament', '=', 'departments.id')
            ->join('cities', 'drivers.city', '=', 'cities.id')
            ->join('banks', 'drivers.banks', '=', 'banks.id')
            ->join('driver_license', 'drivers.id', '=', 'driver_license.driver')
            ->join('driver_affiliations', 'drivers.id', '=', 'driver_affiliations.driver')
            ->join('driver_contracts', 'drivers.id', '=', 'driver_contracts.driver')
            ->orderBy('drivers.created_at', 'ASC')->get();

        return DriverLicenseCollection::make($activities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $drivers = Drivers::create([
                'typeDocument' => $request->typeDocument,
                'document' => $request->document,
                'expeditionplace' => $request->expeditionplace,
                'expeditiondate' => $request->expeditiondate,
                'nameandsurname' => $request->nameandsurname,
                'gender' => $request->gender,
                'departament' => $request->departament,
                'city' => $request->city,
                'address' => $request->address,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'cellphone' => $request->cellphone,
                'banks' => $request->banks,
                'citizenshipcard' => $request->citizenshipcard,
                'curriculumvitae' => $request->curriculumvitae,
            ]);


            foreach ($request['driveraffiliations'] as $req) {
                $driveraffiliations = Driveraffiliations::create([
                    'Name' => $req["Name"],
                    'dateadmission' => $req["dateadmission"],
                    'shares' => $req["shares"],
                    'driver' => $drivers->id,
                ]);
            }

            $driverLicense = DriverLicense::create([
                'licenseno' => $request->licenseno,
                'issuedate' => $request->issuedate,
                'expirationdate' => $request->expirationdate,
                'category' => $request->category,
                'issuingtransitagencies' => $request->issuingtransitagencies,
                'driverrestrictions' => $request->driverrestrictions,
                'shares' => $request->shares,
                'driver' => $drivers->id,
            ]);


            // Commit de la transacción
            DB::commit();
            return DriversResource::make($drivers);

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
    public function show($id)
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
