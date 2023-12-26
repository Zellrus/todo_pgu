<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Column\ColumnResource;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\OneProjectResource;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
/**
 * @OA\Get(
 *     path="/api/projects",
 *     summary="Получение списка проектов",
 *     tags={"Project"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="project_id",type="integer",example=1,description="Получение проекта по его id"),
 *                     @OA\Property(property="isdetail",type="bool",example=false, default=true,description="Флаг получения детального ответа"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=200,
 *          description="Ok",
 *          @OA\JsonContent(
 *              @OA\Property(property="data", type="array",@OA\Items(
 *                   @OA\Property(property="id",type="integer",example=1),
 *                   @OA\Property(property="title",type="string",example="Какой-нибудь заголовок"),
 *                   @OA\Property(property="description",type="string",example="Какое-нибудь описание"),
 *                   @OA\Property(property="color",type="string",example="#000"),
 *              ))
 *
 *          ),
 *     )
 * )
 */
class ShowController extends Controller
{
    public function all()
    {
        $data = $request->all();
        if(!isset($data['isdetail'])){
            $data['isdetail'] = true;
        }
        if (isset($data['project_id'])){
            return $this->byProjectId($data['project_id'],$data['isdetail']);
        }
        elseif (empty($data) or isset($data['isdetail'])){
            return $this->responseAllUserProject($data['isdetail']);
        }
        else{
            return response()->json(['message'=>'Нет ни одного параметра (project_id)']);
        }
    }
    private function byProjectId($id,$isdetail=true)
    {

        $project=Project::find($id);
        if (!$project){ return response()->json(['message'=>'Проект не найден']); }
        if ($isdetail){
            return new DetailProjectResource($project);
        }
            return new ProjectResource($project);
    }
    private function responseAllUserProject($isdetail=true){
        $projects = (User::find(auth()->user()->id)->projects);
//        if (!$projects){ return response()->json(['message'=>'Проекты не найдены']); }
        if ($isdetail){
            return DetailProjectResource::collection($projects);
        }
        return ProjectResource::collection($projects);
    }

}
