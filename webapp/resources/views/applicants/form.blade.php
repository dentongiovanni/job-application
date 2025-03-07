<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($applicant) ? 'Edit Applicant' : 'Add Applicant' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ isset($applicant) ? route('applicants.update', $applicant->id) : route('applicants.store') }}" method="POST" class="space-y-6">
                    @csrf
                    @if(isset($applicant))
                        @method('PUT')
                    @endif

                    @php
                        $fields = [
                            'region' => 'Region',
                            'province' => 'Province',
                            'city' => 'City',
                            'last_name' => 'Last Name',
                            'first_name' => 'First Name',
                            'middle_name' => 'Middle Name',
                            'sex' => 'Sex',
                            'age' => 'Age',
                            'marital_status' => 'Marital Status',
                            'course' => 'Course',
                            'position_applied' => 'Position Applied'
                        ];
                    @endphp

                    @foreach($fields as $field => $label)
                        <div>
                            <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                            @if ($field === 'sex')
                                <select name="sex" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Select Sex</option>
                                    <option value="Male" {{ old('sex', $applicant->sex ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('sex', $applicant->sex ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            @elseif ($field === 'marital_status')
                                <select name="marital_status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Select Marital Status</option>
                                    <option value="Single" {{ old('marital_status', $applicant->marital_status ?? '') == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ old('marital_status', $applicant->marital_status ?? '') == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Widowed" {{ old('marital_status', $applicant->marital_status ?? '') == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                </select>
                            @else
                                <input type="text" name="{{ $field }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ old($field, $applicant->$field ?? '') }}" required>
                            @endif
                            @error($field)
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
    
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('applicants.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ isset($applicant) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
