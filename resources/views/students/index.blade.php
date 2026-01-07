<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Student Management') }}
        </h2>
    </x-slot>

    <style>
        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .table-row-anim {
            opacity: 0; /* Start hidden */
            animation: slideInUp 0.5s ease-out forwards;
        }
    </style>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 shadow-md rounded-r-lg animate-pulse flex items-center justify-between">
                    <span class="font-medium">✅ {{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">&times;</button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-2xl border border-gray-100 relative">
                
                <div class="h-2 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>

                <div class="p-6 md:p-8">
                    
                    <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">All Students</h3>
                            <p class="text-sm text-gray-500">Manage your student records efficiently.</p>
                        </div>
                        
                        <a href="{{ route('students.create') }}" 
                           class="group relative inline-flex items-center justify-center px-6 py-3 text-base font-medium text-white transition-all duration-200 bg-blue-600 rounded-full hover:bg-blue-700 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Add New Student
                        </a>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-gray-100">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-bold tracking-wider">
                                    <th class="p-4 border-b border-gray-200">ID</th>
                                    <th class="p-4 border-b border-gray-200">Student Info</th>
                                    <th class="p-4 border-b border-gray-200">Contact</th>
                                    <th class="p-4 border-b border-gray-200 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($students as $index => $student)
                                    <tr class="table-row-anim hover:bg-blue-50/50 transition duration-150 ease-in-out group" 
                                        style="animation-delay: {{ $index * 100 }}ms;">
                                        
                                        <td class="p-4 font-semibold text-gray-500">
                                            #{{ $student->id }}
                                        </td>

                                        <td class="p-4">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 text-white flex items-center justify-center font-bold shadow-sm">
                                                    {{ substr($student->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <div class="font-bold text-gray-900 group-hover:text-blue-600 transition">{{ $student->name }}</div>
                                                    <div class="text-xs text-gray-400">Student</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="p-4">
                                            <div class="flex flex-col gap-1">
                                                <span class="flex items-center text-sm text-gray-600">
                                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                                    {{ $student->email }}
                                                </span>
                                                <span class="flex items-center text-sm text-gray-600">
                                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                                    {{ $student->phone ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </td>

                                        <td class="p-4 text-center">
                                            <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                                
                                                <a href="{{ route('students.edit', $student->id) }}" 
                                                   class="p-2 bg-white border border-gray-200 rounded-lg text-yellow-500 hover:bg-yellow-50 hover:border-yellow-300 transition shadow-sm"
                                                   title="Edit Student">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                </a>

                                                <form method="POST" action="{{ route('students.destroy', $student->id) }}" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="p-2 bg-white border border-gray-200 rounded-lg text-red-500 hover:bg-red-50 hover:border-red-300 transition shadow-sm"
                                                            title="Delete Student">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        @if($students->isEmpty())
                            <div class="text-center py-10">
                                <div class="bg-gray-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900">No students found</h3>
                                <p class="text-gray-500 mt-1">Get started by creating a new student record.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>