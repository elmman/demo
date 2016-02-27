<?php
/**
 * Created by PhpStorm.
 * User: elmman
 * Date: 2/27/16
 * Time: 17:10
 */

/**
 * ------------------------------------------
 * 功能:将驼峰命名法转成下划线命名法
 * ------------------------------------------
 */

$array = array(
    "userName" => "elmman",
    "userPassword" => "123456",
    "userAge" => 26,
    "userPhone" => 15026768038,
    "addressInfo" => array(
        "provinceName" => "上海",
        "cityName" => "上海市",
        "districtName" => "长宁区",
        "address_detail" => "龙之梦",
    ),
);


function convertArray(array $array) {
    $new_array = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = convertArray($value);
        }
        $new_key = strtolower(preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', $key));
        $new_array[$new_key] = $value;
    }
    return $new_array;
}

$new_array = convertArray($array);

print_r($new_array);


/*---------------out put-----------------*/
/*
Array
(
    [user_name] => elmman
    [user_password] => 123456
    [user_age] => 26
    [user_phone] => 15026768038
    [address_info] => Array
(
    [province_name] => 上海
            [city_name] => 上海市
            [district_name] => 长宁区
            [address_detail] => 龙之梦
        )

)
*/