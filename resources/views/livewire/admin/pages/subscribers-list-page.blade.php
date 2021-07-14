<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All subscribers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Subscribers</li>
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
                            <h3 class="card-title">Registered subscribers</h3>
                        </div>
                        <!-- ./card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Date Joined</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($subscribers)
                                    @foreach($subscribers as $sub)
                                        <tr data-widget="expandable-table" aria-expanded="false">
                                            <td>Expand</td>
                                            <td>{{$sub->email}}</td>
                                            <td>{{$sub->lastname}}</td>
                                            <td>{{$sub->firstname}}</td>
                                            <td>{{$sub->created_at->format('d M Y')}}</td>
                                        </tr>
                                        <tr class="expandable-body">
                                            <td colspan="5">
                                                <p>
                                                    <button wire:click="delete({{$sub->id}})" wire:loading.remove wire:target="delete({{$sub->id}})" type="button" class="btn btn-danger">Remove subscriber</button>
                                                    <button disabled wire:loading wire:target="delete({{$sub->id}})" type="button" class="btn btn-danger"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                            {{ $subscribers->links('components.pagination-links') /* For pagination links */}}
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
