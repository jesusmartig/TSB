<?php

namespace App\Http\Controllers\Dashboard\TransportCompany;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransportCompany\TransportCompanyRequest;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\TransportCompany\TransportCompanyCollection;
use App\Http\Resources\TransportCompany\TransportCompanyResource;
use App\Models\Activity;
use App\Models\TransportCompany;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TransportCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): TransportCompanyCollection
    {
        //
        $transportcompanies = DB::table('transport_companies')->orderBy('transport_companies.created_at', 'ASC')->get();

        return TransportCompanyCollection::make($transportcompanies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\TransportCompany\TransportCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TransportCompanyRequest $request)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $transportcompanies = TransportCompany::create([
                'nit' => $request->nit,
                'digit' => $request->digit,
                'businessName' => $request->businessName,
                'typePerson' => $request->typePerson,
                'acronym' => $request->acronym,
                'nationalPersontype' => $request->nationalPersontype,
                'typesSociety' => $request->typesSociety,
                'economicSector' => $request->economicSector,
                'department' => $request->department,
                'city' => $request->city,
                'codeFuec' => $request->codeFuec,
                'telephone' => $request->telephone,
                'phone' => $request->cell,
                'direction' => $request->direction,
                'email' => $request->email,
                'typeDocuments' => $request->typeDocuments,
                'document' => $request->document,
                'names' => $request->names,
            ]);

            // Commit de la transacción
            DB::commit();
            return TransportCompanyResource::make($transportcompanies);

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
     * @param \App\Models\TransportCompany $transportCompany
     * @return \Illuminate\Http\Response
     */
    public function show($transportCompany): TransportCompanyResource
    {
        //
        $transportcompanies = DB::table('transport_companies')->where('transport_companies.id', $transportCompany)->first();

        return TransportCompanyResource::make($transportcompanies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\TransportCompany\TransportCompanyRequest $request
     * @param \App\Models\TransportCompany $transportCompany
     * @return \Illuminate\Http\Response
     */
    public function update(TransportCompanyRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $transportcompanies = TransportCompany::findOrFail($id);

            $validatedData = $request->validated();

            $transportcompanies->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return TransportCompanyResource::make($transportcompanies);

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
     * @param \App\Models\TransportCompany $transportCompany
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransportCompany $transportCompany): TransportCompanyResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $transportcompanies = TransportCompany::findOrFail($transportCompany);

            $transportcompanies->delete();

            // Commit de la transacción
            DB::commit();

            return TransportCompanyResource::make($transportcompanies);

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
