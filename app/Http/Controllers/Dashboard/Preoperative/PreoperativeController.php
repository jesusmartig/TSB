<?php

namespace App\Http\Controllers\Dashboard\Preoperative;

use App\Http\Controllers\Controller;
use App\Http\Requests\Preoperative\PreoperativeRequest;
use App\Http\Resources\Preoperative\PreoperativeCollection;
use App\Http\Resources\Preoperative\PreoperativeResource;
use App\Models\Preoperative;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreoperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): PreoperativeCollection
    {
        //
        $preoperative = DB::table('preoperative')->orderBy('preoperative.created_at', 'ASC')->get();

        return PreoperativeCollection::make($preoperative);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreoperativeRequest $request)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $activity = Preoperative::create([
                'registration' => $request['registration'],
                'mileage' => $request['mileage'],
                'trafficlicense' => $request['trafficlicense'],
                'mechanicaltechnicalinspection' => $request['mechanicaltechnicalinspection'],
                'obligatoryinsurance' => $request['obligatoryinsurance'],
                'thirdpartyinsurance' => $request['thirdpartyinsurance'],
                'drivinglicense' => $request['drivinglicense'],
                'routes' => $request['routes'],
                'emergencycontacts' => $request['emergencycontacts'],
                'boots' => $request['boots'],
                'photoluminescentvest' => $request['photoluminescentvest'],
                'gloves' => $request['gloves'],
                'hearingprotection' => $request['hearingprotection'],
                'monoglasses' => $request['monoglasses'],
                'phone' => $request['phone'],
                'hydration' => $request['hydration'],
                'windshield' => $request['windshield'],
                'wiperwasher' => $request['wiperwasher'],
                'sides' => $request['sides'],
                'rearglass' => $request['rearglass'],
                'lrearwindshield' => $request['lrearwindshield'],
                'rearviewmirror' => $request['rearviewmirror'],
                'lateralmirrors' => $request['lateralmirrors'],
                'cushioncondition' => $request['cushioncondition'],
                'conditionofthechairs' => $request['conditionofthechairs'],
                'upholsterycondition' => $request['upholsterycondition'],
                'vehiclecleaning' => $request['vehiclecleaning'],
                'doorhandles' => $request['doorhandles'],
                'doorplates' => $request['doorplates'],
                'doorlocks' => $request['doorlocks'],
                'glasslifter' => $request['glasslifter'],
                'dooradjustment' => $request['dooradjustment'],
                'horn' => $request['horn'],
                'reversealarm' => $request['reversealarm'],
                'instruments' => $request['instruments'],
                'frontsbelts' => $request['frontsbelts'],
                'rearsbelts' => $request['rearsbelts'],
                'electriccontrols' => $request['electriccontrols'],
                'controlpanel' => $request['controlpanel'],
                'airconditioning' => $request['airconditioning'],
                'accidentkit' => $request['accidentkit'],
                'photographiccamera' => $request['photographiccamera'],
                'batterypoweredflashlight' => $request['batterypoweredflashlight'],
                'firstaidkit' => $request['firstaidkit'],
                'low' => $request['low'],
                'full' => $request['full'],
                'directionals' => $request['directionals'],
                'coconuts' => $request['coconuts'],
                'reverse' => $request['reverse'],
                'antifog' => $request['antifog'],
                'cabinlights' => $request['cabinlights'],
                'emergency' => $request['emergency'],
                'thirdstop' => $request['thirdstop'],
                'engineoil' => $request['engineoil'],
                'lastchange' => $request['lastchange'],
                'address' => $request['address'],
                'brakefluid' => $request['brakefluid'],
                'refrigerant' => $request['refrigerant'],
                'windshieldwater' => $request['windshieldwater'],
                'fuellevel' => $request['fuellevel'],
                'lubricantleaks' => $request['lubricantleaks'],
                'waterleaks' => $request['waterleaks'],
                'securitypin' => $request['securitypin'],
                'loaded' => $request['loaded'],
                'current' => $request['current'],
                'reflectivetriangles' => $request['reflectivetriangles'],
                'cat' => $request['cat'],
                'toolbox' => $request['toolbox'],
                'crosspiece' => $request['crosspiece'],
                'tacos' => $request['tacos'],
                'sparetire' => $request['sparetire'],
                'jumpercables' => $request['jumpercables'],
                'handbrake' => $request['handbrake'],
                'fanbelt' => $request['fanbelt'],
                'mooringdevices' => $request['mooringdevices'],
                'straps' => $request['straps'],
                'hooks' => $request['hooks'],
                'trailercoupling' => $request['trailercoupling'],
                'wearfrontright' => $request['wearfrontright'],
                'wearleftfront' => $request['wearleftfront'],
                'wearrightrear' => $request['wearrightrear'],
                'wearleftrear' => $request['wearleftrear'],
                'wearsparetire' => $request['wearsparetire'],
                'pressfrontright' => $request['pressfrontright'],
                'pressleftfront' => $request['pressleftfront'],
                'pressrightrear' => $request['pressrightrear'],
                'pressleftrear' => $request['pressleftrear'],
                'presssparetire' => $request['presssparetire'],
                'observations' => $request['observations'],
                'vehicle' => $request['vehicle'],
                'driver' => $request['driver'],
            ]);

            // Commit de la transacción
            DB::commit();
            return PreoperativeResource::make($activity);

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
    public function show($id): PreoperativeResource
    {
        //
        $preoperative = DB::table('preoperative')->where('preoperative.id', '=', $id)->first();

        return PreoperativeResource::make($preoperative);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PreoperativeRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $preoperative = Preoperative::findOrFail($id);

            $validatedData = $request->validated();

            $preoperative->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return PreoperativeResource::make($preoperative);

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
    public function destroy($id)
    {
        //

        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $preoperative = Preoperative::findOrFail($id);

            $preoperative->delete();

            // Commit de la transacción
            DB::commit();

            return PreoperativeResource::make($preoperative);

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
