<x-guest-layout>
    <form method="GET" action="{{ route('register.avaliador') }}">
        @csrf
        <button type="submit">Registrar como Avaliador</button>
    </form>
</x-guest-layout>
