@php $editing = isset($limitStok) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="limit"
            label="Limit"
            value="{{ old('limit', ($editing ? $limitStok->limit : '')) }}"
            maxlength="3"
            placeholder="Limit"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
