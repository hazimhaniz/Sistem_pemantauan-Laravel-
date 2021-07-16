<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
        $this->call(JasFailTableSeeder::class);
        $this->call(JasFailDetailTableSeeder::class);
        $this->call(JasFailDetailAktivitiTableSeeder::class);
        $this->call(MasterActivityTypeTableSeeder::class);
        $this->call(MasterAktivitiTableSeeder::class);
        $this->call(MasterCityTableSeeder::class);
        $this->call(MasterDistrictTableSeeder::class);
        $this->call(MasterElemenPemeriksaanTableSeeder::class);
        $this->call(MasterFaqTypeTableSeeder::class);
        $this->call(MasterFilingStatusTableSeeder::class);
        $this->call(MasterHolidayTypeTableSeeder::class);
        $this->call(MasterInboxStatusTableSeeder::class);
        $this->call(MasterJenisProjekTableSeeder::class);
        $this->call(MasterKodBmpTableSeeder::class);
        $this->call(MasterMaritalStatusTableSeeder::class);
        $this->call(MasterModuleTableSeeder::class);
        $this->call(MasterMonthTableSeeder::class);
        $this->call(MasterParameterTableSeeder::class);
        $this->call(MasterPematuhanEiaTableSeeder::class);
        $this->call(MasterPengawasanTableSeeder::class);
        $this->call(MasterPeringkatPengawasanTableSeeder::class);
        $this->call(MasterPlaceStateTableSeeder::class);
        $this->call(MasterPostcodeTableSeeder::class);
        $this->call(MasterProjectActivityTableSeeder::class);
        $this->call(MasterProvinceOfficeTableSeeder::class);
        $this->call(MasterRunningnoTableSeeder::class);
        $this->call(MasterStandardTableSeeder::class);
        $this->call(MasterStateTableSeeder::class);
        $this->call(MasterSungaiTableSeeder::class);
        $this->call(MasterTempohAuditTableSeeder::class);
        $this->call(MasterUserStatusTableSeeder::class);
        $this->call(MasterUserTypeTableSeeder::class);
        $this->call(MasterVisaStatusTableSeeder::class);
        $this->call(ModelHasPermissionTableSeeder::class);
        $this->call(ModelHasRoleTableSeeder::class);
        $this->call(NotificationTableSeeder::class);
        $this->call(ParameterTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(UserTableSeeder::class);

        Schema::enableForeignKeyConstraints();
        $this->call(MasterBmpTableSeeder::class);
        $this->call(MasterBmpPematuhanTableSeeder::class);
    }
}
