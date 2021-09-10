@extends('layout')

@section('content')
  <h1>Adicionar / Editar Venda</h1>
  <div class="card">
    <div class="card-body">
      <form action="{{ $route }}" method="post">
        @csrf
        <h5>Selecione o cliente</h5>
        <label for="client">Cliente</label>
        <select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror">
          <option selected value="">Selecione</option>
          @forelse($clients as $client)
            <option value="{{ $client->id }}" @if (old('client_id', $sale->client_id) == $client->id) selected @endif>{{ $client->name }} -
              {{ $client->cpf }}</option>
          @empty
            <option selected disabled>Nenhum cliente cadastrado</option>
          @endforelse
        </select>
        @error('client_id')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
        @enderror
        @if (request()->routeIs('sale.edit'))
            @method('PUT')
          @else
          <h5 class="mt-5">Ou cadastre um novo cliente</h5>
          <div class="form-group">
            <label for="name">Nome do cliente</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
              value="{{ old('name', $sale->client->name) }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
              value="{{ old('email', $sale->client->email) }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control @error('cpf') is-invalid @enderror"
              placeholder="000.000.000-00" value="{{ old('cpf', $sale->client->cpf) }}">
            @error('cpf')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        @endif
        <h5 class="mt-5">Informações da venda</h5>
        <div class="form-group">
          <label for="product">Produto</label>
          <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
            <option disabled selected value="">Selecione</option>
            @forelse($products as $product)
              <option value="{{ $product->id }}" @if (old('product_id', $sale->product_id) == $product->id) selected @endif>{{ $product->name }} - R$
                {{ $product->price }}</option>
            @empty
              <option selected disabled>Nenhum produto cadastrado</option>
            @endforelse
          </select>
          @error('product_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="dh_sold">Data</label>
          <input type="text" name="dh_sold" class="form-control @error('dh_sold') is-invalid @enderror single_date_picker"
            id="dh_sold">
          @error('dh_sold')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="quantity">Quantidade</label>
          <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
            value="{{ old('quantity', $sale->quantity) }}">
          @error('quantity')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="discount">Desconto</label>
          <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="discount"
            placeholder="100,00 ou menor" value="{{ old('discount', $sale->discount) }}">
          @error('discount')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select name="sale_situation_id" id="status"
            class="form-control @error('sale_situation_id') is-invalid @enderror">
            <option disabled selected value="">Selecione</option>
            @foreach ($saleSituations as $saleSituation)
              <option value="{{ $saleSituation->id }}" @if (old('sale_situation_id', $sale->sale_situation_id) == $saleSituation->id) selected @endif>{{ $saleSituation->name }}</option>
            @endforeach
          </select>
          @error('sale_situation_id')
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
