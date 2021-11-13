<?php


namespace Framework\Core;


class FileUploader
{
    public  $file;
    public bool $status;

    public function upload(){

        if (empty($_FILES['photo']['name'])) {
            $this->file = null;
            $this->status = false;
        }else{
            $uploaddir = 'public/img/products/';
            $uploadfile = $uploaddir . basename($_FILES['photo']['name']);

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
                $this->file = $uploadfile;
                $this->status = true;
            } else {
                $this->status = false;
            }

        }

        return $this;
    }
}