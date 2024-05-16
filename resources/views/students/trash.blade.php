<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       Students Trash
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  
                <div class="mb-4 flex justify-between items-center">
                        
                  <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('student.index') }}">Go to Students</a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-800">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2 text-center">ID</th>
                                    <th class="px-4 py-2 text-center">Student Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Course Enrolled</th>
                                    <th class="px-4 py-2">Age</th>
                                    <th class="px-4 py-2">Gender</th>
                                    <th class="px-4 py-2">Location</th>
                                    <th class="px-4 py-2 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($students as $student)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $student->id }}</td>


                                        <td class="border px-4 py-2">{{ $student->name }}</td>
                                        <td class="border px-4 py-2">{{ $student->email }}</td>
                                        <td class="border px-4 py-2">{{ $student->course->c_name }}</td>
                                        <td class="border px-4 py-2">{{ $student->age }}</td>
                                        <td class="border px-4 py-2">{{ $student->gender }}</td>
                                        <td class="border px-4 py-2">{{ $student->location }}</td>
                                        

                                        <td class="border px-4 py-2 text-center">
                                            <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded" href="{{route('student.restore', $student->id)}}">Restore</a>
                                         
                                           <form action="{{route('student.delete',$student->id)}}" method="post" class="inline">
                                            @csrf 
                                            @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                                            </form>
                                               
                                            
                                        </td>
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="border px-4 py-2 text-center">Oops! Nothing to show.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                         <!-- Pagination Links -->
                       
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
