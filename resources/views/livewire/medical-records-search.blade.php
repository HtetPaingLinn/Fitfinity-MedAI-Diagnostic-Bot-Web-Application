<div>
    <h2 class="text-[22px] font-semibold text-gray-800 mb-2 text-center">Medical Records Folder</h2>
    <div class="relative">
        <i class="absolute fa fa-search text-gray-400 top-4 left-4"></i>
        <input type="text" class="bg-white h-11 w-full px-12 rounded-lg focus:outline-none hover:cursor-pointer"
               wire:model.debounce.300ms="search" placeholder="Search...">
        <span class="absolute top-2.5 right-5 border-l pl-4"><i class="fa-solid fa-laptop-medical"></i></span>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="min-w-[1000px] divide-y divide-gray-200 table-fixed border-b-2 border-gray-100">
            <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="w-1/5 ps-8 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Date</span>
                    </div>
                </th>
                <th scope="col" class="w-1/5 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Patient Name</span>
                    </div>
                </th>
                <th scope="col" class="w-1/5 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Doctor</span>
                    </div>
                </th>
                <th scope="col" class="w-1/5 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Medical History</span>
                    </div>
                </th>
                <th scope="col" class="w-[60%] py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Treatment</span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($all_record as $ar)
                <tr>
                    <td class="w-1/5 ps-8 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $ar->date }}</span>
                    </td>
                    <td class="w-1/5 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $ar->username }}</span>
                    </td>
                    <td class="w-1/5 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $ar->doctor_name }}</span>
                    </td>
                    <td class="w-1/5 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $ar->current_disease }}</span>
                    </td>
                    <td class="w-[60%] py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $ar->medications }}</span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="footer-table" class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
        <div>
            <p class="text-sm text-gray-600">
                <span class="font-semibold text-gray-800">{{ $all_record->total() }}</span> results
            </p>
        </div>
        <div>
            <div class="inline-flex gap-x-2">
                {{ $all_record->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>
