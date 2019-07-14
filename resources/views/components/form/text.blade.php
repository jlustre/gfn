<div class="form-group row">
<label for="{{ $name }}" class="col-md-5 col-form-label text-md-right">{{ $name }}</label>

<div class="col-md-7">
    <input id="{{ $name }}" type="text" class="form-control @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}" value="{{ old($name) }}" required autocomplete="{{ $name }}" autofocus>

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>