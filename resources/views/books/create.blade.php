<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Courses
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="">Add New Books</h1>
                        <a href="{{ route('book.index') }}" class="text-blue-500 hover:underline">Back to Book</a>
                    </div>

                    <form method="POST" action="{{ route('book.store') }}">
                        @csrf
                        <!-- Course Name -->
                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="b_name"
                                 />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                      

                       <div>
                        <x-input-label for="student" value="Student_ID"/>
                        <x-text-input id="student" class="lock mt-1 w-full" type="number" name="student_id"/>
                       </div>

                        <br/>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Add
                            Books</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
