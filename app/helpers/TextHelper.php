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

	// status / expect: 1 = Finish, 2 = Not Start, 3 = Cancel
	public static function isStatus($status, $expect)
	{
		if ($status == TextHelper::toStatusText($expect))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function toStatusText($status)
	{
		switch ($status) 
		{
			case 1: return "Finished";
				break;
			case 2: return "Reserved";
				break;
			case 3: return "Canceled";
				break;
		}
	}
}

?>