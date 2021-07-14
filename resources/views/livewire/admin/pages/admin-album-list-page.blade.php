<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Albums</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Albums</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Published Albums</h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Date Created</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($albums)
                                    @foreach($albums as $album)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>Expand</td>
                                            <td>{{$album->title}}</td>
                                            <td>{{$album->content}}</td>
                                            <td>{{$album->created_at->format('d M Y')}}</td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td colspan="5">
                                                <p>
                                                    {{$album->details}}
                                                    <a href="{{route('album.edit', $album->id)}}">View/Edit</a>
                                                    <br><br>
                                                    <button wire:click="delete({{$album->id}})" wire:loading.remove wire:target="delete({{$album->id}})" type="button" class="btn btn-danger">Delete album</button>
                                                    <button disabled wire:loading wire:target="delete({{$album->id}})" type="button" class="btn btn-danger"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            {{ $albums->links('components.pagination-links') /* For pagination links */}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
