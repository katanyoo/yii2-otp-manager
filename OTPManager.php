<?php

namespace katanyoo\otpmanager;

use katanyoo\smssender\SMSSender;
use katanyoo\otpmanager\OtpLog;

/**
 * This is just an example.
 */
class OTPManager extends SMSSender
{
	function generateRandomString($length = 10) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function generateOtp()
    {
    	$length = rand(4,4);
		$chars = array_merge(range(0,9));
		shuffle($chars);
		$password = implode(array_slice($chars, 0,$length));
		return $password;

    	/*$response = \Yii::$app->smsSender
				     ->setMobileNo(\Yii::$app->request->post('telno'))
				     ->setMessage('')
				     ->send();
		if ($response['result'] == true) {
			return ['success' => true]
		}*/
    }

	public function send() {
		if (!isset($this->mobile_no)) {
			throw new Exception("Please set mobile number before send message.", 1);
		}

		$log = new OtpLog();
		$log->refcode = $this->generateRandomString(3);
		$log->passcode = $this->generateOtp();
		$log->telno = $this->mobile_no;
		$log->expire_time = strtotime('now + 5 minutes');
		if($log->save()) {
			$this->message = $log->refcode . ':' . $log->passcode . ' คือรหัส OTP ของคุณ';
			$result = parent::send();
			if ($result['result']) {
				$result['passcode'] = $log->passcode;
				$result['refcode'] = $log->refcode;
			}
		}

		return $result;
	}
}
