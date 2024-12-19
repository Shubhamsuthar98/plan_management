@extends('layout.app')


@section('title', 'ComboPlan')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">
                        <a
                            href="{{ route('comboplan.create') }}"
                            class="btn btn-primary">
                            Create Combo Plan
                        </a>

                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-success" role="alert">
                            {{ session('error') }}
                        </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ComboPlan Name</th>
                                    <th scope="col">ComboPlan Price</th>
                                    <th scope="col">Plans</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comboPlans as $key => $combo_plan)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $combo_plan->name }} </td>
                                    <td> {{ $combo_plan->price }} </td>
                                    <td>
                                        {{ isset($combo_plan->plan_name) ? $combo_plan->plan_name : '' }}
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('comboplan.edit', $combo_plan->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        <form action="{{ route('comboplan.destroy', $combo_plan->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection