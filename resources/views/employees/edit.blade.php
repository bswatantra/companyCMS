<x-app>
    @section('title','Edit Employee')

    <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>
    </div>
    <form action="{{route('employees.update' , $employee->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name"
                       value="{{$employee->first_name}}"
                       placeholder="First Name">
                @error('first_name')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">First Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" value="{{$employee->last_name}}"
                       placeholder="Last Name">
                @error('last_name')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$employee->email}}"
                       placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{$employee->phone}}"
                       placeholder="Enter phone">
                @error('phone')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Company</label>
                <select class="form-control" name="company_id" id="company_id">
                    <option value="">Choose Company</option>
                    @foreach($companies as $company)
                        <option
                            value="{{$company->id}}" {{$employee->company_id == $company->id ? 'selected':''}}>{{$company->name}}
                        </option>
                    @endforeach
                </select>
                @error('phone')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>

        </div>
        <div class="form-group">
            <x-success/>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</x-app>
