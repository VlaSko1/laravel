<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::all();

        return view('aggregator.feedbacks.feedback',
            [
                'feedbacks' => $feedbacks
            ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('name');
        $feedback = $request->input('feedback');

        $feedback = Feedback::create([
            'name' => $title,
            'feedback' => $feedback
        ]);
        if($feedback){
            return redirect()->route('feedback.index')
                ->with('success', 'Отзыв успешно добавлен.');
        }

        return back()->with('error', 'Не удалось добавить отзыв.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('aggregator.feedbacks.edit', ['feedback' => $feedback]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        $feedback->name = $request->input('name');
        $feedback->feedback = $request->input('feedback');

        if($feedback->save()) {
            return redirect()->route('feedback.index')
                ->with('success', 'Отзыв успешно изменен.');
        }

        return back()->with('error', 'Не удалось изменить отзыв.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {

         dd($feedback);

    }

}
