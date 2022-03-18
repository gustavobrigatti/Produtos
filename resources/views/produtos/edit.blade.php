@extends('app')
@push('scripts')
    <script>
        document.querySelector('.custom-file-input').addEventListener('change',function(e){
            var texto;
            if(document.getElementById("customFile").files.length > 1){
                $("#customFile").val(null);
                texto = "Selecione o arquivo.";
                PNotify.removeAll();
                new PNotify.alert({
                    title: 'Erro',
                    text: 'Selecione no máximo 1 foto.',
                    type: 'error',
                    delay: 2000
                });
            }else if(document.getElementById("customFile").files.length < 1) {
                $("#customFile").val(null);
                texto = "Selecione o arquivo.";
                PNotify.removeAll();
                new PNotify.alert({
                    title: 'Erro',
                    text: 'Selecione no mínimo 1 foto.',
                    type: 'error',
                    delay: 2000
                });
            }else{
                for(var i = 0; i < document.getElementById("customFile").files.length; i++){
                    if (i === 0){
                        texto = document.getElementById("customFile").files[i].name;
                    }else{
                        texto += (", "+document.getElementById("customFile").files[i].name);
                    }
                }
            }
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = texto;
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
                        <h5 class="m-b-10">Produto</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-barcode"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('produtos.index') }}">Produtos</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('produtos.edit', $id == 0 ? $id:$produto->hash_id) }}">Editar</a></li>
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
                    <h5>Produto</h5>
                </div>
                <div class="card-body">
                    @if($errors->count())
                        <div class="alert alert-danger alert-dismissible">
                            @foreach($errors->all() as $message)
                                <p style="vertical-align: middle;">{{$message}}</p>
                            @endforeach
                        </div>
                    @endif
                    {{--FORM--}}
                    <form action="{{ route($id > 0 ? 'produtos.update' : 'produtos.store', $produto->hash_id) }}" enctype="multipart/form-data" method="post">
                        {{ $id > 0 ? method_field('PUT') :'' }}
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="nome_produto">Nome do Produto</label>
                                <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Digite o nome do produto" value="{{ old('nome_produto', $produto->nome_produto) }}" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" placeholder="Digite o SKU do produto" value="{{ old('sku', $produto->sku) }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="preco">Preço</label>
                                <input type="text" class="form-control mask-currency" id="preco" name="preco" placeholder="R$ 0.000,00" value="{{ old('preco', $produto->preco) }}" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="estoque">Estoque</label>
                                <input type="text" class="form-control mask-number" id="estoque" name="estoque" placeholder="Digite o estoque do produto" value="{{ old('estoque', $produto->estoque) }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" class="custom-file-input form-control" style="cursor: pointer" id="customFile" multiple>
                            <label class="custom-file-label tres-pontos" for="customFile" style="cursor: pointer">Selecione o foto do produto.</label>
                        </div>
                        @if($id == 0)
                            <button type="submit" id="btn-in" class="btn btn-primary btn-sm-block">Salvar</button>
                        @else
                            <button type="submit" id="btn-ed" class="btn btn-primary">Salvar</button>
                            <a type="button" id="btnexcluir" class="btn btn-danger pull-right confirmBtn"
                               href="javascript:document.getElementById('excluir').submit();">Excluir</a>
                        @endif
                    </form>
                    @if($id > 0)
                        <form id="excluir" action="{{ route('produtos.destroy', $produto->hash_id)  }}"
                              method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE"/>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
