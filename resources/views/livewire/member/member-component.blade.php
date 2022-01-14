<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="form-group">

            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>

            @endif

            <label for="exampleFormControlFile1">ارفع سيرتك الذاتية </label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" wire:model.lazy="file_name">
            <div wire:loading wire:target="file_name">جاري التحميل </div>

        </div>
        @error('file_name') <span class="text-danger">{{ $message }}</span> @enderror
        <br>
        <button type="submit" class="btn btn-primary">أرسل طلب التقييم</button>

    </form>

</div>
