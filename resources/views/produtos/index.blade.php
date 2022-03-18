@extends('app')
@push('scripts')
    <script>
        $('#user-list-table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.1/i18n/pt_br.json"
            }
        });
    </script>
@endpush
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
            <div class="card user-profile-list">
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
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="user-list-table" class="table nowrap" style="border-spacing: 0 10px;">
                            <thead>
                            <tr>
                                <th>Nome/SKU</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                                <th class="text-center" style="width: 20%">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos AS $produto)
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            @if($exists = Storage::disk('public')->exists($produto->path_foto))
                                                <img src="/storage/{{ $produto->path_foto }}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                            @else
                                                <img src="/images/user.png" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                            @endif
                                            <div class="d-inline-block">
                                                <h6 class="m-b-0">{{ $produto->nome_produto }}</h6>
                                                <p class="m-b-0">{{ $produto->sku }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                    <td class="align-middle">{{ $produto->estoque }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('produtos.edit', $produto->hash_id) }}" class="btn btn-icon btn-primary"><i class="feather icon-folder"></i></a>
                                        <a href="javascript:document.getElementById('excluir{{$produto->id}}').submit();" id="btnexcluir{{$produto->id}}" class="btn btn-icon btn-danger confirmBtn"><i class="feather icon-trash-2"></i></a>
                                        <form id="excluir{{$produto->id}}" action="{{ route('produtos.destroy', $produto->hash_id)  }}"
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
                                <th>Nome/SKU</th>
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
