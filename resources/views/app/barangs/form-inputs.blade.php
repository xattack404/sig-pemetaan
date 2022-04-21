@php $editing = isset($barang) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nama"
            label="Nama"
            value="{{ old('nama', ($editing ? $barang->nama : '')) }}"
            maxlength="50"
            placeholder="Nama"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="stok"
            label="Stok"
            value="{{ old('stok', ($editing ? $barang->stok : '')) }}"
            maxlength="3"
            placeholder="Stok"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="jenis_tanaman"
            label="Jenis Tanaman"
            value="{{ old('jenis_tanaman', ($editing ? $barang->jenis_tanaman : '')) }}"
            maxlength="50"
            placeholder="Jenis Tanaman"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
