@extends('home')

@section('conteudo')
    <div>
        <!-- Botão Adicionar Escala -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEscalaModal">
            <i class="bi bi-plus"></i> Alocar
        </button>

        {{ csrf_field() }}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código da Alocacao</th>
                    <th>Escala</th>
                    <th>Agente</th>
                    <th>Chefe do grupo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($escala_agente as $alocacao)
                    <tr>

                        <td scope="row">1</td>
                        <td>{{ $alocacao->escala_id }}</td>
                        <td>{{ $alocacao->user_id }}</td>
                        <td>Pedro</td>
                        <td>
                            <button data-bs-toggle="modal" data-bs-target="#addEscalaModal"
                                class="btn btn-primary btnEditar"><i class="bi bi-pencil-square"></i></button>
                            <a href="#" class="btn btn-danger btnEliminar"><i class="bi bi-trash"></i></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Adicionar Escala -->
    <div class="modal fade" id="addEscalaModal" tabindex="-1" aria-labelledby="addEscalaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('alocar') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEscalaModalLabel">Alocar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="escala" class="form-label">Escala</label>
                            <select name="escala" class="form-select" id="escala">
                                @foreach ($escalas as $escala)
                                    <option value="{{ $escala->id }}">{{ $escala->local }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="agente" class="form-label">Agente</label>
                            <select name="agente" class="form-select" id="agente">
                                @foreach ($utilizadores as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Alocar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fim do Modal Adicionar Escala -->
@endsection
