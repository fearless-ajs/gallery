
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Open House </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">pages</li>
                        <li class="breadcrumb-item active">Open house date</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Open house dates</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
               @livewire('new-open-house-date')
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">All dates</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fas fa-text-width"></i>
                                            Upcoming dates
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <blockquote>
                                            @if($dates)
                                               @foreach($dates as $date)
                                                   <p>
                                                       <span style="cursor: pointer;" wire:click="edit({{$date->id}})">
                                                       Start: {{strftime("%A", $date->start_timestamp)}} , {{$date->start_date}}
                                                       {{strftime("%I", $date->start_timestamp)}}:{{strftime("%M", $date->start_timestamp)}} {{strftime("%p", $date->start_timestamp)}} |
                                                       End: {{strftime("%A", $date->end_timestamp)}} , {{$date->end_date}}
                                                       {{strftime("%I", $date->end_timestamp)}}:{{strftime("%M", $date->end_timestamp)}} {{strftime("%p", $date->end_timestamp)}} &nbsp; &nbsp;
                                                       &nbsp;
                                                      </span>
                                                       <span style="cursor: pointer;" wire:click="remove({{$date->id}})"  wire:loading.remove wire:target="remove({{$date->id}})" class="fas fa-times text-danger" role="status" aria-hidden="true"></span>
                                                       <span wire:loading wire:target="remove({{$date->id}})" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                   </p>
                                               @endforeach
                                            @endif

                                        </blockquote>

                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- ./col -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fas fa-text-width"></i>
                                            Edit date
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body clearfix">
                                        <form wire:submit.prevent="save">
                                            <!-- /.col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <input type="date" wire:model.lazy="start_date" class="form-control {{$errors->has('start_date')? 'is-invalid' : '' }}">
                                                    @error('start_date') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                                <!-- /.form-group -->
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Start Time</label>
                                                    <input type="time" wire:model.lazy="start_time" class="form-control {{$errors->has('start_time')? 'is-invalid' : '' }}">
                                                    @error('start_time') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>End Date</label>
                                                    <input type="date" wire:model.lazy="end_date" class="form-control {{$errors->has('end_date')? 'is-invalid' : '' }}">
                                                    @error('end_date') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                                <!-- /.form-group -->
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>End Time</label>
                                                    <input type="time" wire:model.lazy="end_time" class="form-control {{$errors->has('end_time')? 'is-invalid' : '' }}">
                                                    @error('end_time') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                                </div>
                                                <!-- /.form-group -->
                                            </div>

                                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save date</button>
                                        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>

                                        </form>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- ./col -->
                        </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Contact <a href="#">the system administrator if </a> you're not sure of what to do.
                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>

