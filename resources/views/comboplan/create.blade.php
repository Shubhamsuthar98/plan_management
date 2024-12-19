@extends('layout.app')


@section('title', 'ComboPlan-Create')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">


                        <h1>Create ComboPlan</h1>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form id="comboPlanForm" method="post" action="{{ route('comboplan.store') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name">Combo-Plan Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter combo-plan-name">
                            </div>
                            <div class="form-group mb-2">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Enter combo-plan-price">
                            </div>

                            <div class="form-group mb-5">
                                <label for="plan_id">Plans</label>
                                <select class="form-select" name="plan_id[]" id="plan_id" multiple>
                                    @foreach($planList as $plan)
                                    <option value="{{ $plan->id }}"> {{ $plan->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function() {

        $('#comboPlanForm').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                },
                price: {
                    required: true,
                },
                plan_id: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Please enter combo-plan name",
                },
                price: {
                    required: "Please enter combo-plan price",
                },
                plan_id: {
                    required: "Please select at least one plan",
                }
            }
        });

    });
</script>
@endsection