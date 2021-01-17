<?php
namespace App\Services;

use \App\Models\Comments;
use \App\Models\reply;
use \App\Models\user;
use Auth;


class CommentServices{

	public static function ReplyByComment($id)
	{	
		$reply = reply::where('comment_id', $id)->get();

		return $reply;	
	}
}