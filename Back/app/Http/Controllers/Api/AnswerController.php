<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Visitor;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        foreach($request->formData as $one)
        {
            $one = json_decode($one);

            if($one->question_id == 1)
            {
                $user = new Visitor();
                $user->email = $one->answer;
                $user->save();
            }
            $answer = new Answer();
            $answer->answer = $one->answer;
            $answer->question_id = $one->question_id;
            $answer->visitor_id = $user->id;
            $answer->save();
        }

        return response()->json([
            'message' => 'Nouveau sondage créé !',
            'code' => 200
        ]);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
