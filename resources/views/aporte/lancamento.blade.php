@extends('layouts.base')
    @section('head-title')
        <title>CTRLFinance - Lançamento</title>
    @endsection
    @section('content')
      <div class="container-lg">
        <h1 class="m-1">Lançamento</h1>
        <br>
        <div class="row p-3 m-1 form-lanc">
            <div class="card-header">
                <h4 class="title">Faça seu Lançamento de Gastos e Receitas</h4>
                  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>
                  @if (\Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show d-flex" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      {!! \Session::get('success') !!}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
                  @if (\Session::has('danger'))
                  <div class="alert alert-danger alert-dismissible fade show d-flex" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      {!! \Session::get('danger') !!}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif
            </div>
            
            <form class="row g-3" method="POST" action="{{route('aporte.cadlancamento')}}">
                {{ csrf_field() }}
                <div class="col-md-4 pr-md-1">
                  <label for="inputCategory4" class="form-label">Categoria:</label>
                  <select class="form-select" aria-label="Default select example" name="categoria">
                    <option selected>Selecione a Categoria</option>
                    @foreach ($categorias as $categoria)
                      <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4 pr-md-1">
                    <label for="exampleDataList" class="form-label">Descrição:</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Pesquise uma descrição..." name="descricao">
                    <datalist id="datalistOptions">
                      @foreach ($descricoes as $descricao)
                        <option value="{{$descricao->nome}}">
                      @endforeach
                    </datalist>
                </div>
                <div class="col-md-4 pr-md-1">
                  <label for="inputValor" class="form-label">Valor (R$):</label>
                  <input type="text" id="money" class="form-control" name="valor">
                </div>
                <div class="col-md-4 pr-md-1">
                    <div class="form-group">
                  <label for="inputData" class="form-label">Data:</label>
                  <input type="date" class="form-control" id="inputData" name="data">
                </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Observação:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols="80" name="observacao"></textarea>
                      </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-success mx-2">Lançar</button> 
                  <button type="reset" class="btn btn-outline-warning mx-2">Limpar</button>
                </div>
              </form>
        </div>
      </div>
    @endsection
    @section('footer-script')
        <script src="{{ asset('assets/js/plugins/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/plugins/jquery.mask.min.js')}}"></script>
        <script>
        $(document).ready(function(){
            $().ready(function() {
            $('#money').mask('##0.00', {reverse: true});
            });
        });
        </script>
     @endsection
