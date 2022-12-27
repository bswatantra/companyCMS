<x-app>
    @section('title','Employees Table')

    <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>
        <a href="{{route('employees.create')}}" class="btn btn-success float-end">Add</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($employees as $key=>$employee)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$employee->fullName}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone ?? 'NA'}}</td>
                    <td>
                        {{$employee->company->name}}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('employees.edit',$employee->id)}}">Edit</a>
                        <form method="POST" action="{{ route('employees.destroy', $employee->id) }}"
                              class="pull-left mr-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center text-danger">Employees not found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{$employees->links()}}
    </div>

</x-app>
