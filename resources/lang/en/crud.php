<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'barangs' => [
        'name' => 'Barangs',
        'index_title' => 'Barangs List',
        'new_title' => 'New Barang',
        'create_title' => 'Create Barang',
        'edit_title' => 'Edit Barang',
        'show_title' => 'Show Barang',
        'inputs' => [
            'nama' => 'Nama',
            'stok' => 'Stok',
            'jenis_tanaman' => 'Jenis Tanaman',
        ],
    ],

    'detail_transaksis' => [
        'name' => 'Detail Transaksis',
        'index_title' => 'DetailTransaksis List',
        'new_title' => 'New Detail transaksi',
        'create_title' => 'Create DetailTransaksi',
        'edit_title' => 'Edit DetailTransaksi',
        'show_title' => 'Show DetailTransaksi',
        'inputs' => [
            'total' => 'Total',
        ],
    ],

    'item_transaksi_petanis' => [
        'name' => 'Item Transaksi Petanis',
        'index_title' => 'ItemTransaksiPetanis List',
        'new_title' => 'New Item transaksi petani',
        'create_title' => 'Create ItemTransaksiPetani',
        'edit_title' => 'Edit ItemTransaksiPetani',
        'show_title' => 'Show ItemTransaksiPetani',
        'inputs' => [
            'stok' => 'Stok',
            'harga' => 'Harga',
            'panen_id' => 'Panen',
            'transaksi_petani_id' => 'Transaksi Petani',
        ],
    ],

    'all_jenis_tanamans' => [
        'name' => 'All Jenis Tanamans',
        'index_title' => 'AllJenisTanamans List',
        'new_title' => 'New Jenis tanamans',
        'create_title' => 'Create JenisTanamans',
        'edit_title' => 'Edit JenisTanamans',
        'show_title' => 'Show JenisTanamans',
        'inputs' => [
            'nama' => 'Nama',
        ],
    ],

    'lahans' => [
        'name' => 'Lahans',
        'index_title' => 'Lahans List',
        'new_title' => 'New Lahan',
        'create_title' => 'Create Lahan',
        'edit_title' => 'Edit Lahan',
        'show_title' => 'Show Lahan',
        'inputs' => [
            'nama' => 'Nama',
            'status_panen' => 'Status Panen',
            'lattitude' => 'Lattitude',
            'longitude' => 'Longitude',
            'jenis_tanamans_id' => 'Jenis Tanamans',
        ],
    ],

    'limit_stoks' => [
        'name' => 'Limit Stoks',
        'index_title' => 'LimitStoks List',
        'new_title' => 'New Limit stok',
        'create_title' => 'Create LimitStok',
        'edit_title' => 'Edit LimitStok',
        'show_title' => 'Show LimitStok',
        'inputs' => [
            'limit' => 'Limit',
        ],
    ],

    'panens' => [
        'name' => 'Panens',
        'index_title' => 'Panens List',
        'new_title' => 'New Panen',
        'create_title' => 'Create Panen',
        'edit_title' => 'Edit Panen',
        'show_title' => 'Show Panen',
        'inputs' => [
            'stok' => 'Stok',
            'harga' => 'Harga',
            'lahan_id' => 'Lahan',
        ],
    ],

    'transaksis' => [
        'name' => 'Transaksis',
        'index_title' => 'Transaksis List',
        'new_title' => 'New Transaksi',
        'create_title' => 'Create Transaksi',
        'edit_title' => 'Edit Transaksi',
        'show_title' => 'Show Transaksi',
        'inputs' => [
            'stok' => 'Stok',
            'harga' => 'Harga',
            'detail_transaksi_id' => 'Detail Transaksi',
            'barang_id' => 'Barang',
        ],
    ],

    'transaksi_petanis' => [
        'name' => 'Transaksi Petanis',
        'index_title' => 'TransaksiPetanis List',
        'new_title' => 'New Transaksi petani',
        'create_title' => 'Create TransaksiPetani',
        'edit_title' => 'Edit TransaksiPetani',
        'show_title' => 'Show TransaksiPetani',
        'inputs' => [
            'total' => 'Total',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'address' => 'Address',
            'phone' => 'Phone',
            'avatar' => 'Avatar',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [
            'name' => 'Name',
        ],
    ],
];
