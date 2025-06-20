@props(['question', 'answer' =>null, 'label' => null])

@php
    // Decode answer jika masih string
    $decodedAnswer = is_string($answer) ? json_decode($answer, true) : $answer;

    // Decode pilihan kompetensi
    $choices = is_string($question->choices) ? json_decode($question->choices, true) : $question->choices;
@endphp

<div class="overflow-x-auto">
    @if ($label)
        <label class="block font-medium text-gray-700 mb-2">{{ $label }}</label>
    @endif
    <table class="table-auto w-full text-sm text-left text-gray-700 border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th rowspan="2" class="px-4 py-3 font-medium border border-gray-300 align-middle w-1/2">
                    Kompetensi
                </th>
                <th colspan="5" class="px-4 py-3 font-medium border border-gray-300 text-center">
                    Penilaian (Skala)
                </th>
            </tr>
            <tr>
                @foreach ([1 => 'Sangat Buruk', 2 => 'Buruk', 3 => 'Cukup', 4 => 'Baik', 5 => 'Sangat Baik'] as $key => $desc)
                    <th class="px-4 py-2 font-medium border border-gray-300 text-center">
                        {{ $key }}<br><span class="text-xs font-normal text-gray-500">({{ $desc }})</span>
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($choices as $key => $labelItem)
                @php
                    $kompetensiLabel = is_numeric($key) ? $labelItem : $key;
                @endphp
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 border border-gray-300">
                        {{ $kompetensiLabel }}
                    </td>
                    @foreach (range(1, 5) as $value)
                        <td class="px-4 py-3 text-center border border-gray-300">
                            <label class="cursor-pointer flex justify-center">
                                <input type="radio"
                                       name="answers[{{ $question->id }}][{{ $kompetensiLabel }}]"
                                       value="{{ $value }}"
                                       class="focus:ring-blue-500"
                                       {{ old("answers.{$question->id}.{$kompetensiLabel}", $decodedAnswer[$kompetensiLabel] ?? '') == $value ? 'checked' : '' }}>
                            </label>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
