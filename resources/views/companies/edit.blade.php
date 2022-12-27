<x-app>
    @section('title','Edit Company')

    <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>
    </div>
    <form action="{{route('companies.update' , $company->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$company->name}}"
                       placeholder="Company Name">
                @error('name')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$company->email}}" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="website">Company Website</label>
                <input type="text" class="form-control" name="website" id="website" value="{{$company->website}}" placeholder="Enter website">
                @error('website')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="logo">Logo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="logo">
                        <label class="custom-file-label" for="logo">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
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
