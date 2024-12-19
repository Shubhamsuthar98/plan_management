@extends('layout.app')


@section('title', 'Plan')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">
                        <a
                            href="{{ route('plan.create') }}"
                            class="btn btn-primary">
                            Create Plan
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plans as $key => $plan)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $plan->name }} </td>
                                    <td> {{ $plan->price }} </td>
                                    <td>
                                        <a
                                            href="{{ route('plan.edit', $plan->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        <form action="{{ route('plan.destroy', $plan->id) }}" method="post">
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