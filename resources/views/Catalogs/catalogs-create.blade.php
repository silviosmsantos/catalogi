<x-layouts.app>
    <form method="POST" action="{{ route('catalogs.store') }}">
        @csrf
        <div class="space-y-8">
            <flux:heading size="xl" level="1">Construa seu Catálogo aqui!</flux:heading>
            <flux:text class="mb-8 mt-4 text-base">Após a criação do catálogo você poderá adicionar produtos e serviços.</flux:text>
            <flux:separator class="mb-8" variant="subtle" />

            <flux:field>
                <flux:label for="name">Nome do Catálogo</flux:label>
                <flux:input id="name" name="name" value="{{ old('name') }}" />
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label for="description">Descrição</flux:label>
                <flux:input id="description" name="description" value="{{ old('description') }}" />
                <flux:error name="description" />
            </flux:field>

            <flux:button type="submit" class="mt-4">Criar Catálogo</flux:button>

        </div>
    </form>
</x-layouts.app>