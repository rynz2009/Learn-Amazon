<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'affiliate_menu_access',
            ],
            [
                'id'    => 22,
                'title' => 'list_product_create',
            ],
            [
                'id'    => 23,
                'title' => 'list_product_edit',
            ],
            [
                'id'    => 24,
                'title' => 'list_product_show',
            ],
            [
                'id'    => 25,
                'title' => 'list_product_delete',
            ],
            [
                'id'    => 26,
                'title' => 'list_product_access',
            ],
            [
                'id'    => 27,
                'title' => 'cs_menu_access',
            ],
            [
                'id'    => 28,
                'title' => 'transaksi_create',
            ],
            [
                'id'    => 29,
                'title' => 'transaksi_edit',
            ],
            [
                'id'    => 30,
                'title' => 'transaksi_show',
            ],
            [
                'id'    => 31,
                'title' => 'transaksi_delete',
            ],
            [
                'id'    => 32,
                'title' => 'transaksi_access',
            ],
            [
                'id'    => 33,
                'title' => 'detail_transaksi_create',
            ],
            [
                'id'    => 34,
                'title' => 'detail_transaksi_edit',
            ],
            [
                'id'    => 35,
                'title' => 'detail_transaksi_show',
            ],
            [
                'id'    => 36,
                'title' => 'detail_transaksi_delete',
            ],
            [
                'id'    => 37,
                'title' => 'detail_transaksi_access',
            ],
            [
                'id'    => 38,
                'title' => 'produk_create',
            ],
            [
                'id'    => 39,
                'title' => 'produk_edit',
            ],
            [
                'id'    => 40,
                'title' => 'produk_show',
            ],
            [
                'id'    => 41,
                'title' => 'produk_delete',
            ],
            [
                'id'    => 42,
                'title' => 'produk_access',
            ],
            [
                'id'    => 43,
                'title' => 'transaksi_aff_create',
            ],
            [
                'id'    => 44,
                'title' => 'transaksi_aff_edit',
            ],
            [
                'id'    => 45,
                'title' => 'transaksi_aff_show',
            ],
            [
                'id'    => 46,
                'title' => 'transaksi_aff_delete',
            ],
            [
                'id'    => 47,
                'title' => 'transaksi_aff_access',
            ],
            [
                'id'    => 48,
                'title' => 'detail_transaksi_aff_create',
            ],
            [
                'id'    => 49,
                'title' => 'detail_transaksi_aff_edit',
            ],
            [
                'id'    => 50,
                'title' => 'detail_transaksi_aff_show',
            ],
            [
                'id'    => 51,
                'title' => 'detail_transaksi_aff_delete',
            ],
            [
                'id'    => 52,
                'title' => 'detail_transaksi_aff_access',
            ],
            [
                'id'    => 53,
                'title' => 'master_access',
            ],
            [
                'id'    => 54,
                'title' => 'niche_create',
            ],
            [
                'id'    => 55,
                'title' => 'niche_edit',
            ],
            [
                'id'    => 56,
                'title' => 'niche_show',
            ],
            [
                'id'    => 57,
                'title' => 'niche_delete',
            ],
            [
                'id'    => 58,
                'title' => 'niche_access',
            ],
            [
                'id'    => 59,
                'title' => 'belanja_create',
            ],
            [
                'id'    => 60,
                'title' => 'belanja_edit',
            ],
            [
                'id'    => 61,
                'title' => 'belanja_show',
            ],
            [
                'id'    => 62,
                'title' => 'belanja_delete',
            ],
            [
                'id'    => 63,
                'title' => 'belanja_access',
            ],
            [
                'id'    => 64,
                'title' => 'hpp_create',
            ],
            [
                'id'    => 65,
                'title' => 'hpp_edit',
            ],
            [
                'id'    => 66,
                'title' => 'hpp_show',
            ],
            [
                'id'    => 67,
                'title' => 'hpp_delete',
            ],
            [
                'id'    => 68,
                'title' => 'hpp_access',
            ],
            [
                'id'    => 69,
                'title' => 'customer_service_create',
            ],
            [
                'id'    => 70,
                'title' => 'customer_service_edit',
            ],
            [
                'id'    => 71,
                'title' => 'customer_service_show',
            ],
            [
                'id'    => 72,
                'title' => 'customer_service_delete',
            ],
            [
                'id'    => 73,
                'title' => 'customer_service_access',
            ],
            [
                'id'    => 74,
                'title' => 'cash_flow_access',
            ],
            [
                'id'    => 75,
                'title' => 'penerimaan_cod_create',
            ],
            [
                'id'    => 76,
                'title' => 'penerimaan_cod_edit',
            ],
            [
                'id'    => 77,
                'title' => 'penerimaan_cod_show',
            ],
            [
                'id'    => 78,
                'title' => 'penerimaan_cod_delete',
            ],
            [
                'id'    => 79,
                'title' => 'penerimaan_cod_access',
            ],
            [
                'id'    => 80,
                'title' => 'detail_penerimaan_cod_create',
            ],
            [
                'id'    => 81,
                'title' => 'detail_penerimaan_cod_edit',
            ],
            [
                'id'    => 82,
                'title' => 'detail_penerimaan_cod_show',
            ],
            [
                'id'    => 83,
                'title' => 'detail_penerimaan_cod_delete',
            ],
            [
                'id'    => 84,
                'title' => 'detail_penerimaan_cod_access',
            ],
            [
                'id'    => 85,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
