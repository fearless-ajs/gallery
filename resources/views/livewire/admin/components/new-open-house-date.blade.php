<div class="card-body">
    <form wire:submit.prevent="save">

        <div class="row">

            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" wire:model.lazy="start_date" class="form-control {{$errors->has('start_date')? 'is-invalid' : '' }}">
                    @error('start_date') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Start Time</label>
                    <input type="time" wire:model.lazy="start_time" class="form-control {{$errors->has('start_time')? 'is-invalid' : '' }}">
                    @error('start_time') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                </div>
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" wire:model.lazy="end_date" class="form-control {{$errors->has('end_date')? 'is-invalid' : '' }}">
                    @error('end_date') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>End Time</label>
                    <input type="time" wire:model.lazy="end_time" class="form-control {{$errors->has('end_time')? 'is-invalid' : '' }}">
                    @error('end_time') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                </div>
                <!-- /.form-group -->
            </div>
        </div>
        <!-- /.row -->
        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save date</button>
        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
    </form>
</div>
