<?php

class FileUploadController extends AppController {

	public function initialize(){
        parent::initialize();
        
        $this->loadModel('FileUpload');
        
    }

	public function index() {
		$this->set('title', __('File Upload Answer'));

        if ($this->request->is('post')) { 
            
            $uploadData = $this->request->data['FileUpload']['file'];

            $fileName = $uploadData['name'];
            $uploadPath = WWW_ROOT. 'uploaded_files';
            $uploadFile = $uploadPath . DS . $fileName;

            $fileSize = $uploadData['size'];

            $allowMime = array('text/csv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel');
                $file_info = new finfo(FILEINFO_MIME);

            if($fileSize == 0 || $fileSize > 2000000){
            	$this->Flash->error(__('File size exceeded. Please upload not more than 2MB.'));
            }
            elseif(!in_array($uploadData['type'], $allowMime)){
            	$this->Flash->error(__('File type invalid. Accepted file extension: .xls, .csv, .xlsx'));
            }
            else{

            	if(move_uploaded_file($uploadData['tmp_name'],$uploadFile)){

            		$this->FileUpload->create();
            		$this->FileUpload->created = date("Y-m-d H:i:s");
                    $this->FileUpload->modified = date("Y-m-d H:i:s");

                    if ($this->FileUpload->save($this->request->data)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));

                        return $this->redirect('/FileUpload');
                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
	            }
	            else{
	                $this->Flash->error(__('Unable to upload file, please try again.'));
	            }
            }
        }

		$file_uploads = $this->FileUpload->find('all');
		$this->set(compact('file_uploads'));
	}
}