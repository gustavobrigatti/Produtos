@extends('app')
@section('content')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Produtos</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-barcode"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('produtos.index') }}">Produtos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- Zero config table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-none d-sm-block">
                        <h5>Produtos</h5>
                        <div class="card-header-right">
                            <a href="{{ route('produtos.edit', 0) }}" class="btn btn-primary" type="button"><i class="fa fa-folder-plus mr-2 f-18"></i>Novo Produto</a>
                        </div>
                    </div>
                    <div class="d-block d-sm-none">
                        <div class="col-12">
                            <h5>Produtos</h5>
                        </div>
                        <br>
                        <div class="col-12">
                            <a href="{{ route('produtos.edit', 0) }}" class="btn btn-block btn-primary" type="button"><i class="fa fa-folder-plus mr-2 f-18"></i>Novo Produto</a>
                        </div>
                    </div>
                </div>
                <div class="card-body table-border-style">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>SKU</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                                <th class="text-center" style="width: 20%">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos AS $produto)
                                <tr>
                                    <td class="align-middle">{{ $produto->nome_produto }}</td>
                                    <td class="align-middle">{{ $produto->sku }}</td>
                                    <td class="align-middle">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                    <td class="align-middle">{{ $produto->estoque }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('produtos.edit', $produto->hash_id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-folder"></i> Editar
                                        </a>
                                        <a href="javascript:document.getElementById('excluir{{ $produto->id }}').submit();" id="btnexcluir{{ $produto->id }}" type="button" class="btn btn-danger btn-sm confirmBtn">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="excluir{{ $produto->id }}" action="{{ route('produtos.destroy', $produto->hash_id)  }}"
                                              method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>SKU</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                                <th class="text-center" style="width: 20%">Ações</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
