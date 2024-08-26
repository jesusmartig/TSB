<?php

namespace App\Http\Controllers\Dashboard\Soatpolicy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Soatpolicy\SoatpolicyRequest;
use App\Http\Resources\Soatpolicy\SoatpolicyCollection;
use App\Http\Resources\Soatpolicy\SoatpolicyResource;
use App\Models\SoatPolicy;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoatpolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $soatpolicy = DB::table('soat_policy')->orderBy('soat_policy.created_at', 'ASC')->get();

        return SoatpolicyCollection::make($soatpolicy);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoatpolicyRequest $request)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $soatpolicy = SoatPolicy::create([
                'policyNumber' => $request->policyNumber,
                'expeditionDate' => $request->expeditionDate,
                'startDateValidity' => $request->startDateValidity,
                'expirationDate' => $request->expirationDate,
                'rateType' => $request->rateType,
                'insurerName' => $request->insurerName,
                'shares' => $request->shares,
                'vehicle' => $request->vehicle,
            ]);

            // Commit de la transacción
            DB::commit();
            return SoatpolicyResource::make($soatpolicy);

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
    public function show($id): SoatpolicyResource
    {
        //
        $soatpolicy = DB::table('soat_policy')->where('soat_policy.id', '=', $id)->first();

        return SoatpolicyResource::make($soatpolicy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SoatpolicyRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $soatpolicy = SoatPolicy::findOrFail($id);

            $validatedData = $request->validated();

            $soatpolicy->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return SoatpolicyResource::make($soatpolicy);

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
    }
}
