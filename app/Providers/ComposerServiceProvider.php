<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.menu', 'App\Http\ViewComposers\ExternalMenuComposer');
        view()->composer('dashboard.statusKerja', 'App\Http\ViewComposers\StatusKerjaComposer');
        
        view()->composer('form.kawalanAir', 'App\Http\ViewComposers\KawalanAirComposer');
        view()->composer('form.kawalanHakisan', 'App\Http\ViewComposers\KawalanHakisanComposer');
        view()->composer('form.kawalanSedimen', 'App\Http\ViewComposers\KawalanSedimenComposer');
        view()->composer('form.kawalanLain', 'App\Http\ViewComposers\KawalanLainComposer');
        view()->composer('form.borangD.access', 'App\Http\ViewComposers\KeluarMasukComposer');
        view()->composer('form.borangD.air', 'App\Http\ViewComposers\KawasanAirLarianComposer');
        view()->composer('form.borangD.bahan', 'App\Http\ViewComposers\PenstoranBahanComposer');
        view()->composer('form.borangD.bancuhan', 'App\Http\ViewComposers\KawasanBancuhanComposer'); 
        view()->composer('form.borangD.buangan', 'App\Http\ViewComposers\PengurusanBuanganComposer');
        view()->composer('form.borangD.jadual', 'App\Http\ViewComposers\JadualPembinaanComposer');
        view()->composer('form.borangD.parameter', 'App\Http\ViewComposers\ParameterTapakComposer');
        view()->composer('form.borangD.pelupusan', 'App\Http\ViewComposers\TapakPelupusanComposer'); 
        view()->composer('form.borangD.place', 'App\Http\ViewComposers\KawasanSensitifComposer');
        view()->composer('form.borangD.selenggara', 'App\Http\ViewComposers\RekodPenyelenggaraanComposer');
        view()->composer('form.borangD.tanah', 'App\Http\ViewComposers\KawasanPengambilanTanahComposer'); 

        view()->composer('form.hujan.kawalanAir', 'App\Http\ViewComposers\KawalanAirComposer');
        view()->composer('form.hujan.kawalanHakisan', 'App\Http\ViewComposers\KawalanHakisanComposer');
        view()->composer('form.hujan.kawalanSedimen', 'App\Http\ViewComposers\KawalanSedimenComposer');
        view()->composer('form.hujan.kawalanLain', 'App\Http\ViewComposers\KawalanLainComposer'); 

        view()->composer('form.hujan.elemen_pemeriksaan.access', 'App\Http\ViewComposers\KeluarMasukComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.air', 'App\Http\ViewComposers\KawasanAirLarianComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.bahan', 'App\Http\ViewComposers\PenstoranBahanComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.bancuhan', 'App\Http\ViewComposers\KawasanBancuhanComposer'); 
        view()->composer('form.hujan.elemen_pemeriksaan.buangan', 'App\Http\ViewComposers\PengurusanBuanganComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.jadual', 'App\Http\ViewComposers\JadualPembinaanComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.parameter', 'App\Http\ViewComposers\ParameterTapakComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.pelupusan', 'App\Http\ViewComposers\TapakPelupusanComposer'); 
        view()->composer('form.hujan.elemen_pemeriksaan.place', 'App\Http\ViewComposers\KawasanSensitifComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.selenggara', 'App\Http\ViewComposers\RekodPenyelenggaraanComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.tanah', 'App\Http\ViewComposers\KawasanPengambilanTanahComposer'); 

        view()->composer('form.hujan.viewkawalanAir', 'App\Http\ViewComposers\ViewKawalanAirComposer');
        view()->composer('form.hujan.viewkawalanHakisan', 'App\Http\ViewComposers\ViewKawalanHakisanComposer');
        view()->composer('form.hujan.viewkawalanSedimen', 'App\Http\ViewComposers\ViewKawalanSedimenComposer');
        view()->composer('form.hujan.viewkawalanLain', 'App\Http\ViewComposers\ViewKawalanLainComposer'); 

        view()->composer('form.hujan.elemen_pemeriksaan.viewAccess', 'App\Http\ViewComposers\ViewKeluarMasukComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewAir', 'App\Http\ViewComposers\ViewKawasanAirLarianComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewBahan', 'App\Http\ViewComposers\ViewPenstoranBahanComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewBancuhan', 'App\Http\ViewComposers\ViewKawasanBancuhanComposer'); 
        view()->composer('form.hujan.elemen_pemeriksaan.viewBuangan', 'App\Http\ViewComposers\ViewPengurusanBuanganComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewJadual', 'App\Http\ViewComposers\ViewJadualPembinaanComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewParameter', 'App\Http\ViewComposers\ViewParameterTapakComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewPelupusan', 'App\Http\ViewComposers\ViewTapakPelupusanComposer'); 
        view()->composer('form.hujan.elemen_pemeriksaan.viewPlace', 'App\Http\ViewComposers\ViewKawasanSensitifComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewSelenggara', 'App\Http\ViewComposers\ViewRekodPenyelenggaraanComposer');
        view()->composer('form.hujan.elemen_pemeriksaan.viewTanah', 'App\Http\ViewComposers\ViewKawasanPengambilanTanahComposer'); 


    }
}
