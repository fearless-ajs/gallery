<div class="card-body">
    <form wire:submit.prevent="save">

        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" wire:model.lazy="date" class="form-control {{$errors->has('date')? 'is-invalid' : '' }}">
                    @error('date') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                </div>
                <!-- /.form-group -->
                <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
                <div class="form-group">
                    <label>Time</label>
                    <input type="time" wire:model.lazy="time" class="form-control {{$errors->has('time')? 'is-invalid' : '' }}">
                    @error('time') <span style="color: crimson; font-size: 10px;">{{ $message }}</span> @enderror
                </div>
                <!-- /.form-group -->
            </div>
        </div>
        <!-- /.row -->
        <button wire:loading.remove wire:target="save" type="submit" class="btn btn-primary">Save date</button>
        <button disabled wire:loading wire:target="save" type="submit" class="btn btn-primary"> Processing  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> </button>
    </form>
</div>
