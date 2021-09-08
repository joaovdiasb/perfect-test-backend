@extends('layout')

@section('content')
  <h1>Dashboard de vendas</h1>
  <div class='card mt-3'>
    <div class='card-body'>
      <h5 class="card-title mb-5">Tabela de vendas
        <a href='' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i> Nova venda</a>
      </h5>

      <form action="{{ route('dashboard') }}" method="post">
        @csrf
        <div class="form-row align-items-center">
          <div class="col-sm-5 my-1">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Clientes</div>
              </div>
              <select class="form-control @error('client') is-invalid @enderror" id="client" name="client">
                <option value="">Selecione</option>
                @forelse ($clients as $client)
                  <option value="{{ $client->id }}" @if ($client->id == old('client', $currentClient)) selected @endif>{{ $client->name }} |
                    {{ $client->cpf }}</option>
                @empty
                  <option disabled selected>Nenhum cliente encontrado</option>
                @endforelse
              </select>
              @error('client')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="col-sm-6 my-1">
            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Período</div>
              </div>
              <input type="text" class="form-control date_range" name="sale_date_range" id="inlineFormInputGroupUsername"
                placeholder="Data" value="{{ old('sale_date_range', $currentSaleDateRange) }}">
            </div>
          </div>
          <div class="col-sm-1 my-1">
            <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
              <i class='fa fa-search'></i></button>
          </div>
        </div>
      </form>
      <table class='table'>
        <tr>
          <th scope="col">
            Produto
          </th>
          <th scope="col">
            Data
          </th>
          <th scope="col">
            Valor unit.
          </th>
          <th scope="col">
            Desconto
          </th>
          <th scope="col">
            Total
          </th>
          <th scope="col">
            Ações
          </th>
        </tr>
        @forelse ($sales as $sale)
          <tr>
            <td>
              {{ $sale->product->name }}
            </td>
            <td>
              {{ $sale->dh_sold }}
            </td>
            <td>
              R$ {{ $sale->product->price }}
            </td>
            <td>
              {{ $sale->discount }} %
            </td>
            <td>
              R$ {{ $sale->total }}
            </td>
            <td>
              <a href='' class='btn btn-primary'>Editar</a>
            </td>
          </tr>
        @empty
          <tr>
            <td>
              Nenhum venda encontrada.
            </td>
          </tr>
        @endforelse
      </table>
      {!! $sales->links() !!}
    </div>
  </div>
  <div class='card mt-3'>
    <div class='card-body'>
      <h5 class="card-title mb-5">Resultado de vendas</h5>
      <table class='table'>
        <tr>
          <th scope="col">
            Status
          </th>
          <th scope="col">
            Quantidade
          </th>
          <th scope="col">
            Valor Total
          </th>
        </tr>
        @forelse ($saleResults as $saleResult)
          <tr>
            <td>
              {{ $saleResult->name }}
            </td>
            <td>
              {{ $saleResult->sales_count }}
            </td>
            <td>
              R$ {{ $saleResult->sales_total }}
            </td>
          </tr>
        @empty

        @endforelse
      </table>
    </div>
  </div>

  <div class='card mt-3'>
    <div class='card-body'>
      <h5 class="card-title mb-5">Produtos
        <a href='' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i> Novo produto</a>
      </h5>
      <table class='table'>
        <tr>
          <th scope="col">
            Cover
          </th>
          <th scope="col">
            Nome
          </th>
          <th scope="col">
            Valor
          </th>
          <th scope="col">
            Ações
          </th>
        </tr>
        @forelse ($products as $product)
          <tr>
            <td>

            </td>
            <td>
              {{ $product->name }}
            </td>
            <td>
              {{ $product->price }}
            </td>
            <td>
              <a href='' class='btn btn-primary'>Editar</a>
            </td>
          </tr>
        @empty
          <tr>
            <td>
              Nenhum produto encontrado.
            </td>
          </tr>
        @endforelse
      </table>
      {!! $products->links() !!}
    </div>
  </div>
@endsection
