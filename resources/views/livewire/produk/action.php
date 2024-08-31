<div class="flex">
    <a target="__blank" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" href="{{ route('pengujian.show', $row->id) }}" role="button">Detail</a>
    @if (auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin QC'))
    <a target="__blank" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" href="{{ route('pengujian.edit', $row->id) }}" role="button">Edit</a>
    <form action="{{ route('pengujian.destroy', $row->id) }}" method="post" id="delete-form{{ $row->id }}">
        @csrf
        @method('delete')
        <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" onclick="hapus_data('#delete-form{{ $row->id }}')">Hapus</button>
    </form>
    @endif
</div>