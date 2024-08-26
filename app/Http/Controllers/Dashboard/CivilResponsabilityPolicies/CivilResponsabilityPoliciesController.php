<?php

namespace App\Http\Controllers\Dashboard\CivilResponsabilityPolicies;

use App\Http\Controllers\Controller;
use App\Http\Requests\CivilResponsabilityPolicies\CivilResponsabilityPoliciesRequest;
use App\Http\Resources\CivilResponsabilityPolicies\CivilResponsabilityPoliciesCollection;
use App\Http\Resources\CivilResponsabilityPolicies\CivilResponsabilityPoliciesResource;
use App\Models\CivilResponsabilityPolicies;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CivilResponsabilityPoliciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): CivilResponsabilityPoliciesCollection
    {
        //
        $civilresponsibilitypolicies = DB::table('civil_responsibility_policies')->orderBy('civil_responsibility_policies.created_at', 'ASC')->get();

        return CivilResponsabilityPoliciesCollection::make($civilresponsibilitypolicies);
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
           // $validatedData = $request->validated();

            foreach ($request['policies'] as $req) {
                $civilresponsibilitypolicies = CivilResponsabilityPolicies::create([
                    'policyNumber' => $req['policyNumber'],
                    'expeditionDate' => $req['expeditionDate'],
                    'startDateValidity' => $req['startDateValidity'],
                    'expirationDate' => $req['expirationDate'],
                    'insurerName' => $req['insurerName'],
                    'policyType' => $req['policyType'],
                    'takerDocumentNumber' => $req['takerDocumentNumber'],
                    'shares' => $req['shares'],
                    'vehicle' => $req['vehicle'],
                ]);
            }

            // Commit de la transacción
            DB::commit();
            return CivilResponsabilityPoliciesResource::make($civilresponsibilitypolicies);

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
    public function show($id): CivilResponsabilityPoliciesResource
    {
        //
        $civilresponsibilitypolicies = DB::table('civil_responsibility_policies')->where('civil_responsibility_policies.id', '=', $id)->first();

        return CivilResponsabilityPoliciesResource::make($civilresponsibilitypolicies);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CivilResponsabilityPoliciesRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $civilresponsibilitypolicies = CivilResponsabilityPolicies::findOrFail($id);

            $validatedData = $request->validated();

            $civilresponsibilitypolicies->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return CivilResponsabilityPoliciesResource::make($civilresponsibilitypolicies);

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

            $activity = CivilResponsabilityPolicies::findOrFail($id);

            $activity->delete();

            // Commit de la transacción
            DB::commit();

            return CivilResponsabilityPoliciesResource::make($activity);

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
