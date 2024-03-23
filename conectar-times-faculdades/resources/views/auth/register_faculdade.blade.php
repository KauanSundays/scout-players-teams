<x-guest-layout>
    <form method="GET" action="{{ route('register.faculdade') }}">
        @csrf
        <button type="submit">Registrar como Faculdade</button>
    </form>
</x-guest-layout>
