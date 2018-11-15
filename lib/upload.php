<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/16
 * Time: 17:44
 */

//通过类class创建上传的类
class Upload
{
//    外面不想让访问
    private $url;
//  存储文件大小
    private $size;
    private $type;
//    private $errorarr;
    function __construct()
    {
//        后期用到的是初始中的值
//        默认让它为空
        $this->url = '';
//        初始文件大小
        $this->size = 1024;
        $this->type = ['image/png','image/jpg','image/jpeg','image/gif'];
        $this->errorarr = [
            0 => '没有错误发生，文件上传成功',
            1 => '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值',
            2 => '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值',
            3 => '文件只有部分被上传',
            4 => '没有文件被上传',
            6 => '找不到临时文件夹',
            7 => '文件写入失败',
            8 => '文件长度超过20b',
            9 => '文件格式不正确'
        ];
    }
    function upload($file)
    {
//  判断上传的状态码
        if($file['error'] > 0) {

            $code = $file['error'];
            return ['code' => $code,'msg' => $this->errorarr[$code]];
        }
//        判断临时文件是否是上传文件
//            判断文件大小
        if (is_uploaded_file($file['tmp_name'])) {
            if (!$this->isSize($file['size'])) {
                return ['code' => 8,'msg' => $this->errorarr[8]];
            }
            //            判断文件类型
            if (!$this->isType($file['type'])) {
                return ['code' => 9,'msg' => $this->errorarr[9]];
            }
        }
        //         判断目录
        if (!file_exists('../uploadimg')) {
            mkdir('../uploadimg');
        }
//            时间戳文件
        $date = date('Y-m-d');
        if(!file_exists('../uploadimg/'.$date)) {
            mkdir('../uploadimg/'.$date);
        }
//        文件名称
        $ext = explode('.',$file['name'])[1];
        $filename = time().'.'.$ext;
//            移文件
        $path = '../uploadimg/'.$date.'/'.$filename;
        move_uploaded_file($file['tmp_name'],$path);
        return ['code' => 10,'msg' => '/cloth/uploadimg/'.$date.'/'.$filename];

    }
    function isSize($size)
    {
        return $size / 1024 > $this->size ? false : true;
    }
//     判断文件类型的函数
    function isType($type)
    {
        for ($i = 0; $i < count($this -> type); $i++) {
//            数组中的类型与传入进的类型比较
            if ($this->type[$i] == $type) {
                return true;
            }
        }
        return false;
    }

}


