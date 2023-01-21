@extends('layouts.index')

@section('main')
<style>
    .mycardbg {
        background-image: linear-gradient(to top, #cfd9df 0, #e2ebf0 100%);
    }

</style>
<div class="row justify-content-center">
    <div class="col col-md-6">
        <div class="card">
            <div class="card-header mycardbg text-center">
                <h4>Image Generator Using OpenAI API </h4>
            </div>
            <div class="card-body mycardbg p-5">
                <form action="{{ route('image.generate') }}" method="POST" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="desc" class="form-label">Enter your imagination to generate an image</label>
                        <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc"
                            name="desc" placeholder="A blue sky with birds...." required maxlength="1000">

                        @error('desc')
                            <div class="invalid-feedback">
                                Please provide a valid description.
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select class="form-select @error('size') is-invalid @enderror"
                            aria-label="Default select example" name="size">
                            <option selected>Select the size of the image</option>
                            <option value="sm">Small</option>
                            <option value="md">Medium</option>
                            <option value="lg">Large</option>
                        </select>
                        @error('size')
                            <div class="invalid-feedback">
                                Please provide a valid size.
                            </div>
                        @enderror
                    </div>

                    <button type="" class="btn btn-secondary mt-2 mb-3 w-100">Generate Image</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
