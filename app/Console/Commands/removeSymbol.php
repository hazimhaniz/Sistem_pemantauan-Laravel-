<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\JasFail;
use App\Projek;
use Log;

class removeSymbol extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:symbol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove symbol after migration from JAS FAIL';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $specialCharRemove = JasFail::all();
        $specialCharRemoveProjek = Projek::all();

        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í',
         'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü',
         'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë',
         'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û',
         'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ',
         'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę',
         'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ',
         'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ',
         'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń',
         'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ',
         'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š',
         'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů',
         'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž',
         'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ',
         'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ',
         'ǿ', '€', '™', '˜','¬','¢','$','~','â','€','Ã','¬','Ë','œ','Ã','¢','â','˜','');
        $b = array('');

        foreach($specialCharRemove as $removeChar){
            try {
                Log::debug('Check special character start.');
                Log::debug('Replace special string');   
                $savespecialCharRemove = JasFail::where('id',$removeChar->id)->first();
                $savespecialCharRemove->name = str_replace($a, $b, $removeChar->name);        
                $savespecialCharRemove->save();
                Log::debug('Update data in JASFAIL');
                Log::debug('Remove special Char success.');

            } catch (Exception $e) {
               Log::debug('error - ',$e);
               echo 'gagal';
           }
       }

       $data=array();
       foreach($specialCharRemoveProjek as $projek){
        try {
            Log::debug('Projek - Check special character start.');
            Log::debug('Projek - Replace special string');   
            $savespecialCharRemoveProjek = Projek::where('id',$projek->id)->first();
            $savespecialCharRemoveProjek->nama_projek = str_replace($a, $b, $projek->nama_projek);        
            $savespecialCharRemoveProjek->save();
            Log::debug('Projek - Update data in JASFAIL');
            Log::debug('Projek - Remove special Char success.');

        } catch (Exception $e) {
            Log::debug('Error'.$e);
            echo 'Gagal';
        }
    }
}
}
