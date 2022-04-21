@php $editing = isset($itemTransaksiPetani) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="stok"
            label="Stok"
            value="{{ old('stok', ($editing ? $itemTransaksiPetani->stok : '')) }}"
            maxlength="3"
            placeholder="Stok"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="harga"
            label="Harga"
            value="{{ old('harga', ($editing ? $itemTransaksiPetani->harga : '')) }}"
            maxlength="7"
            placeholder="Harga"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="panen_id" label="Panen" required>
            @php $selected = old('panen_id', ($editing ? $itemTransaksiPetani->panen_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Panen</option>
            @foreach($panens as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select
            name="transaksi_petani_id"
            label="Transaksi Petani"
            required
        >
            @php $selected = old('transaksi_petani_id', ($editing ? $itemTransaksiPetani->transaksi_petani_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Transaksi Petani</option>
            @foreach($transaksiPetanis as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
