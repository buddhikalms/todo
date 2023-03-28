@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row bg-secondary">
            <div class="col-12 text-center">
                <h2 class="text-white mt-5 mb-5">My Todo List</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <input name="title" type="text" class="form-control mt-5" id="exampleFormControlInput1"
                                placeholder="Enter your task">
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-success mt-5 col-12">Submit Task</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-12 mt-5">
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ $key++ }}</th>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ($task->done == 0)
                                        <span class="badge bg-danger"> Not Completed</span>
                                    @else
                                        <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                                {{-- <td><i class="fa-solid fa-trash" style="color: #ff0000;"></i> <i class="fa-solid fa-pen-to-square fa-flip" style="color: #24ff27;"></i></td> --}}
                                <td>
                                    <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash" style="color: #eeeeee;"></i></a>
                                    <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success"><i class="fa-solid fa-calendar-check fa-fade" style="color: #ffffff;"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>
@endpush
