<div class="card card-primary">
    <div class="card-header">
        <h4 class="card-title">Add picture</h4>

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
                        <label>Caption</label>
                        <input type="text" wire:model.lazy="caption" class="form-control {{$errors->has('caption')? 'is-invalid' : '' }}" placeholder="Drop a caption for this image">
                        @error('caption') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">

                <div class="col-sm-12" wire:ignore>
                    <div class="form-group">
                        <label>Images <sup>max 20MB</sup></label>
                        <div class="file-loading">
                            <input id="file-0" class="file" type="file" wire:model="images" multiple data-min-file-count="1" data-theme="fas">
                        </div>
                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                        @error('images') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                    </div>
                    <!-- /.form-group -->
                </div>

            </div>
            <!-- /.row -->
            <br>



            <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save picture</button>
            <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
            <a href="{{route('album.pictures', $album_id)}}" target="_blank" class="btn btn-default">All Pictures</a>
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        Contact <a href="#">the system administrator if </a> you're not sure of what to do.
    </div>
    <!-- /.card -->

</div>



