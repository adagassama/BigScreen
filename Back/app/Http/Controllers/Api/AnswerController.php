<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $answer = Answer::with('question')->get();
        return response()->json([
            'success' => true,
            'message' => 'Liste de toutes les réponses',
            'data' => $answer
        ], 200);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'answersArray.*' => 'required',
            'answersArray.1' => 'email',
            'answersArray.2' => 'numeric',
        ],[
            'answersArray.*.required' => 'Veuillez renseigner tous les champs',
            'answersArray.1.email' => 'Veuillez rentrer une adresse mail valide',
            'answersArray.2.numeric' => 'Veuillez rentrer un entier pour l\'age',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => $validator->errors()->first()
            ], 422);
        }
        else {
            foreach ($request->answersArray as $key => $value ) {
                if ($key == 1) {
                    $email = $value;
                    $visitor = Visitor::where('email', $email)->first();
                    if (!empty($visitor)) {
                        return response()->json(['msg' => 'Vous avez déjà participé à notre enqûete avec cette email'],422);

                    }else{
                        $user = new Visitor();
                        $user->email = $value;
                        $user->url = Str::random(20);
                        $user->save();
                    }
                }
                $answer = new Answer();
                $answer->answer = $value;
                $answer->question_id = $key;
                $answer->visitor_id = $user->id;
                $answer->save();
            }

            return response()->json(['text' => 'Toute l’équipe de Bigscreen vous remercie pour votre engagement.<br/>Grâce à
                                                        votre investissement, nous vous préparons une application toujours plus
                                                        facile à utiliser, seul ou en famille.<br>
                                                        Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
                                                        cette adresse:',
                                    'url'  =>  $user->url]);
        }

    }

    public function getVisitorResponse($url)
    {
        $visitor = Visitor::where('url', $url)->first();
        $visitorResponse = Answer::where('visitor_id', $visitor->id)
                                ->with('question')
                                ->get();

        return response()->json([
            'success' => true,
            'message' => 'Réponses Visitor',
            'data' => $visitorResponse,
        ], 200);
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
