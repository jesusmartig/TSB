<?php

namespace App\Http\Controllers\Helpers\Banks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banks\BanksRequest;
use App\Http\Resources\Banks\BanksCollection;
use App\Http\Resources\Banks\BanksResource;
use App\Models\Banks;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): BanksCollection
    {
        //
        $banks = DB::table('banks')->orderBy('banks.created_at', 'ASC')->get();

        return BanksCollection::make($banks);
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
    public function store(BanksRequest $request): BanksResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $banks = Banks::create([
                'banksName' => $request->banksName
            ]);

            // Commit de la transacción
            DB::commit();
            return BanksResource::make($banks);

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
    public function show($id): BanksResource
    {
        //
        $banks = DB::table('banks')->where('banks.id', '=', $id)->first();

        return BanksResource::make($banks);
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
    public function update(BanksRequest $request, $id): BanksResource
    {
        //
        try {
            DB::beginTransaction();

            $banks = Banks::findOrFail($id);

            $validatedData = $request->validated();

            $banks->update($validatedData);

            DB::commit();

            return BanksResource::make($banks);


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
    public function destroy($id): BanksResource
    {
        //
        try {
            DB::beginTransaction();

            $banks = Banks::findOrFail($id);

            $banks->delete();

            DB::commit();

            return BanksResource::make($banks);

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
