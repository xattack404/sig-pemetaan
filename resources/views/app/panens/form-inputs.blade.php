@php $editing = isset($panen) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="stok"
            label="Stok"
            value="{{ old('stok', ($editing ? $panen->stok : '')) }}"
            maxlength="3"
            placeholder="Stok"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="harga"
            label="Harga"
            value="{{ old('harga', ($editing ? $panen->harga : '')) }}"
            maxlength="7"
            placeholder="Harga"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="lahan_id" label="Lahan" required>
            @php $selected = old('lahan_id', ($editing ? $panen->lahan_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Lahan</option>
            @foreach($lahans as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
