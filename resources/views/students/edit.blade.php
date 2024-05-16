<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Update Students
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center justify-between mb-4">
                        <h1 class="">Update Student</h1>
                        <a href="{{route('student.index')}}" class="text-blue-500 hover:underline">Back to Students</a>
                    </div>

                    <form method="POST" action="{{ route('student.update', ['id' =>$student->id]) }}" enctype="multipart/form-data">
                        @csrf
                       @method('PUT')
                      
                        <div>
                            <x-input-label for="name" value=" FullName" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$student->name}}"
                                 />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                    
                       <div>
                        <x-input-label for="email" value="Email"/>
                        <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$student->email}}"
                        />
                       </div>
                    
                       <div>
                       <x-input-label for="course" value="Course" />
                            <select id="course" class="block mt-1 w-full" name="course_id" required
                                autocomplete="course">
                                <option value="">Select</option>
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->c_name }}
                                    </option>
                                @endforeach
                            </select>
                       </div>

                    
                       <div >
                        <x-input-label for="age" value="Age" />
                        <x-text-input id="age" class="block mt-1 w-full" type="number" name="age"  required
                        value="{{$student->age}}" />
                       </div>

                        
                       <div>
                        <x-input-label for="gender" value="Gender" />
                        
                        <select id="gender" class="block mt-1 w-full" type="text" name="gender" required
                                autocomplete="gender">
                                <option value="">Select</option>
                                <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                       </div>

                       <div>
                        <x-input-label for="location" value="Location"/>
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{$student->location}}" />
                       </div>
                        <br/>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Update
                            Students</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
