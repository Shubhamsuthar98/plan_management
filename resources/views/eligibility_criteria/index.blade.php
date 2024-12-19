@extends('layout.app')


@section('title', 'Eligibility Criteria')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">
                        <a
                            href="{{ route('eligibility_criteria.create') }}"
                            class="btn btn-primary">
                            Create Eligibility Criteria
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
                                    <th scope="col">Age_less_than</th>
                                    <th scope="col">Age_greater_than</th>
                                    <th scope="col">Last_login_days_ago</th>
                                    <th scope="col">Income_less_than</th>
                                    <th scope="col">Income_greater_than</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ecList as $key => $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->age_less_than }} </td>
                                    <td> {{ $item->age_greater_than }} </td>
                                    <td> {{ $item->last_login_days_ago }} </td>
                                    <td> {{ $item->income_less_than	 }} </td>
                                    <td> {{ $item->income_greater_than	 }} </td>
                                    <td>
                                        <a
                                            href="{{ route('eligibility_criteria.edit', $item->id) }}"
                                            class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        <form action="{{ route('eligibility_criteria.destroy', $item->id) }}" method="post">
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