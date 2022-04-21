@php $editing = isset($jenisTanamans) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nama"
            label="Nama"
            value="{{ old('nama', ($editing ? $jenisTanamans->nama : '')) }}"
            maxlength="50"
            placeholder="Nama"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
