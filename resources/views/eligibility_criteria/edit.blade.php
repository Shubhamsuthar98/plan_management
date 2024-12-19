@extends('layout.app')


@section('title', 'Eligibility Criteria-Edit')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">


                        <h1>Edit EligibilityCriteria</h1>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form id="eligibilityCriteriaForm" method="post" action="{{ route('eligibility_criteria.update', $eligibilityCriteria->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ isset($eligibilityCriteria->name) ? $eligibilityCriteria->name : old('name') }}" placeholder="Enter name">
                            </div>
                            <div class="form-group mb-2">
                                <label for="age_less_than">Age Less Than</label>
                                <input type="number" class="form-control" id="age_less_than" name="age_less_than" value="{{ isset($eligibilityCriteria->age_less_than) ? $eligibilityCriteria->age_less_than : old('age_less_than') }}" placeholder="Enter Age Less Than">
                            </div>

                            <div class="form-group mb-2">
                                <label for="age_greater_than">Age greater Than</label>
                                <input type="number" class="form-control" id="age_greater_than" name="age_greater_than" value="{{ isset($eligibilityCriteria->age_greater_than) ? $eligibilityCriteria->age_greater_than : old('age_greater_than') }}" placeholder="Enter Age greater Than">
                            </div>

                            <div class="form-group mb-2">
                                <label for="last_login_days_ago">Last Login Days Ago</label>
                                <input type="number" class="form-control" id="last_login_days_ago" name="last_login_days_ago" value="{{ isset($eligibilityCriteria->last_login_days_ago) ? $eligibilityCriteria->last_login_days_ago : old('last_login_days_ago') }}" placeholder="Enter Last Login Days Ago">
                            </div>

                            <div class="form-group mb-2">
                                <label for="income_less_than">Income Less Than</label>
                                <input type="number" class="form-control" id="income_less_than" name="income_less_than" value="{{ isset($eligibilityCriteria->income_less_than) ? $eligibilityCriteria->income_less_than : old('income_less_than') }}" placeholder="Enter Income Less Than">
                            </div>

                            <div class="form-group mb-5">
                                <label for="income_greater_than">Income Greater Than</label>
                                <input type="number" class="form-control" id="income_greater_than" name="income_greater_than" value="{{ isset($eligibilityCriteria->income_greater_than) ? $eligibilityCriteria->income_greater_than : old('income_greater_than') }}" placeholder="Enter Income Greater Than">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {

        $('#eligibilityCriteriaForm').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                },
                age_less_than: {
                    required: true,
                },
                age_greater_than: {
                    required: true,
                },
                last_login_days_ago: {
                    required: true,
                },
                income_less_than: {
                    required: true,
                },
                income_greater_than: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Please enter name",
                },
                age_less_than: {
                    required: "Please enter age_less_than",
                },
                age_greater_than: {
                    required: "Please enter age_greater_than",
                },
                last_login_days_ago: {
                    required: "Please enter last_login_days_ago",
                },
                income_less_than: {
                    required: "Please enter income_less_than",
                },
                income_greater_than: {
                    required: "Please enter income_greater_than",
                }
            }
        });

    });
</script>
@endsection