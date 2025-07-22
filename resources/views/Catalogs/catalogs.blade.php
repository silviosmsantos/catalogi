<x-layouts.app>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 text-white">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Meus Catálogos</h2>
            <flux:button as="a" href="{{ route('catalogs.create') }}">+ Novo Catálogo</flux:button>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 rounded bg-green-800 text-green-100">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg shadow border border-gray-700 bg-gray-900">
            <table class="min-w-full divide-y divide-gray-700 text-sm">
                <thead class="bg-gray-800 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3 text-left">ID</th>
                        <th class="px-6 py-3 text-left">Nome</th>
                        <th class="px-6 py-3 text-left">Descrição</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @forelse ($catalogs as $catalog)
                        <tr class="hover:bg-gray-800">
                            <td class="px-6 py-4">{{ $catalog->id }}</td>
                            <td class="px-6 py-4">{{ $catalog->name }}</td>
                            <td class="px-6 py-4">{{ Str::limit($catalog->description, 50) }}</td>
                            <td class="px-6 py-4">
                                @if($catalog->is_active)
                                    <span class="px-2 inline-flex text-xs font-semibold rounded-full bg-green-700 text-green-100">Ativo</span>
                                @else
                                    <span class="px-2 inline-flex text-xs font-semibold rounded-full bg-red-700 text-red-100">Inativo</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <flux:button as="a" size="sm" variant="ghost">
                                    Visualizar
                                </flux:button>

                                <flux:button as="a" size="sm" >
                                    Editar
                                </flux:button>

                                <form 
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este catálogo?')">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button type="submit" size="sm" variant="danger">
                                        Excluir
                                    </flux:button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-400">Nenhum catálogo encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>
