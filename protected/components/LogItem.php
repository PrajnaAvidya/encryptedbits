<?
// logging component
class LogItem extends CComponent
{
	public static function log($text, $echo = false)
	{
		
		$item = new Log;
		$item->item = $text;
		$item->save();
		if ($echo)
			echo $text."\n";
	}

	public static function logError($text, $echo = false)
	{
		$item = new Log;
		$item->item = $text;
		$item->error = 1;
		$item->save();
		if ($echo)
			echo $text."\n";
	}

	public static function error($subject, $object, $echo = false)
	{
		self::logError($subject,$echo);
		Email::send(Yii::app()->params['adminEmail'], $subject, print_r($object, true));
	}

	public static function email($subject, $object)
	{
		self::log('Sending email: '.$subject, false);
		Email::send(Yii::app()->params['adminEmail'], $subject, print_r($object, true));
	}
}
