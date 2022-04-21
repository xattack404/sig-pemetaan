@php $editing = isset($transaksi) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="stok"
            label="Stok"
            value="{{ old('stok', ($editing ? $transaksi->stok : '')) }}"
            maxlength="3"
            placeholder="Stok"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="harga"
            label="Harga"
            value="{{ old('harga', ($editing ? $transaksi->harga : '')) }}"
            maxlength="7"
            placeholder="Harga"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select
            name="detail_transaksi_id"
            label="Detail Transaksi"
            required
        >
            @php $selected = old('detail_transaksi_id', ($editing ? $transaksi->detail_transaksi_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Detail Transaksi</option>
            @foreach($detailTransaksis as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="barang_id" label="Barang" required>
            @php $selected = old('barang_id', ($editing ? $transaksi->barang_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Barang</option>
            @foreach($barangs as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
