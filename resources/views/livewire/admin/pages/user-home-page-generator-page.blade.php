
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>System Homepage </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">pages</li>
                        <li class="breadcrumb-item active">Homepage</li>
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
                    <h3 class="card-title">Update homepage content</h3>

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
                                    <label>Top Caption</label>
                                    <input type="text" wire:model.lazy="caption" class="form-control {{$errors->has('caption')? 'is-invalid' : '' }}" placeholder="Top caption here">
                                    @error('caption') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="title" wire:model.lazy="title" class="form-control {{$errors->has('title')? 'is-invalid' : '' }}" placeholder="Content title here">
                                    @error('title') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->


                        </div>
                        <!-- /.row -->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Background Image<sup>(Landscape)</sup></label>
                                <input type="file" wire:model.lazy="image" class="form-control {{$errors->has('image')? 'is-invalid' : '' }}">
                                @if($image)
                                    <img src="{{$image->temporaryUrl()}}" class="img-fluid" />
                                @else
                                    @if($homepage->image)
                                        <img src="{{$old_image}}" class="img-fluid" />
                                        <small wire:click="removeImage" style="cursor:pointer;" class="form-text text-muted"><i wire:loading wire:target="removeImage" class="fa fa-spin"><i class="fa fa-spinner"></i></i> >> Remove image</small>
                                    @endif
                                @endif
                                @error('image') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                <small wire:loading wire:target="image" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Loading preview...</small>
                            </div>
                            <!-- /.form-group -->
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="form-group">
                                    <label>Main Content</label>
                                    <textarea cols="20" wire:model.lazy="content" rows="5" class="form-control {{$errors->has('instagram')? 'is-invalid' : '' }}" placeholder="Homepage content here..."></textarea>
                                    @error('instagram') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <!-- /.row -->

                        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save changes</button>
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

