
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>System settings </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
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
                    <h3 class="card-title">Update system information</h3>

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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Domain</label>
                                    <input type="text" wire:model.lazy="domain" class="form-control {{$errors->has('domain')? 'is-invalid' : '' }}" placeholder="Domain name">
                                    @error('domain') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>App Name</label>
                                    <input type="text" wire:model.lazy="app_name" class="form-control {{$errors->has('app_name')? 'is-invalid' : '' }}" placeholder="Web Application name">
                                    @error('app_name') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" wire:model.lazy="email" class="form-control {{$errors->has('email')? 'is-invalid' : '' }}" placeholder="System email">
                                    @error('email') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" wire:model.lazy="facebook" class="form-control {{$errors->has('facebook')? 'is-invalid' : '' }}" placeholder="Facebook profile link">
                                    @error('facebook') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" wire:model.lazy="instagram" class="form-control {{$errors->has('instagram')? 'is-invalid' : '' }}" placeholder="Instagram handle">
                                    @error('instagram') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Favicon <sup>(Max 200kb)</sup></label>
                                <input type="file" wire:model.lazy="favicon" class="form-control {{$errors->has('favicon')? 'is-invalid' : '' }}">
                                @if($favicon)
                                    <img src="{{$favicon->temporaryUrl()}}" class="img-fluid" />
                                @else
                                    @if($setting->favicon)
                                        <img src="{{$old_favicon}}" class="img-fluid" />
                                    @endif
                                @endif
                                @error('favicon') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                <small wire:loading wire:target="favicon" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                            </div>
                            <!-- /.form-group -->
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Icon <sup>(Max 200kb)</sup></label>
                                <input type="file" wire:model.lazy="icon" class="form-control {{$errors->has('icon')? 'is-invalid' : '' }}">
                                @if($icon)
                                    <img src="{{$icon->temporaryUrl()}}" class="img-fluid" />
                                @else
                                    @if($setting->logo)
                                        <img src="{{$old_icon}}" class="img-fluid" />
                                    @endif
                                @endif
                                @error('icon') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                <small wire:loading wire:target="icon" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                            </div>
                            <!-- /.form-group -->
                        </div>



                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save settings</button>
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

