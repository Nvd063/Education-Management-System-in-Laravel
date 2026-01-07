<x-app-layout>
    <x-slot name="header">
        <h2>Add Student</h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('students.store') }}">
            @csrf

            <input type="text" name="name" placeholder="Name"
                   class="block mb-2 w-full" required>

            <input type="email" name="email" placeholder="Email"
                   class="block mb-2 w-full" required>

            <input type="text" name="phone" placeholder="Phone"
                   class="block mb-2 w-full">

            <button class="bg-blue-500 text-white px-4 py-2">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
