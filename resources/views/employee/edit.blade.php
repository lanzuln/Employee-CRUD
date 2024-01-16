@extends('layout.master')
@section('body')
    <section>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Create employee</h4>
                            </div>
                            <div class="col-md-6 mr-auto">
                                <a href="{{route('index')}}" class="btn btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('employee.update', $employee->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$employee->name}}"
                                    aria-describedby="emailHelp" placeholder="Enter employee name">

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h4>Create employee</h4>
                        </div>
                        <div class="card-body">

                            <ul id="itemList">
                                @foreach ($skill as $item)
                                    <li>{{$item->skill}}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




@endsection
