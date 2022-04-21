@php $editing = isset($detailTransaksi) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="total"
            label="Total"
            value="{{ old('total', ($editing ? $detailTransaksi->total : '')) }}"
            maxlength="7"
            placeholder="Total"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
