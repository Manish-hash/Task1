<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Books
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="">Add New Books</h1>
                        <a href="{{route('book.index')}}" class="text-blue-500 hover:underline">Back to Book</a>
                    </div>

                    <form method="POST" action="{{ route('studentbook.saved') }}">
                        @csrf
                        <!-- Course Name -->

                        <div>
                            <x-input-label for="student" value="Student_ID" />
                            <select id="student_id" name="student_id" required>
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }} (ID: {{ $student->id }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <x-input-label for="books" value="Books" />
                            <select id="book_ids" name="book_ids[]" multiple required>
            <option value="" disabled>Select Books</option>
            @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->b_name }}</option>
            @endforeach
        </select>
                        </div>
                        <br />
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add
                            Books to Students</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

