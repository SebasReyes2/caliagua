<?php 

class Encrypter { 
    private static $Key = "dublin"; 
    private static $llave='qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuu0';
    public static function encrypt ($input) {        
        $output = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), $input, MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key))));
        return $output;
    } 
    public static function decrypt($input) {
        $output = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Encrypter::$Key), base64_decode($input), MCRYPT_MODE_CBC, md5(md5(Encrypter::$Key))), "\0");
        return $output;
    } 
    public static function encryptSSL ($input) {
        /*
        $encryption_key=md5(Encrypter::$Key);
        $iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        $encrypted=openssl_encrypt($input, 'AES-256-CBC', $encryption_key, 0, $iv);
        return base64_encode($encrypted.'::'.$iv);
        */
        $output = base64_encode(
            openssl_encrypt(
                $input, 
                'AES-256-CBC',
                md5(Encrypter::$Key),
                OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING,
                openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-128-CBC'))
            ).'::'.openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-128-CBC'))
        );
        return $output;
    }
    public function decryptSSL($input) {
        $encryption_key=base64_decode(Encrypter::$Key);
        list($encrypted_data, $iv) = array_pad(explode('::',base64_decode($input), 2),2, NULL);
        return openssl_decrypt($encrypted_data, 'AES-256-CBC', $encryption_key, 0, $iv);
    }
}
?>