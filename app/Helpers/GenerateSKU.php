<?php
 
namespace App\Helpers;

use DB;

class GenerateSKU
{
    public function __construct()
    {

    }
    
    function generate_sku($type)
    {
        //Start with 2 for local warehousing
        $upc = "2";
        
        //Next 2 digits are 0
        $upc .= '00';
        
        //Next 3 digits are product type
        $type_padded = sprintf("%03d", $type );
        $upc .= $type_padded;
        
        //while not equal to an existing SKU, generate a
        //random 5 digit part number, append it to the UPC, 
        //then add the check bit
        
        $part_skus = DB::table('repository_parts')->select('sku')->get();
        
        $flag = 1;
        while($flag) {
            $rand_value = rand(0, 99999);
            $rand_value = sprintf("%05s", $rand_value);
            
            $upc .= $rand_value;
            
            $odd_sum = 0;
            $even_sum = 0;
            for ($index = 0; $index < strlen($upc); $index++){
                if ($index%2 == 0){
                    $odd_sum += (int)substr($upc, $index, 1);
                }
                else{
                    $even_sum += (int)substr($upc, $index, 1);
                }
            }
            $odd_sum = $odd_sum * 3;
            $modulo_sum = $odd_sum + $even_sum;
            $modulo = $modulo_sum%10;
            if($modulo != 0){
                $modulo = 10 - $modulo;
            }
            
            $upc .= $modulo;
                        
            if ( !$part_skus->contains($upc) ){
                $flag = 0;
            }
        }
        
        /* Create the bar encoding using a binary string */
        $lw = 2; $hi = 100;
        $Lencode = array('0001101','0011001','0010011','0111101','0100011',
                       '0110001','0101111','0111011','0110111','0001011');
        $Rencode = array('1110010','1100110','1101100','1000010','1011100',
                           '1001110','1010000','1000100','1001000','1110100');
        $ends = '101'; $center = '01010';
            
        $bars=$ends;
        $bars.=$Lencode[$upc[0]];
        for($x=1;$x<6;$x++) {
            $bars.=$Lencode[$upc[$x]];
        }
        $bars.=$center;
        for($x=6;$x<12;$x++) {
            $bars.=$Rencode[$upc[$x]];
        }
        $bars.=$ends;
        /* Generate the Barcode Image */
        $img = ImageCreate($lw*95+30,$hi+30);
        $fg = ImageColorAllocate($img, 0, 0, 0);
        $bg = ImageColorAllocate($img, 255, 255, 255);
        ImageFilledRectangle($img, 0, 0, $lw*95+30, $hi+30, $bg);
        $shift=10;
        for ($x=0;$x<strlen($bars);$x++) {
            if (($x<10) || ($x>=45 && $x<50) || ($x >=85)) { $sh=10; } else { $sh=0; }
            if ($bars[$x] == '1') { $color = $fg; } else { $color = $bg; }
            ImageFilledRectangle($img, ($x*$lw)+15,5,($x+1)*$lw+14,$hi+5+$sh,$color);
        }
        /* Add the Human Readable Label */
        ImageString($img,4,5,$hi-5,$upc[0],$fg);
        for ($x=0;$x<5;$x++) {
            ImageString($img,5,$lw*(13+$x*6)+15,$hi+5,$upc[$x+1],$fg);
            ImageString($img,5,$lw*(53+$x*6)+15,$hi+5,$upc[$x+6],$fg);
        }
        ImageString($img,4,$lw*95+17,$hi-5,$upc[11],$fg);
        /* Output the Header and Content. */
        
        ImagePNG($img, "storage/allorgs/temp_barcodes/" . $upc . ".png");
        
        return $upc;
    }
}