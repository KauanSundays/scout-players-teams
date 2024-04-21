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
                    @if(auth()->user()->faculdade)
                        <p class="text-lg text-gray-900 dark:text-gray-100">
                            {{ __("Seja a melhor faculdade, procure atletas!") }}
                        </p>
                        <p class="text-lg text-red-1000 white:text-gray-100">
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




                    @if(auth()->user()->faculdade && is_null(auth()->user()->position_id))
                    <form method="POST" action="{{ route('update_position') }}">
                        @csrf
                        <label for="position">Escolha sua necessidade:</label>
                        <select name="position" id="position">
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->nome }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Salvar
                        </button>
                     </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
