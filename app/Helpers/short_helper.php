<?php

use CodeIgniter\HTTP\RequestInterface;
use Config\Services;

if (!function_exists("getPost")) 
{
    function getPost($field, $filter = null, $flag = NULL)
    {
        return Services::request()->getPost($field, $filter, $flag);
    }
}
if (!function_exists("getGet")) 
{
    function getGet($field, $filter = null, $flag = NULL)
    {
        return Services::request()->getGet($field, $filter, $flag);
    }
}
if (!function_exists("compareValue")) 
{
    function compareValue($POST, $DATA)
    {
        return trim($POST) == trim($DATA) ? $POST : $DATA;
    }
}
if (!function_exists("setFlashdata")) 
{
    function setFlashdata($name, $value)
    {
        return Services::session()->setFlashdata($name, $value);
    }
}
if (!function_exists("getFlashdata")) 
{
    function getFlashdata($name)
    {
        return Services::session()->getFlashdata($name);
    }
}
if (!function_exists("setRule")) 
{
    function setRule($field, $label, $rules, $error_messages = [])
    {
        return Services::validation()->setRule($field, $label, $rules, $error_messages);
    }
}
if (!function_exists("setErrorDelimiters")) 
{
    function setErrorDelimiters($first_tag, $last_tag)
    {
        return Services::validation()->setErrorDelimiters($first_tag, $last_tag);
    }
}
if (!function_exists("getError")) 
{
    function getError($field) : string
    {
        return Services::validation()->getError($field);
    }
}
if (!function_exists("validRun")) 
{
    function validRun(RequestInterface $request) : bool
    {
        return Services::validation()->withRequest($request)->run();
    }
}
if (!function_exists("setSession")) 
{
    function setSession($name, $value = NULL)
    {
        return Services::session()->set($name, $value);
    }
}
if (!function_exists("getSession")) 
{
    function getSession($name)
    {
        return Services::session()->get($name);
    }
}
if (!function_exists("hasSession")) 
{
    function hasSession($name)
    {
        return Services::session()->has($name);
    }
}
if (!function_exists("isOld")) 
{
    function isOld($field, $POST, $default = NULL, $escape = "html")
    {
        return old($field) ? old($field, $default, $escape) : $POST;
    }
}
if (!function_exists("removeSession")) 
{
    function removeSession($name)
    {
        return Services::session()->remove($name);
    }
}
if (!function_exists("removeAllSession")) 
{
    function removeAllSession()
    {
        return Services::session()->destroy();
    }
}
if (!function_exists("encryption")) 
{
    function encryption($data, $params = NULL)
    {
        return base64_encode(Services::encrypter()->encrypt($data, $params));
    }
}
if (!function_exists("decrypt")) 
{
    function decrypt($data, $params = NULL)
    {
        return Services::encrypter()->decrypt(base64_decode($data) , $params);
    }
}
if (!function_exists("uriSegment")) 
{
    function uriSegment($number)
    {
        return Services::uri()->getSegment($number);
    }
}
if (!function_exists("isEmptyFile")) 
{
    function isEmptyFile($field) : bool
    {
        return ($_FILES[$field]["error"][0] == UPLOAD_ERR_NO_FILE || ! isset($_FILES[$field])) ? true : false;
    }
}
if (!function_exists("isEmptyFiles")) 
{
    function isEmptyFiles($field) : bool
    {
        return ($_FILES[$field]["error"][0] == UPLOAD_ERR_NO_FILE || ! isset($_FILES[$field])) ? true : false;
    }
}
if (!function_exists("insertFiles")) 
{
    function insertFiles($field, $dir, $is_multiple = false)
    {
        $name_file = NULL;
        if($is_multiple && $files = Services::request()->getFiles())
        {
            $_name_files  = [];

            foreach($files[$field] as $file)
            {
                echo $file->hasMoved();
                if($file->isValid() && !$file->hasMoved())
                {
                    $newName = "FILE-" . $file->getRandomName();
                    $file->move(ROOTPATH . $dir, $newName);
                    $_name_files[] = $newName;
                }
                else
                {
                    throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
                }
            } 

            $name_file = implode(",", $_name_files);
        }
        else
        {
            $file = Services::request()->getFile($field);
            if($file->isValid() && !$file->hasMoved())
            {
                $newName = "FILE-" . $file->getRandomName();
                $file->move(ROOTPATH . $dir, $newName);
                $name_file = $newName;
            }
            else
            {
                throw new RuntimeException($file->getErrorString().'('.$file->getError().')');
            }
        }
        return $name_file;
    }
}