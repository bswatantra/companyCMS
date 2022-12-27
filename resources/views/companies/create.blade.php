<x-app>
    @section('title','Add New Company')

    <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>
    </div>
    <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Company Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"
                       placeholder="Company Name">
                @error('name')
                <span class="text-danger" role="alert">
                    <p>{{ $message }}</p>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="website">Company Website</label>
                <input type="text" class="form-control" name="website" id="website" value="{{old('website')}}" placeholder="Enter website">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</x-app>
