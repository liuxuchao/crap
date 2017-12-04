<?php
namespace Org\Util;

/**
 * 正则表达式匹配验证
 *
 * @author 刘旭超 <liuxuchao126@126.com>
 */
class RegExp
{
    public static $patternMobile = '/(1[3578][0-9]{9})/i';
    public static $patternUrl = '/(http:\/\/.+)/i';
    public static $patternEmail = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
    
    /**
     * 检查手机号码格式是否正确
     * @author 刘旭超 <liuxuchao126@126.com>
     * @date 2016-07-14 17:55
     * @param string $mobile 手机号码
     * @return boolean
     */
    public static function isMobile($mobile)
    {
        $pattern = '/^1[3578][0-9]{9}$/i';
        if ( preg_match($pattern, $mobile) ) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 从原始内容中匹配手机号码
     * @author 刘旭超 <dongguangming@lxcta.com>
     * @date 2016-09-04 11:40
     * @param string $originalString
     * @return string
     */
    public static function matchMobile($originalString)
    {
        if ( preg_match(self::$patternMobile, $originalString, $match) ) {
            return $match[1];
        } else {
            return '';
        }
    }
    
    /**
     * 从原始内容中匹配URL
     * @author 刘旭超 <dongguangming@lxcta.com>
     * @date 2016-09-04 11:40
     * @param string $originalString
     * @return string
     */
    public static function matchUrl($originalString)
    {
        if ( preg_match(self::$patternUrl, $originalString, $match) ) {
            return $match[1];
        } else {
            return '';
        }
    }
    /**
     * *
     * 从原始内容里匹配邮箱
     * @AuthorHTL 刘旭超<zhengziqiang@lxcta.com>
     * @DateTime  2016-10-13T10:11:39+0800
     * @param string $originalString
     * @return    string
     */
    public static function isEmail($originalString)
    {
        if ( preg_match(self::$patternEmail, $originalString, $match) ) {
            return $match[1];
        } else {
            return '';
        }
    }
    /**
     * *
     * 过滤html style
     * @AuthorHTL 刘旭超<zhengziqiang@lxcta.com>
     * @DateTime  2016-10-13T17:23:50+0800
     * @param     string $str [description]
     * @return    str
     */
    public static function removeHtmlStyle($str) {   
        if($str == ''){
            return '';
        }
        $str = preg_replace('#<style[^>]*?>.*?</style>#si','',$str); 
        return $str ;
    }  
    /**
     * *
     * 过滤html script
     * @AuthorHTL 刘旭超<zhengziqiang@lxcta.com>
     * @DateTime  2016-10-13T17:23:50+0800
     * @param     string $str [description]
     * @return    str
     */
    public static function removeHtmlScript($str) {   
        if($str == ''){
            return '';
        }
        $str = preg_replace('#<script[^>]*?>.*?</script>#si','',$str);
        return $str ;
    }  
}

