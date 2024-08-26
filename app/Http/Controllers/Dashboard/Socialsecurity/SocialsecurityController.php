<?php

namespace App\Http\Controllers\Dashboard\Socialsecurity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Socialsecurity\SocialsecurityRequest;
use App\Http\Resources\Activity\ActivityCollection;
use App\Http\Resources\Soatpolicy\SoatpolicyCollection;
use App\Http\Resources\Socialsecurity\SocialsecurityCollection;
use App\Http\Resources\Socialsecurity\SocialsecurityResource;
use App\Models\Socialsecurity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialsecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): SocialsecurityCollection
    {
        //
        $socialsecurity = DB::table('social_security')->orderBy('social_security.created_at', 'ASC')->get();

        return SocialsecurityCollection::make($socialsecurity);
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

            $socialsecurity = Socialsecurity::create([
                'contributor' => $request['contributor'],
                'contributorDocument' => $request['contributorDocument'],
                'form' => $request['form'],
                'typesReturns' => $request['typesReturns'],
                'pensionperiod' => $request['pensionperiod'],
                'healthperiod' => $request['healthperiod'],
                'shares' => $request['shares'],
                'driver' => $request['driver'],
            ]);

            // Commit de la transacción
            DB::commit();
            return SocialsecurityResource::make($socialsecurity);

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
    public function show($id): SocialsecurityResource
    {
        //
        $socialsecurity = DB::table('social_security')->where('social_security.id', '=', $id)->get();

        return SocialsecurityResource::make($socialsecurity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SocialsecurityRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $socialsecurity = Socialsecurity::findOrFail($id);

            $validatedData = $request->validated();

            $socialsecurity->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return SocialsecurityResource::make($socialsecurity);


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

            $socialsecurity = Socialsecurity::findOrFail($id);

            $socialsecurity->delete();

            // Commit de la transacción
            DB::commit();

            return SocialsecurityResource::make($socialsecurity);

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
