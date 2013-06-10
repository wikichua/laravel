<?php namespace Libraries\Alert;
use Illuminate\Support\Facades\Session;

class Alert
{

  public static function show() 
	{	
		if(Session::has('errors')) {
			$errors = Session::get('errors');
			self::errors($errors->all());
		}
		if(Session::has('warning')) {
			self::message('block',Session::get('warning'));
		}
		if(Session::has('info')) {
			self::message('info',Session::get('info'));
		}
		if(Session::has('success')) {
			self::message('success',Session::get('success'));
		}
		if(Session::has('error')) {
			self::message('error',Session::get('error'));
		}
	}

	protected static function message($type = 'block',$messages)
	{
		echo '<div class="alert alert-'.$type.'"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>'.ucfirst($type).'!</h4>';
		if(is_array($messages))
		{
			echo '<ul>';
			foreach ($messages as $message) {
				echo '<li>'. $message.'</li>';
			}
			echo '</ul>';
		} else {
			echo $messages;
		}

		echo '</div>';
	}

	protected static function errors($errors)
	{
		echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button><h4>Errors!</h4>';
		if(is_array($errors))
		{
			echo '<ul>';
			foreach ($errors as $message) {
				echo '<li>'. $message.'</li>';
			}
			echo '</ul>';
		} else {
			echo $errors;
		}

		echo '</div>';
	}
}
