<?php

namespace App\helpers;

use Illuminate\Database\Eloquent\Model;

class TextHelper extends Model
{
	// $pagesInfo = objects from pagination
	public static function paginationInfo($pagesInfo)
	{
		$pageInfoText = "";
		$pageInfoText .= (($pagesInfo->currentPage() - 1) * $pagesInfo->perPage() + 1) . "-";
		$pageInfoText .= (($pagesInfo->currentPage() - 1) * $pagesInfo->perPage() + 1) + ($pagesInfo->count() - 1) . ' of ' . $pagesInfo->total();
		
		return $pageInfoText;
	} 
}

?>