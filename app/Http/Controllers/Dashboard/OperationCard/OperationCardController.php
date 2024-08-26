<?php

namespace App\Http\Controllers\Dashboard\OperationCard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperationCard\OperationCardRequest;
use App\Http\Resources\OperationCard\OperationCardCollection;
use App\Http\Resources\OperationCard\OperationCardResource;
use App\Models\OperationCard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): OperationCardCollection
    {
        //
        $operationcard = DB::table('operation_card')->orderBy('operation_card.created_at', 'ASC')->get();

        return OperationCardCollection::make($operationcard);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OperationCardRequest $request)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $operationcard = OperationCard::create([
                'affiliateCompany' => $request->affiliateCompany,
                'expeditionDate' => $request->expeditionDate,
                'validitystartDate' => $request->validitystartDate,
                'expirationDate' => $request->expirationDate,
                'operationcard' => $request->operationcard,
                'operationcardType' => $request->operationcardType,
                'shares' => $request->shares,
                'vehicle' => $request->vehicle,
            ]);

            // Commit de la transacción
            DB::commit();
            return OperationCardResource::make($operationcard);

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
        $operationcard = DB::table('operation_card')->where('operation_card.id', '=', $id)->first();

        return OperationCardResource::make($operationcard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OperationCardRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $operationcard = OperationCard::findOrFail($id);

            $validatedData = $request->validated();

            $operationcard->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return OperationCardResource::make($operationcard);

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

            $activity = OperationCard::findOrFail($id);

            $activity->delete();

            // Commit de la transacción
            DB::commit();

            return OperationCardResource::make($activity);

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
