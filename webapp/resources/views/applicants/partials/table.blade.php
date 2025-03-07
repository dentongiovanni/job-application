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