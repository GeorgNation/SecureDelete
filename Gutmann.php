<?php

if ( !function_exists( 'hex2bin' ) ) {
    function hex2bin( $str ) {
        $sbin = "";
        $len = strlen( $str );
        for ( $i = 0; $i < $len; $i += 2 ) {
            $sbin .= pack( "H*", substr( $str, $i, 2 ) );
        }

        return $sbin;
    }
}

if (!function_exists ('random_bytes'))
{
    function random_bytes ($len)
    {
        $result = '';
        for ($i = 0; $i < $len; ++$i)
        {
            $result .= chr (mt_rand (0, 255));
        }
        return $result;
    }
}

error_reporting (0);

function secureDelete ($path) // Безопасное уничтожение методом Гутманн
{
	//$size = (int)filesize ($path);
    $fp = fopen ($path, "rb");
    fseek ($fp, 0, SEEK_END);
    $size = (int)ftell ($fp);
    fclose ($fp);

    $fp = fopen ($path, "a+");
	
	// Проход 1 - Случайные данные
	
    fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 2 - Случайные данные
	
	fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 3 - Случайные данные
	
	fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 4 - Случайные данные
	
	fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 5 - 55 55 55

    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("555555"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 6 - AA AA AA
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("aaaaaa"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 7 - 92 49 24
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("924924"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 8 - 49 24 92
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("492492"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 9 - 24 92 49
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("249249"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 10 - 00 00 00
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("000000"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 11 - 1111111
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("111111"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 12 - 222222
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("222222"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 13 - 333333
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("333333"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 14 - 444444
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("444444"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 15 - 555555
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("555555"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 16 - 666666
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("666666"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 17 - 777777
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("777777"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 18 - 888888
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("888888"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 19 - 999999
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("999999"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 20 - AA AA AA
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("aaaaaa"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 21 - bbbbbb
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("bbbbbb"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 22 - cccccc
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("cccccc"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 23 - dddddd
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("dddddd"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 24 - eeeeee
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("eeeeee"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 25 - ffffff
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("ffffff"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 26 - 92 49 24
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("924924"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 27 - 49 24 92
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("492492"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 28 - 24 92 49
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("249249"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 29 - 6D B6 DB
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("6db6db"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 30 - B6 DB 6D
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("b6db6d"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 31 - DB 6D B6
	
    for ($i = 0; $i <= $size; $i++)
    {
        fwrite ($fp, hex2bin ("db6db6"));
    }
    fflush ($fp);
    ftruncate ($fp, 0);

	// Проход 32 - Случайные данные
	
	fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 33 - Случайные данные
	
	fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 34 - Случайные данные
	
	fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);
	
	// Проход 35 - Случайные данные
	
	fwrite ($fp, random_bytes($size));
    fflush ($fp);
    ftruncate ($fp, 0);

	// Файл заср*ли мусором, теперь удаляем.

	fclose ($fp);
    @unlink ($path);
	
}