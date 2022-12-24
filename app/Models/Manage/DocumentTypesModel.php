<?php

namespace App\Models\Manage;

use Database\Class\DocumentTypes;
use LionSql\Drivers\MySQLDriver as DB;

class DocumentTypesModel {

	public function __construct() {
		
	}

    public function readDocumentTypesDB() {
        return DB::fetchClass(DocumentTypes::class)
            ->table('document_types')
            ->select()
            ->getAll();
    }

}