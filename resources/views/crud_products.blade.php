@extends('layout')

@section('content')
  <h1>
    @isset($product->id)
      Editar {{ $product->name }} <a class="btn btn-primary text-white" href="{{ route('product.create') }}">Cadastrar
        novo</a>
    @else
      Adicionar
    @endisset
  </h1>
  <div class="card">
    <div class="card-body">
      <form action="{{ $route }}" method="post" enctype="multipart/form-data">
        @isset($product->id)
          @method('PUT')
        @endisset
        @csrf
        <div class="form-group">
          <label for="name">Nome do produto</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
            value="{{ old('name', $product->name) }}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="photo">Foto do produto</label>
          <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" id="photo">
          @error('photo')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description">Descrição</label>
          <textarea type="text" name="description" rows='5'
            class="form-control @error('description') is-invalid @enderror"
            id="description">{{ old('description', $product->description) }}</textarea>
          @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">Preço</label>
          <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
            placeholder="100,00 ou maior" value="{{ old('price', $product->price) }}">
          @error('price')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </div>
  </div>
@endsection
