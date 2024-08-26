<?php

namespace App\Http\Controllers\Helpers\Activity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\ActivityRequest;
use App\Http\Resources\Activity\ActivityCollection;
use App\Http\Resources\Activity\ActivityResource;
use App\Models\Activity;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(): ActivityCollection
    {
        //
        $activities = DB::table('activities')->orderBy('activities.created_at', 'ASC')->get();

        return ActivityCollection::make($activities);
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
    public function store(ActivityRequest $request): ActivityResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $activity = Activity::create([
                'activityCode' => $request->activityCode,
                'activity' => $request->activity,
            ]);

            // Commit de la transacción
            DB::commit();
            return ActivityResource::make($activity);

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): ActivityResource
    {
        //
        $activities = DB::table('activities')->where('activities.id', $id)->first();

        return ActivityResource::make($activities);
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
    public function update(ActivityRequest $request, $id): ActivityResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $activity = Activity::findOrFail($id);

            $validatedData = $request->validated();

            $activity->update($validatedData);

            // Commit de la transacción
            DB::commit();

            return ActivityResource::make($activity);


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
    public function destroy($id)
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $activity = Activity::findOrFail($id);

            $activity->delete();

            // Commit de la transacción
            DB::commit();

            return ActivityResource::make($activity);

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
