@extends('layouts.b-base')

@section('content-b')
<div class="container">
    <div class="row justify-content-center">
        <div class="row flex col-md-11 justify-content-center">

            <h1 class="py-3">Hello, <b>{{Auth::user()->name}}</b></h1>

            <div class="card mb-3 ">
                <div class="card-header d-flex align-items-center">
                    <div class="flex-fill fs-2">{{ __('Budgetboard') }}</div>
                    <div class="flex-shrink-1">
                        <a class="btn btn-success" href="board/new" role="button"> Add new board</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="d-flex flex-wrap flex-row">
                @foreach ($boards as $board)

                    <div class="card text-bg-light m-2 parent-click " style="max-width: 17.1rem;">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="p-2 flex-fill fs-6">{{$board->urgency}}</div>
                                <div class="p-2 flex-shrink-1 fs-6 fw-bold">{{$board->boardCur}}</div>
                            </div>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">
                            <a class="fw-semibold fs-3 child-click link-dark link-offset-2 link-underline-opacity-0" href="board/{{$board->id}}">{{$board->boardName}}</a>
                          </h5>
                          <p class="card-text fs-6">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer">{{$board->created_at}}</div>
                      </div>

                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
