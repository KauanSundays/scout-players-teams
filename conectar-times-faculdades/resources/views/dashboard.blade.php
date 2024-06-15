<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Mensagens de acordo com o tipo de usuário -->
                    @if(auth()->user()->faculdade)
                        <p class="text-lg text-gray-900 dark:text-gray-100">
                            {{ __("Seja a melhor faculdade, procure atletas!") }}
                        </p>
                        <p class="text-lg text-gray-900 dark:text-gray-100">
                            Necessidades atuais:
                        </p>
                    @elseif(auth()->user()->avaliador)
                        <p class="text-lg text-gray-900 dark:text-gray-100">
                            {{ __("Avalie os melhores atletas e descubra talentos!") }}
                        </p>
                    @else
                        <p class="text-lg text-gray-900 dark:text-gray-100">
                            {{ __("Bem-vindo ao dashboard!") }}
                        </p>
                    @endif

                    <!-- Exibição da necessidade atual da faculdade -->
                    @if(auth()->user()->faculdade && !is_null(auth()->user()->position_id))
                        @php
                            $position = \App\Models\Position::find(auth()->user()->position_id);
                        @endphp
                        @if($position)
                            <p class="text-lg text-gray-900 dark:text-gray-100">
                                Necessidade atual da faculdade: {{ $position->nome }}
                            </p>
                        @endif
                    @endif

                    <!-- Formulário para escolher a necessidade da faculdade -->
                    @if(auth()->user()->faculdade && is_null(auth()->user()->position_id))
                        <form method="POST" action="{{ route('update_position') }}">
                            @csrf
                            <label for="position" class="block text-lg text-gray-900 dark:text-gray-100">Escolha sua necessidade:</label>
                            <select name="position" id="position" class="form-select mt-1 block w-full">
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->nome }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-2">
                                Salvar
                            </button>
                        </form>
                    @endif

                    <!-- Formulário para escolher a posição do jogador -->
                    @if(auth()->user()->avaliador && is_null(auth()->user()->position_id))
                        <form method="POST" action="{{ route('update_position') }}">
                            @csrf
                            <label for="position" class="block text-lg text-gray-900 dark:text-gray-100">Escolha posição de jogador que você analisa:</label>
                            <select name="position" id="position" class="form-select mt-1 block w-full">
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->nome }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-2">
                                Salvar
                            </button>
                        </form>
                    @endif

                    <!-- Exibição da posição especial do avaliador -->
                    @if(auth()->user()->avaliador && !is_null(auth()->user()->position_id))
                        @php
                            $position = \App\Models\Position::find(auth()->user()->position_id);
                        @endphp
                        @if($position)
                            <p class="text-lg text-gray-900 dark:text-gray-100">
                                Posição Especial do Avaliador: {{ $position->nome }}
                            </p>
                        @endif
                    @endif

                    <!-- Formulário para cadastrar novo jogador -->
                    <form method="POST" action="{{ route('players.store') }}" class="mt-6">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="nome" class="block text-lg text-gray-900 dark:text-gray-100">Nome do Jogador:</label>
                                <input type="text" name="nome" id="nome" class="form-input mt-1 block w-full" required>
                            </div>
                            <div>
                                <label for="position" class="block text-lg text-gray-900 dark:text-gray-100">Posição:</label>
                                <select name="position_id" id="position" class="form-select mt-1 block w-full">
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="nota" class="block text-lg text-gray-900 dark:text-gray-100">Nota:</label>
                                <input type="number" name="nota" id="nota" class="form-input mt-1 block w-full" min="0" max="10" required>
                            </div>
                            <div>
                                <label for="observacoes" class="block text-lg text-gray-900 dark:text-gray-100">Observações:</label>
                                <textarea name="observacoes" id="observacoes" class="form-textarea mt-1 block w-full"></textarea>
                            </div>
                            <div>
                                <label for="idade" class="block text-lg text-gray-900 dark:text-gray-100">Idade:</label>
                                <input type="number" name="idade" id="idade" class="form-input mt-1 block w-full" required>
                            </div>
                            <div>
                                <label for="estado" class="block text-lg text-gray-900 dark:text-gray-100">Estado:</label>
                                <input type="text" name="estado" id="estado" class="form-input mt-1 block w-full" required>
                            </div>
                            <div>
                                <label for="cidade" class="block text-lg text-gray-900 dark:text-gray-100">Cidade:</label>
                                <input type="text" name="cidade" id="cidade" class="form-input mt-1 block w-full" required>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Cadastrar Jogador
                            </button>
                        </div>
                    </form>

                    <!-- Botão para listar jogadores do avaliador -->
                    <!-- Botão para listar jogadores do avaliador -->
@if(auth()->user()->avaliador)
<div class="mt-6">
    <a href="{{ route('players.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Listar Meus Jogadores
    </a>
</div>
@endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
