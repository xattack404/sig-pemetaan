@php $editing = isset($lahan) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="nama"
            label="Nama"
            value="{{ old('nama', ($editing ? $lahan->nama : '')) }}"
            maxlength="50"
            placeholder="Nama"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="status_panen" label="Status Panen">
            @php $selected = old('status_panen', ($editing ? $lahan->status_panen : 'Proses Tanam')) @endphp
            <option value="Proses Tanam" {{ $selected == 'Proses Tanam' ? 'selected' : '' }} >Proses tanam</option>
            <option value="Sudah Panen" {{ $selected == 'Sudah Panen' ? 'selected' : '' }} >Sudah panen</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="lattitude"
            label="Lattitude"
            value="{{ old('lattitude', ($editing ? $lahan->lattitude : '')) }}"
            maxlength="15"
            placeholder="Lattitude"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="longitude"
            label="Longitude"
            value="{{ old('longitude', ($editing ? $lahan->longitude : '')) }}"
            maxlength="15"
            placeholder="Longitude"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select
            name="jenis_tanamans_id"
            label="Jenis Tanamans"
            required
        >
            @php $selected = old('jenis_tanamans_id', ($editing ? $lahan->jenis_tanamans_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Jenis Tanamans</option>
            @foreach($allJenisTanamans as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
