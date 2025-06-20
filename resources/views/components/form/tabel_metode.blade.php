<div class="overflow-x-auto">
    <table class="table-auto w-full text-sm text-left text-gray-700 border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th rowspan="2" class="px-4 py-3 font-medium border border-gray-300 align-middle w-1/2">
                    Metode Pembelajaran
                </th>
                <th colspan="5" class="px-4 py-3 font-medium border border-gray-300 text-center">
                    Penilaian (Skala)
                </th>
            </tr>
            <tr>
                @foreach ([
                    '1' => 'Sangat Besar', 
                    '2' => 'Besar', 
                    '3' => 'Cukup', 
                    '4' => 'Kurang', 
                    '5' => 'Tidak Sama Sekali'
                ] as $key => $label)
                    <th class="px-4 py-2 font-medium border border-gray-300 text-center">
                        {{ $key }}<br><span class="text-xs font-normal text-gray-500">({{ $label }})</span>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ([
                'perkuliahan' => 'Perkuliahan',
                'demonstrasi' => 'Demonstrasi',
                'partisipasi_dalam_proyek_riset' => 'Partisipasi dalam proyek riset',
                'magang' => 'Magang',
                'praktikum' => 'Praktikum',
                'kerja_lapangan' => 'Kerja Lapangan',
                'diskusi' => 'Diskusi'
            ] as $name => $label)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 border border-gray-300">
                        {{ $label }}
                    </td>
                    @foreach (range(1, 5) as $value)
                        <td class="px-4 py-3 text-center border border-gray-300">
                            <label class="cursor-pointer flex justify-center">
                                <input type="radio" name="{{ $name }}" value="{{ $value }}"
                                    class="focus:ring-blue-500" required>
                            </label>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
