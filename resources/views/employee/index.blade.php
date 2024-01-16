@extends('layout.master')
@section('body')
    <section>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>All employees</h4>
                    </div>
                    <div class="col-md-6 mr-auto">
                        <a href="{{ route('create') }}" class="btn btn-primary">Add new</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Skill</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employee as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @foreach ($item->skills as $skill)
                                        {{ $skill->skill }}
                                        @if (!$loop->last)
                                            {{-- Add a comma between skills, but not after the last one --}}
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('employee.edit', $item->id)}}"><button
                                            style="background:green; padding:4px 5px; color:#fff">edit</button></a>
                                    <a href="{{route('employee.destroy', $item->id)}}" onclick="confirmDelete()"><button
                                            style="background:red; padding:4px 5px; color:#fff">delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script>
        function confirmDelete(employeeName, deleteUrl) {
            var result = confirm('Are you sure you want to delete ' + employeeName + '?');

            if (result) {
                // If the user clicks OK, submit the form for deletion
                window.location.href = deleteUrl;
            } else {
                // If the user clicks Cancel, do nothing
            }
        }
    </script>
@endsection
