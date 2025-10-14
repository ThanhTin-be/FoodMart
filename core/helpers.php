<?php
// core/helpers.php

if (!function_exists('generateSlug')) {
    function generateSlug($name, $id = null) {
        $slug = mb_strtolower($name, 'UTF-8');
        $accents = [
            'à'=>'a','á'=>'a','ạ'=>'a','ả'=>'a','ã'=>'a',
            'â'=>'a','ầ'=>'a','ấ'=>'a','ậ'=>'a','ẩ'=>'a','ẫ'=>'a',
            'ă'=>'a','ằ'=>'a','ắ'=>'a','ặ'=>'a','ẳ'=>'a','ẵ'=>'a',
            'è'=>'e','é'=>'e','ẹ'=>'e','ẻ'=>'e','ẽ'=>'e',
            'ê'=>'e','ề'=>'e','ế'=>'e','ệ'=>'e','ể'=>'e','ễ'=>'e',
            'ì'=>'i','í'=>'i','ị'=>'i','ỉ'=>'i','ĩ'=>'i',
            'ò'=>'o','ó'=>'o','ọ'=>'o','ỏ'=>'o','õ'=>'o',
            'ô'=>'o','ồ'=>'o','ố'=>'o','ộ'=>'o','ổ'=>'o','ỗ'=>'o',
            'ơ'=>'o','ờ'=>'o','ớ'=>'o','ợ'=>'o','ở'=>'o','ỡ'=>'o',
            'ù'=>'u','ú'=>'u','ụ'=>'u','ủ'=>'u','ũ'=>'u',
            'ư'=>'u','ừ'=>'u','ứ'=>'u','ự'=>'u','ử'=>'u','ữ'=>'u',
            'ỳ'=>'y','ý'=>'y','ỵ'=>'y','ỷ'=>'y','ỹ'=>'y',
            'đ'=>'d'
        ];
        $slug = strtr($slug, $accents);
        // Chỉ giữ chữ, số và -
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
        $slug = trim($slug, '-');

        // fallback nếu slug rỗng
        if (empty($slug) && $id !== null) {
            $slug = "item-" . $id;
        }

        return $slug;
    }  
}

// Hàm tạo mã QR thanh toán qua VietQR
class VietQR {
    public static function generate($bank_bin, $account_no, $account_name, $amount, $orderId) {
        $desc = "ThanhToanDonHang_" . $orderId;
        $url = "https://api.vietqr.io/v2/generate";
        $data = [
            "accountNo"   => $account_no,
            "accountName" => $account_name,
            "acqId"       => $bank_bin,
            "addInfo"     => $desc,
            "amount"      => (int)$amount,
            "template"    => "compact"
        ];

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => ["Content-Type: application/json"]
        ]);
        $res = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($res, true);
        return $result['data']['qrDataURL'] ?? null;
    }
}

