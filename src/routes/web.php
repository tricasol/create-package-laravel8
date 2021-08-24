<?php

// namespace Daud\Assignment;
// use Illuminate\Http\Request;

Route::get('form', function(){
    return view('assignment::assignment');
});
Route::post('assignment',function(){
    $str		=	$_POST['string'];//"football vs soccer";
    $n			=	strlen($str);
    $distance	=	0;
    $output 	= 	array();

    for ( $i = 0; $i < $n; $i++ )
    {
        
        // $res = 0;


        if(!isset($output[$str[$i]])){

            $output[$str[$i]] = new stdClass();

            $output[$str[$i]]->count		 = 1; //substr_count( $str,$str[$i] );
            
            if($i+1 < $n){

                $output[$str[$i]]->right	 = $str[$i+1]?$str[$i+1].',':NULL;
            }else{

                $output[$str[$i]]->right 	 = '';
            }

            if($i-1 > -1){
                        
                $output[$str[$i]]->left 	 = $str[$i-1]?$str[$i-1].',':NULL;
                        
            }else{
                            
                $output[$str[$i]]->left 	 = '';

            }
                        
            $output[$str[$i]]->distance	 = 0;
                        
        }else{
            
            $output[$str[$i]]->count		 += 1;

            if($i+1 < $n){
                        
                $output[$str[$i]]->right	.= $str[$i+1]?$str[$i+1].',':NULL;
                    
            }else{

                $output[$str[$i]]->right	.= '';
            }
                    
            $output[$str[$i]]->left 	.= $str[$i-1]?$str[$i-1].',':NULL;
                    
                
        }

        for ($j = $i + 1; $j < $n; $j++)
        {
            if ( $str[$i] == $str[$j] ){
                            

                if( ($j-$i-1) < 11 ){
                    $output[$str[$i]]->distance	 = max($output[$str[$i]]->distance,($j-$i-1));
                    break;
                }
                
                
            }
        }





    }	
    echo $str;
    print_r('<pre>');
    print_r($output);
    print_r('</pre>');
});
?>