<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/projects",
 *     summary="Создание проекта",
 *     tags={"Project"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title",type="string|required",example="Какой-нибудь заголовок"),
 *                     @OA\Property(property="description",type="string|required",example="Какое-нибудь описание"),
 *                     @OA\Property(property="color",type="string",example="#000",default="#000"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="object",
 *                  @OA\Property(property="id",type="integer",example=1),
 *                  @OA\Property(property="title",type="string",example="Какой-нибудь заголовок"),
 *                  @OA\Property(property="description",type="string",example="Какое-нибудь описание"),
 *                  @OA\Property(property="color",type="string",example="#000"),
 *              )
 *          ),
 *     )
 * )
 */

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        $project= Project::create($data);
        $project->users()->attach(auth()->user()->id);
        $project = $project->fresh();
      return new ProjectResource($project);
    }
}
