<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;

class BackController extends Controller
{
    /** Get pie charts by user counted and answers with id*/
    protected function getPieChart($id)
    {
        $answers = Answer::where('question_id', $id)->get();
        $possible_answers = Question::where('id', $id)->get();
        $options = explode(',', $possible_answers[0]->possible_answer);
        $stats = [];

        foreach ($options as $option) {

            $count = 0;
            foreach ($answers as $answer) {
                if ($answer->answer == $option) {
                    $count = $count += 1;
                }
            }
            array_push($stats, $count);

        }
        //dd($stats);
        return $stats;
    }

    public function getRadarChart()
    {
        $questionId = [11, 12, 13, 14, 15];
        $stats = [];

        foreach ($questionId as $id) {
            $answersAvg = Answer::where('question_id', $id)->get()->avg('answer');
            array_push($stats, $answersAvg);
        }
        return ($stats);
    }
}
