<x-app-layout>
    <x-slot name="header">
        <h2>Edit Student</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST"
              action="{{ route('students.update', $student->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="name"
                   value="{{ $student->name }}"
                   class="block mb-2 w-full">

            <input type="email" name="email"
                   value="{{ $student->email }}"
                   class="block mb-2 w-full">

            <input type="text" name="phone"
                   value="{{ $student->phone }}"
                   class="block mb-2 w-full">

            <button class="bg-green-500 text-white px-4 py-2">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
