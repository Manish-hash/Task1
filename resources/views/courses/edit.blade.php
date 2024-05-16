<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Update Courses
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="">Update Course</h1>
                        <a href="{{route('course.index')}}" class="text-blue-500 hover:underline">Back to Course</a>
                    </div>

                    <form method="POST" action="{{ route('course.update', ['id' =>$course->id]) }}" enctype="multipart/form-data">
                        @csrf
                       @method('PUT')
                        <!-- Course Name -->
                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="c_name" value="{{$course->c_name}}"
                                 />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="description" value="Description" />
                           <textarea id="description" name="description" placeholder="description box" >{{($course->description)}}</textarea>

                        </div>

                       <div>
                        <x-input-label for="duration" value="Course Duration"/>
                        <x-text-input id="duration" class="block mt-1 w-full" type="text" name="c_duration"  value="{{$course->c_duration}}"
                        />
                       </div>

                    
                       <div>
                        <x-input-label for="price" value="Course Price"/>
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="c_price"  value="{{$course->c_price}}"
                        />
                       </div>


                       <div>
                        <x-input-label for="status" value="Status"/>
                        <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" value="{{$course->status}}"
                        />
                       </div>
                        <br/>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update
                            Course</button>
                    </for>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
