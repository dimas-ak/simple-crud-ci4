<?php namespace App\Controllers;

class Home extends BaseController
{
	public function show($category = NULL, $id = null)
	{
        if(!hasSession("admin")) 
        {
            return redirect()->to(base_url());
        }

        if(($category == "add" && $id == NULL) || ($category == "edit" && $id != NULL))
        {
            
            if($category == 'edit') $edit = $this->dbs->rowArray("id", $id, "udud");

            $data["form"]   = form_open_multipart(base_url("home/" . $category . "/" . $id));
            $data['back']   = base_url("home/");

            setRule("nama_udud", "Nama Udud", "required|max_length[50]");
            setRule("harga_udud", "Harga Udud", "required|max_length[50]|numeric");

            setErrorDelimiters('<div class="form-error"><span>', "</span></div>");

            if(validRun($this->request))
            {
                $save['photo_udud'] = NULL;

                if(! isEmptyFiles("photo_udud"))
                {
                    if(!$this->validate(["photo_udud" => ["is_image[photo_udud]"]]))
                    {
                        return redirect()->back()->withInput()->with("error-photo", $this->validator->getError());
                    }

                    if($category ==  "add")
                    { 
                        $save['photo_udud'] = insertFiles("photo_udud", "public/photos", TRUE);
                    }
                    else 
                    {
                        $save['photo_udud'] = (strlen($edit['photo_udud']) != 0 ? $edit['photo_udud'] . "," : "") . insertFiles("photo_udud", 'public/photos', TRUE);
                    }
                    
                }
                else if($category == 'edit')
                {
                    $save['photo_udud'] = $edit['photo_udud'];
                }

                $save['nama_udud']  = getPost("nama_udud");
                $save['harga_udud'] = getPost("harga_udud");

                $category == "add" ? $this->dbs->insertData($save, "udud") : $this->dbs->updateData("id", $id, $save, "udud");

                setFlashdata("success", '<div class="flashdata success"><span>Data <strong>' . getPost("nama_udud") . '</strong> berhasil di simpan.</span></div>');

                return redirect()->to(base_url("home"));
            }
            
            $data['input_nama']     = $category == 'add' ? getPost("nama_udud")     : compareValue(getPost("nama_udud"), $edit["nama_udud"]);
            $data['input_harga']    = $category == 'add' ? getPost("harga_udud")    : compareValue(getPost("harga_udud"), $edit["harga_udud"]);
            $data['input_photo']    = $category == 'add' ? NULL                     : explode(",", $edit['photo_udud']);

            $v              = view("form_udud", $data);
            $title          = "Form Input";
            
            $this->view->init($v, $title, true, ["javascript" => view("javascript/udud")]);
        }
        else if($category == "delete" && $id != NULL)
        {
            $json['result'] = false;

            $photos = $this->dbs->rowArray("id", $id, "udud")['photo_udud'];

            foreach(explode(",", $photos) as $photo)
            {
                unlink(ROOTPATH . "public/photos/" . $photo);
            }

            if($this->dbs->deleteData("id", $id, "udud"))
            {
                $json['result'] = true;
            }

            echo json_encode($json);
        }
        else if($category == 'delete-image' && $id != NULL)
        {
            $exp        = explode("~", $id);

            $name_file  = $exp[1];
            $id_data    = $exp[0];

            $json['result'] = false;

            $tmp_photos = [];

            $data       = $this->dbs->rowArray("id", $id_data, "udud");

            foreach(explode(",", $data['photo_udud']) as $photo)
            {
                if($photo !=  $name_file) $tmp_photos[] = $photo;
            }

            $update['photo_udud']   = implode(",", $tmp_photos);

            $this->dbs->updateData("id", $id_data, $update, "udud");

            if(unlink(ROOTPATH . "public/photos/" . $name_file))
            {
                $json['result'] = true;
            }

            echo json_encode($json);
        }
        else
        {
            $data['udud']   = $this->dbs->result("udud");
            $v              = view("home", $data);
            $title          = "Home Page";
            
            $this->view->init($v, $title, true);
        }
    }
    
    public function logout()
    {
        removeSession("admin");
        return redirect()->to(base_url());
    }

	//--------------------------------------------------------------------

}
