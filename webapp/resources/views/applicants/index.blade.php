<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                

                     <div class="flex justify-between items-center mb-4">
                    <input type="text" id="search" placeholder="Search applicants..."
                        class="border rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none w-64">

                    <div id="loading" class="right-2 top-2 hidden">
                        <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                    </div>
                    
                    <a href="{{ route('applicants.create') }}"
                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-gray-600">
                        Add Applicant
                    </a>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 rounded-md">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">#</th>
                                <th class="border border-gray-300 px-4 py-2">Last Name</th>
                                <th class="border border-gray-300 px-4 py-2">First Name</th>
                                <th class="border border-gray-300 px-4 py-2">City</th>
                                <th class="border border-gray-300 px-4 py-2">Position Applied</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody   id="applicant-table" class="text-gray-700">
                            @foreach($applicants as $applicant)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $applicant->last_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $applicant->first_name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $applicant->city }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $applicant->position_applied }}</td>
                                    <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                                        <a href="{{ route('applicants.edit', $applicant->id) }}"
                                            class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                                            ✏️ Edit
                                        </a>
                                        <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">
                                                🗑️ Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

       <!-- jQuery for AJAX -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script>
        $(document).ready(function() {
            let searchRequest = null;
            $('#search').on('keyup', function() {
                let query = $(this).val();

                if (searchRequest !== null) {
                    searchRequest.abort();
                }

                $('#loading').removeClass('hidden'); 

                searchRequest = $.ajax({
                    url: "{{ route('applicants.search') }}",
                    type: "GET",
                    data: { search: query },
                    success: function(data) {
                        $('#applicant-table').html(data);
                    },
                    complete: function() {
                        $('#loading').addClass('hidden'); 
                    }
                });
            });
        });
    </script>
</x-app-layout>
