<?php

namespace App\Constants;

use Illuminate\Support\Facades\Facade;

class CommonConstantsFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'CommonConstants';
	}
}

class CommonConstants
{
	public static $USER_PHOTO_SIZE = '400x400';
	public static $BATCH_CARD_SIZE = '400x400';

	public static $GALLERY_TYPE_IMAGE = 'image';
	public static $GALLERY_TYPE_VIDEO = 'video';
	public static $GALLERY_TYPE_YOUTUBE = 'youtube';

	public static $DB_DATE_FORMAT = "Y-m-d";
	public static $LOCAL_DATE_FORMAT = "d-m-Y";

}