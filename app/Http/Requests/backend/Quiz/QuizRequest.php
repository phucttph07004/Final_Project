<?php

namespace App\Http\Requests\backend\Quiz;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Question_test;
class QuizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $level=request()->all();
        $uniqid = null;

        if(isset($level['level'])){
            // create
            $question_test = Question_test::where([['level_id',(int)$level['level']],['question',$level['question']]])->first();
            if( $question_test != null){
                $uniqid = 'unique:Questions_test';
            }
        }else{
            // update
            $question_test = Question_test::where([['question',$level['question']]])->first();
            if( $question_test != null && $question_test->id !=request()->segment(3) ){
                $uniqid = 'unique:Questions_test';
            }
        }

        return [
            'question'=>"required|min:6|$uniqid",
            'answer1'=>'required',
            'answer2'=>'required',
            'answer3'=>'required',
            'answer4'=>'required',
            'correct_answer'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'question.required'=>'Không được bỏ trống câu hỏi',
            'question.min'=>' câu hỏi không được dưới 6 ký tự',
            'question.unique'=>' câu hỏi ở level này đã tồn tại',
            'answer1.required'=>'Không được bỏ trống đáp án',
            'answer2.required'=>'Không được bỏ trống đáp án',
            'answer3.required'=>'Không được bỏ trống đáp án',
            'answer4.required'=>'Không được bỏ trống đáp án',
            'correct_answer.required'=>'Không được bỏ trống câu trả lời chính xac',
        ];
    }
}
