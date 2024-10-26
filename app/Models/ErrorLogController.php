<?php

namespace App\Http\Controllers\Admin;

use App\Models\ErrorLog;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\ErrorAlert;
use Illuminate\Support\Facades\Notification;

class ErrorLogController extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setPluralName('Error Logs');
		$this->setSingleName('Error Log');
		$this->setRouteName('error_logs');
		$this->setModelDirectory(ErrorLog::class);
		$this->setControllerSettings();
	}

	public function data_table_columns(): array
	{
		return [
			$this->data_table_id_column(),
			[
				'data' => 'logger.fname',
				'title' => 'First Name',
				'width' => 70,
			],
			[
				'data' => 'logger.lname',
				'title' => 'Last Name',
				'width' => 70,
			],
			[
				'data' => 'log_action.title',
				'title' => 'Logged Action',
			],
			[
				'data' => 'loggable.title',
				'title' => 'Logged Item',
				'width' => 300,
			],
		];
	}


}
