<x-app>
    @section('title','Company Table')

    <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>
        <a href="{{route('companies.create')}}" class="btn btn-success float-end">Add</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>email</th>
                <th>website</th>
                <th>logo</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($companies as $key=>$company)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->website ?? 'NA'}}</td>
                    <td>
                        <img height="40" src="{{$company->logo}}" alt="">
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('companies.edit',$company->id)}}">Edit</a>
                        <form method="POST" action="{{ route('companies.destroy', $company->id) }}"
                              class="pull-left mr-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center text-danger">Companies not found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        {{$companies->links()}}
    </div>

</x-app>
