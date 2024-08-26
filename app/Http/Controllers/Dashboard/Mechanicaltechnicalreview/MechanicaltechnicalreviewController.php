<?php

namespace App\Http\Controllers\Dashboard\Mechanicaltechnicalreview;

use App\Http\Controllers\Controller;
use App\Http\Requests\Mechanicaltechnicalreview\MechanicaltechnicalreviewRequest;
use App\Http\Resources\Mechanicaltechnicalreview\MechanicaltechnicalreviewCollection;
use App\Http\Resources\Mechanicaltechnicalreview\MechanicaltechnicalreviewResource;
use App\Models\Mechanicaltechnicalreview;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MechanicaltechnicalreviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): MechanicaltechnicalreviewCollection
    {
        //
        $mechanicaltechnicalreview = DB::table('mechanical_technical_review')->orderBy('mechanical_technical_review.created_at', 'ASC')->get();

        return MechanicaltechnicalreviewCollection::make($mechanicaltechnicalreview);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MechanicaltechnicalreviewRequest $request)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $mechanicaltechnicalreview = Mechanicaltechnicalreview::create([
                'expeditionDate' => $request->expeditionDate,
                'effectiveDate' => $request->effectiveDate,
                'cdaSssuesRtm' => $request->cdaSssuesRtm,
                'valid' => $request->valid,
                'certificate' => $request->certificate,
                'shares' => $request->shares,
                'vehicle' => $request->vehicle,
            ]);

            // Commit de la transacción
            DB::commit();
            return MechanicaltechnicalreviewResource::make($mechanicaltechnicalreview);

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
    public function show($id): MechanicaltechnicalreviewResource
    {
        //
        $mechanicaltechnicalreview = DB::table('mechanical_technical_review')->where('mechanical_technical_review.id', '=', $id)->first();

        return MechanicaltechnicalreviewResource::make($mechanicaltechnicalreview);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MechanicaltechnicalreviewRequest $request, $id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $mechanicaltechnicalreview = Mechanicaltechnicalreview::findOrFail($id);

            $validatedData = $request->validated();

            $mechanicaltechnicalreview->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return MechanicaltechnicalreviewResource::make($mechanicaltechnicalreview);


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

            $mechanicaltechnicalreview = Mechanicaltechnicalreview::findOrFail($id);

            $mechanicaltechnicalreview->delete();

            // Commit de la transacción
            DB::commit();

            return MechanicaltechnicalreviewResource::make($mechanicaltechnicalreview);

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
