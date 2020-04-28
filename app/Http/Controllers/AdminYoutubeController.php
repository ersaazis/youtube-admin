<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminYoutubeController extends CBController {


    public function cbInit()
    {
        $this->setTable("youtube");
        $this->setPermalink("youtube");
        $this->setPageTitle("Youtube");

        $this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addText("ID","id")->required(false)->showAdd(false)->showEdit(false);
		$this->addText("Title","title")->strLimit(150)->maxLength(255);
		$this->addText("Url","url")->strLimit(150)->maxLength(255);
		$this->addTextArea("Referer","referer")->showIndex(false)->strLimit(150);
		$this->addNumber("Jumlah View","view")->required(false)->showAdd(false)->showEdit(false);
        
        $this->hookBeforeInsert(function ($data){
            $data['view']=0;
            return $data;
        });

    }
}
