@extends('layouts.app')
@section('title', $project->name)
@section('page-title', $project->name)
@section('page-sub', $project->description ?: 'Tidak ada deskripsi')

@section('topbar-actions')
    <a href="{{ route('projects.edit', $project) }}"
        class="text-sm font-medium text-gray-600 hover:text-gray-900
              px-4 py-2 border border-[#ECECE9] rounded-xl transition-colors">
        Edit
    </a>
    <form action="{{ route('projects.destroy', $project) }}" method="POST"
        onsubmit="return confirm('Hapus project ini beserta semua tugasnya?')">
        @csrf @method('DELETE')
        <button type="submit"
            class="text-sm font-medium text-red-600 hover:bg-red-50
                       px-4 py-2 border border-red-200 rounded-xl transition-colors">
            Hapus
        </button>
    </form>
@endsection

@section('content')

    {{-- Info ringkas project --}}
    <div class="flex items-center gap-3 mb-6">
        <span class="w-4 h-4 rounded-full" style="background-color:{{ $project->color }}"></span>
        <span class="text-sm text-gray-500">
            {{ $project->tasks->count() }} tugas
        </span>
    </div>

    {{-- Panel daftar task --}}
    <div class="bg-white rounded-2xl border border-[#ECECE9] p-6">
        <h2 class="font-semibold text-gray-900 mb-5">Daftar Tugas</h2>

        @if ($project->tasks->isEmpty())
            {{-- Placeholder — tombol tambah task akan aktif di P5 --}}
            <div class="text-center py-12">
                <div class="text-4xl mb-3 opacity-20">✅</div>
                <p class="text-sm text-gray-400">
                    Belum ada tugas. Fitur tambah tugas kita bangun di P5!
                </p>
            </div>
        @else
            <ul class="divide-y divide-[#ECECE9]">
                @foreach ($project->tasks as $task)
                    <li class="py-3 text-sm text-gray-700">{{ $task->title }}</li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection
