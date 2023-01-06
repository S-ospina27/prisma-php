<?php

namespace App\Http\Controllers\Manage;

use App\Models\Manage\DocumentTypesModel;

class DocumentTypesController {

    private DocumentTypesModel $documentTypesModel;

	public function __construct() {
        $this->documentTypesModel = new DocumentTypesModel();
	}

    public function readDocumentTypes() {
        return $this->documentTypesModel->readDocumentTypesDB();
    }

}