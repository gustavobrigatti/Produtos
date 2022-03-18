<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::all()->sortBy('nome_produto');
        return view('produtos.index', [
            'produtos' => $produtos
        ]);
    }

    public function edit($id){
        $produto = $id == 0 ? new Produto():Produto::findOrFail($id);
        return view('produtos.edit',[
            'produto' => $produto,
            'id' => $id
        ]);
    }

    public function save($request, $produto){
        $this->validate($request, [
            'nome_produto' => 'bail|required|max:191',
            'sku' => 'bail|required|unique:produtos,sku,'.$produto->id.',id',
            'preco' => 'bail|required',
            'estoque' => 'bail|required',
            'file' => 'bail|mimes:jpeg,jpg,bmp,png',
        ]);
        $produto->fill($request->input());
        $produto->preco = str_replace(',', '.', str_replace('.', '', $produto->preco));
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $ext = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_EXTENSION);
            $produto->path_foto = 'produto/'.$produto->sku.'.'.$ext;
            $request->file('file')->storeAs('/public/produto', $produto->sku.'.'.$ext);
        }
        $produto->save();
    }

    public function store(Request  $request){
        $produto = new Produto();
        $this->save($request, $produto);
        return redirect()->route('produtos.index')->with('alert', 'Produto criado com sucesso.');
    }

    public function update(Request  $request, $id){
        $produto = Produto::findOrFail($id);
        $this->save($request, $produto);
        return redirect()->route('produtos.index')->with('alert', 'Produto atualizado com sucesso.');
    }

    public function destroy($id){
        $produto = Produto::findOrFail($id);
        Storage::delete('/public/'.$produto->path_foto);
        $produto->delete();
        return redirect()->route('produtos.index')->with('alert', 'Produto excluído com sucesso.');
    }
}
