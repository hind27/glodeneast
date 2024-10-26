<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{

    protected $fillable = [
        'loggable_id',
        'loggable_type',
        'logger_id',
        'logger_type',
        'error_log_type_id',
        'log_trace',
        'log_headers',
        'log_message',
        'file',
        'exception_data',
        'log_previous',
        'link',
        'full_url',
        'ip',
        'request_data',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

	public static function store_exception(mixed $e, Request $request = null): void
	{
		$data = [
			'file' => $e->getFile(),
			'line' => $e->getLine(),
			'message' => $e->getMessage(),
			'trace' => $e->getTraceAsString(),
			'previous' => $e->getPrevious(),
		];
		$dataArr = [
			'log_headers' => json_encode($request?->header()),
			'file' => $data['file'],
			'log_message' => 'Line '.$data['line'].' '.$data['message'],
			'log_trace' => $data['trace'],
			'logger_id' => Auth::check() ? Auth::id() : 0,
			'exception_data' => json_encode($e),
			'log_previous' => $data['previous'],
			'full_url' => url()->full(),
			'ip' => self::get_ip(),
			'request_data' => json_encode(request()->all()),
		];
		ErrorLog::create($dataArr);
	}

	public static function get_ip(): mixed
	{
		$ip = null;
		if (isset($_SERVER)) {
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip = $_SERVER['REMOTE_ADDR'] ?? '';
			}
		}
		return $ip;
	}

	public function loggable(): MorphTo
	{
		return $this->morphTo();
	}

	public function logger(): MorphTo
	{
		return $this->morphTo();
	}
}
