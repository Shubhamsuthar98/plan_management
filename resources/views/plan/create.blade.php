@extends('layout.app')


@section('title', 'Plan-Create')

@section('content')
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card mt-5">
                    <div class="card-body">


                        <h1>Create Plan</h1>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form id="planForm" method="post" action="{{ route('plan.store') }}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name">Plan Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter plan-name">
                            </div>
                            <div class="form-group mb-5">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="Enter plan-price">
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

        $('#planForm').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true,
                },
                price: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Please enter plan name",
                },
                price: {
                    required: "Please enter plan price",
                }
            }
        });

    });
</script>
@endsection