<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       Books
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-right mb-4">
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{route('studentbook.insert')}}">Assign New Book To Student</a>
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
                                    <th class="px-4 py-2 text-center">Book Name</th>
                                    <th class="px-4 py-2">Student Name</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                               
                                @forelse ($books as $book)
                                    @foreach($book->students as $student)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $book->id }}</td>


                                        <td class="border px-4 py-2">{{ $book->b_name }}</td>
                                       <td class="border px-4 py-2">{{ $student->name}}</td>
                                        
                                        

                                       

                           
                                        
                                    </tr>
                                    @endforeach
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
