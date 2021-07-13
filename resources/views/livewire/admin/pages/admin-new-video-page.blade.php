
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Videos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Videos</li>
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
                    <h3 class="card-title">New video</h3>

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
                    <form wire:submit.prevent="save">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" wire:model.lazy="name" class="form-control {{$errors->has('name')? 'is-invalid' : '' }}" placeholder="Name of the video">
                                    @error('name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea wire:model.lazy="details" class="form-control {{$errors->has('details')? 'is-invalid' : '' }}" placeholder="Describe this video"></textarea>
                                    @error('details') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Youtube embed code</label>
                                    <input type="link" wire:model.lazy="link" class="form-control {{$errors->has('link')? 'is-invalid' : '' }}" placeholder="Video youtube link">
                                    @error('link') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <!-- /.row -->

                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save video</button>
                        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
                    </form>
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

