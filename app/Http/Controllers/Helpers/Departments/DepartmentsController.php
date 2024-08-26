<?php

namespace App\Http\Controllers\Helpers\Departments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Departments\DepartmentsRequest;
use App\Http\Resources\Activity\ActivityCollection;
use App\Http\Resources\Activity\ActivityResource;
use App\Http\Resources\Departments\DepartmentsCollection;
use App\Http\Resources\Departments\DepartmentsResource;
use App\Models\Departments;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): DepartmentsCollection
    {
        //
        $departments = DB::table('departments')->orderBy('departments.created_at', 'ASC')->get();

        return DepartmentsCollection::make($departments);
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
    public function store(DepartmentsRequest $request): DepartmentsResource
    {
        //
        try {
            // Comenzar la transacción de la base de datos
            DB::beginTransaction();

            $departments = Departments::create([
                'department' => $request->department
            ]);

            // Commit de la transacción
            DB::commit();
            return DepartmentsResource::make($departments);

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
    public function show($id): DepartmentsResource
    {
        //
        $departments = DB::table('departments')->where('departments.id', $id)->first();

        return DepartmentsResource::make($departments);
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
    public function update(Request $request, $id)
    {
        //
        try {
            DB::beginTransaction();

            $activity = Departments::findOrFail($id);

            $validatedData = $request->validated();

            $activity->update($validatedData);

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
            DB::beginTransaction();

            $departments = Departments::findOrFail($id);

            $departments->delete();

            DB::commit();

            return ActivityResource::make($departments);

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
