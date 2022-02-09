<?php
function uploadfile($file, $name, $folders = '')
{
    $nametype = "jpg";
    $pathext = pathinfo($name);
    if ($pathext['extension']) {
        $nametype = $pathext['extension'];
    }

    if ($folders) {
        $directory = $folders;
    } else {
//        $directory = date('Y/m/d/H');
        $directory = date('Y');
    }
    if (!is_dir(FCPATH . '/uploads/' . $directory)) {
        mkdir(FCPATH . '/uploads/' . $directory, 0777, TRUE);
    }
    $folder = '/uploads/' . $directory;
    $filename = date('mdHis') . '.' . $nametype;
    move_uploaded_file($file, FCPATH . $folder . '/' . $filename);

    return array('folder' => $directory, 'file' => $filename);

}