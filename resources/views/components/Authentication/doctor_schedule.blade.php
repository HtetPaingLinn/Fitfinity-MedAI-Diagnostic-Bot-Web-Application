<div class="bg-gray-50 px-8 py-4 rounded-lg shadow-lg w-full max-w-4xl">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-3xl mx-auto my-6">
        <h2 class="text-2xl font-semibold text-center mb-7">Assign Doctor Schedule</h2>
            <!-- Schedule Selection -->
        <div class="mb-5">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="py-2 px-3 text-gray-700 text-sm">Day</th>
                            <th class="py-2 px-3 text-gray-700 text-sm">Shift 1</th>
                            <th class="py-2 px-3 text-gray-700 text-sm">Shift 2</th>
                            <th class="py-2 px-3 text-gray-700 text-sm">Shift 3</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @php
                            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                            $shifts = ['10:00AM - 12:00PM', '2:00PM - 4:00PM', '6:00PM - 8:00PM'];
                        @endphp

                        @foreach ($days as $day)
                            <tr>
                                <td class="py-2 px-3 text-center font-medium text-gray-900 text-sm">{{ $day }}</td>
                                @foreach ($shifts as $index => $shift)
                                    @php $shiftID = strtolower($day) . "Shift" . ($index + 1); @endphp
                                    <td class="py-2 px-3 text-center">
                                        <input type="checkbox" id="{{ $shiftID }}" class="hidden shift-btn" name="shift[]" value="{{ $day }},{{ $shift }}">
                                        <label for="{{ $shiftID }}" class="inline-block border border-gray-300 text-gray-700 text-sm py-2 px-3 rounded-lg cursor-pointer transition-colors duration-100 hover:bg-gray-200">{{ $shift }}</label>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        <button type="submit" class="w-full bg-gray-700 text-white py-2 px-4 rounded-lg font-semibold transition-colors duration-300 hover:bg-gray-600">Submit</button>

        <button onclick="viewDrRegsForm()" class="w-full mt-3 bg-gray-500 text-white py-2 px-4 rounded-lg font-semibold transition-colors duration-300 hover:bg-gray-400">Back</button>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        let selectedShifts = 0;

        document.querySelectorAll('.shift-btn').forEach(function (checkbox) {
            checkbox.addEventListener('click', function () {
                // Get the day of the clicked checkbox
                const day = checkbox.closest('tr').querySelector('td').textContent.trim();

                // Deselect other checkboxes of the same day
                document.querySelectorAll('.shift-btn').forEach(function (otherCheckbox) {
                    if (otherCheckbox !== checkbox && otherCheckbox.closest('tr').querySelector('td').textContent.trim() === day) {
                        otherCheckbox.checked = false;
                        document.querySelector(`label[for="${otherCheckbox.id}"]`).classList.remove('bg-teal-100');
                    }
                });

                // Toggle background color
                const label = document.querySelector(`label[for="${checkbox.id}"]`);
                if (checkbox.checked) {
                    label.classList.add('bg-teal-100');
                    label.classList.replace('border-gray-300', 'border-teal-100');
                } else {
                    label.classList.remove('bg-teal-100');
                }

                selectedShifts = document.querySelectorAll('.shift-btn:checked').length;

                if (selectedShifts > 5) {
                    checkbox.checked = false;
                    label.classList.remove('bg-teal-100')
                    selectedShifts--;
                    alert('You can select a maximum of 5 shifts for the entire week.');
                }
            });
        });
    });
</script>

